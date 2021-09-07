jQuery(function($) {
  "use strict";

  // This set of validators requires the File API, so if we'ere in a browser
    // that isn't sufficiently "HTML5"-y, don't even bother creating them.  It'll
    // do no good, so we just automatically pass those tests.
    var is_supported_browser = !!window.File,
        fileSizeToBytes,
        formatter = $.validator.format;

    /**
     * Converts a measure of data size from a given unit to bytes.
     *
     * @param number size
     *   A measure of data size, in the give unit
     * @param string unit
     *   A unit of data.  Valid inputs are "B", "KB", "MB", "GB", "TB"
     *
     * @return number|bool
     *   The number of bytes in the above size/unit combo.  If an
     *   invalid unit is specified, false is returned
     */
    fileSizeToBytes = (function () {

        var units = ["B", "KB", "MB", "GB", "TB"];

        return function (size, unit) {

            var index_of_unit = units.indexOf(unit),
                coverted_size;

            if (index_of_unit === -1) {

                coverted_size = false;

            } else {

                while (index_of_unit > 0) {
                    size *= 1024;
                    index_of_unit -= 1;
                }

                coverted_size = size;
            }

            return coverted_size;
        };
    }());


  $.validator.addMethod(
      "minFileSize",
      function (value, element, params) {

          var files,
              unit = params.unit || "KB",
              size = params.size || 100,
              min_file_size = fileSizeToBytes(size, unit),
              is_valid = false;

          if (!is_supported_browser || this.optional(element)) {

              is_valid = true;

          } else {

              files = element.files;

              if (files.length < 1) {

                  is_valid = false;

              } else {

                  is_valid = files[0].size >= min_file_size;

              }
          }

          return is_valid;
      },
      function (params, element) {
          return formatter(
              "File must be at least {0}{1} large.",
              [params.size || 100, params.unit || "KB"]
          );
      }
    );

    $.validator.addMethod(
        "maxFileSize",
        function (value, element, params) {

            var files,
                unit = params.unit || "KB",
                size = params.size || 100,
                max_file_size = fileSizeToBytes(size, unit),
                is_valid = false;

            if (!is_supported_browser || this.optional(element)) {

                is_valid = true;

            } else {

                files = element.files;

                if (files.length < 1) {

                    is_valid = false;

                } else {

                    is_valid = files[0].size <= max_file_size;

                }
            }

            return is_valid;
        },
        function (params, element) {
            return formatter(
                "File cannot be larger than {0}{1}.",
                [params.size || 100, params.unit || "KB"]
            );
        }
    );

  $.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg !== value;
  }, "Value must not equal arg.");


  //Profile Edit
  $('#usereditprofile').validate({
    rules:{
      fname:{
        required:true
      },
      lname:{
        required:true
      },
      phone:{
        required:true
      },
      email:{
        required:true,
        email:true
      },
      usertype:{
        valueNotEquals:"0"
      },
      about:{
        required:true,
        minlength:100,
        maxlength:600
      },
      address:{
        required:true
      },
      password:{
        required:false
      },
      cpassword: {
        equalTo: "#password"
      },
      profile_image:{
        extension: "jpg,jpeg,png",
        maxFileSize: {
            "unit": "KB",
            "size": "10000"
        },
      }
    },
    messages:{
      fname:{
        required:'Please enter First Name'
      },
      lname:{
        required:"Please enter Last Name"
      },
      phone:{
        required:'Please enter phone no.'
      },
      email:{
        required:'Please enter email address',
        email:'Email address is not valid'
      },
      usertype:{
        valueNotEquals:"Please select account type."
      },
      about:{
        required:'Please write something about yourself'
      },
      address:{
        required:'Please enter address'
      },
      password:{
        required:'Please enter password'
      },
      cpassword: {
        equalTo: "Password not matched"
      },
      profile_image:{
        extension: "Only jpg,jpeg,png files are allowed"
      }
    },
    submitHandler:function(){
      $.ajax({
          type:'POST',
          url:base_url+'update-user',
          data:new FormData($('#usereditprofile')[0]),
          cache: false,
          contentType: false,
          processData: false,
          timeout: 60000000,
          target: '.preview',
          beforeSend:function(){
            $('#edituserprofile').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').prop('disabled',true);
          },
          success:function(d){

            if(d.success){
              swal(d.success, {
                icon: "success",
                allowOutsideClick: false,
              });
             window.location.href=d.redirect;
            }else{
              swal(d.error, {
                icon: "error",
                allowOutsideClick: false,
              });
            }
            
          },
          xhr: function(){
              //Get XmlHttpRequest object
               var xhr = $.ajaxSettings.xhr() ;
              //Set onprogress event handler
               xhr.upload.onprogress = function(data){
                  var perc =(data.loaded / data.total) * 100;// Math.round((data.loaded / data.total) * 100);
                  $('.progress-bar').css('width',perc.toFixed(2) + '%').text(perc.toFixed(2) + '%');
               };
               return xhr ;
          },
          error: function (e) {
          },
          complete:function(status,xhr){
            $('.progress-bar').css('width', '0%').text('0%');
            $('#edituserprofile').html('Submit').attr('disabled',false);
            
          },
          resetForm: true 
      });
    }
  });


  $('body').on('change','#profile_image',function(){
    readURL(this);
  });

  function readURL(input) {
    var url = input.value;
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#img_profile').attr('src', e.target.result);
          $('#imagePreview').css({"background-image":"url("+e.target.result+")"});
        }
        reader.readAsDataURL(input.files[0]);
    }
  }


  $('body').on('click','.comment-track',function(){
    $('#commentModalId').find('#content_track').val($(this).attr('data-track'));
    $('#commentModalId').find('#content_track_user').val($(this).attr('data-track_user'));
  });

  $('#comment_form').validate({
     rules:{
        comment_data:{
          required:true,
          minlength:2,
          maxlength:300
        }
      },
      messages:{
        comment_data:{
          required:'Comment somthing',
          minlength:'Mimimum 2 charachter',
          maxlength:'Maximum 300 charachter'
        }
      },
      submitHandler:function(){
        $.ajax({
          type:'POST',
          url:base_url+'comment',
          data:$('#comment_form').serialize(),
          beforeSend:function(){
            $('#comment_btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').prop('disabled',true);
          },
          success:function(d){
            if(d.success){
              $('#commentmsg').html('<div class="alert alert-success">'+d.success+'</div>');
              setTimeout(function(){
                $('#commentmsg').html('');
                $('#commentModalId').modal('hide');
              },1500);
            }else if(d.error){
              $('#commentmsg').html('<div class="alert alert-danger">'+d.error+'</div>');
              setTimeout(function(){
                $('#commentmsg').html('');
              },1500);
              $('#comment_btn').html('Submit').prop('disabled',false);
            }
          },
          complete:function(xhr,status){
            $('#comment_form').find('#comment_data').val('');
            $('#comment_btn').html('Submit').prop('disabled',false);

          }
        });
      }
  });

  $("#post_comment").keyup(function(event) {
    var comt=$("#post_comment").val();
    var content_track_user=$('#content_track_user').val();
    var content_track=$('#content_track').val();
    if (event.keyCode === 13) {
        if(comt!=''){
          $.ajax({
            type:'POST',
            url:base_url+'comment',
            data:{content_track:content_track,comment_data:comt,content_track_user:content_track_user},
            beforeSend:function(){
             
            },
            success:function(d){
              if(d.success){
                
              }else if(d.error){
                
              }
            },
            complete:function(xhr,status){
              $('#post_comment').val('');

            }
          });
        }
    }
  });


});