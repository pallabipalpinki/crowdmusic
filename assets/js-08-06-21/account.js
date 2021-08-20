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

  jQuery.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^[\w.]+$/i.test(value);
  }, "Letters, numbers, and underscores only please");


  //Normal Login
  $('#loguserform').validate({
    rules:{
      username:{
        required:true,
        email:true
      },
      password:{
        required:true
      }
    },
    messages:{
      username:{
        required:'Enter Username',
        email:'Email is not valid'
      },
      password:{
        required:'Enter password',
      }
    },
    submitHandler:function(){
      $.ajax({
        type:'POST',
        url:base_url+'user-login',
        data:$('#loguserform').serialize(),
        beforeSend:function(){
          $('#loguser').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').prop('disabled',true);
        },
        success:function(d){
          if(d.success){
            $('#loguser').html(d.success);
            window.location.href=d.redirect;
          }else if(d.error){
            swal(d.error, {
              icon: "error",
              allowOutsideClick: false,
            });
            $('#loguser').html('Login').prop('disabled',false);
          }
        }
      });
    }
  });


  //Social Login

  $('body').on('click','#btn_gauth',function(){
    var _social_auth=$(this).attr('data-social_id');
    sauth(_social_auth,'btn_gauth');
  });

  $('body').on('click','#btn_fauth',function(){
    var _social_auth=$(this).attr('data-social_id');
    sauth(_social_auth,'btn_fauth');
  });

  function sauth(_social_auth,btn){
    $.ajax({
      type:'GET',
      url:base_url+'user-slogin?_social_auth='+_social_auth,
      data:{},
      beforeSend:function(){
        $('#'+btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').prop('disabled',true);
      },
      success:function(d){
        if(d.auth_url){
          window.location.href=d.auth_url;
        }else if(d.error){
          swal(d.error, {
            icon: "error",
            allowOutsideClick: false,
          });
        }
      }
    });
  }


  //Sign up
  $('#useraddform').validate({
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
        required:true
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
          url:base_url+'save-user',
          data:new FormData($('#useraddform')[0]),
          cache: false,
          contentType: false,
          processData: false,
          timeout: 60000000,
          target: '.preview',
          beforeSend:function(){
            $('#useraddbtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').prop('disabled',true);
          },
          success:function(d){

            if(d.success){
              swal(d.success, {
                icon: "success",
                allowOutsideClick: false,
              });
              $('#useraddform')[0].reset();
              $('#imagePreview').css({"background-image":"url()"});
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
            $('#useraddbtn').html('Submit').attr('disabled',false);
            
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
          $('#imagePreview').css({"background-image":"url("+e.target.result+")"});
        }
        reader.readAsDataURL(input.files[0]);
    }
  }

});



// $('#loguser').click(function (e) {
//   //alert('hi');
//   var flag = 0;
//   var username = $('#usernamei').val();
//   var password = $('#passwordi').val();

//   // alert(username);
//   //alert(password);
//   if (username == '') {
//     $('#usernamei').css('border', '1px solid red');
//     flag = 1;
//   }
//   if (password == '') {
//     $('#passwordi').css('border', '1px solid red');
//     flag = 1;
//   }
//   console.log('username', username);
//   console.log('password', password);

//   if (flag == 0) {
//     var url = base_url + 'user-login';
//     $.ajax({
//       url: url,
//       method: 'POST',
//       data: { username: username, password: password },
//       success: function (result) {
//         if (result == 1) {
//           window.location.href = base_url + 'user-dashboard';
//         } else if (result == 2) {
//           $('#usernamei').css('border', '1px solid red');
//           alert('Invalid Username');
//         } else if (result == 3) {
//           $('#passwordi').css('border', '1px solid red');
//           alert('Invalid Password');
//         } else if (result == 4 || result == 5) {
//           $('#usernamei').css('border', '1px solid red');
//           $('#passwordi').css('border', '1px solid red');
//           alert('Invalid Username & Passowrd');
//         } else {
//           alert('Something went wrong');
//         }
//       },
//     });
//   } else {
//     alert('Something went wrong');
//   }
// });







$(document).ready(function () {
  $('#artist_track').hide();
  $('#artist_album').show();
  $('#chkalbum').click(function () {
    $('#artist_track').hide();
    $('#artist_album').show();
    $('#chkalbum').attr('class', 'active');
    $('#chktrack').removeClass('active');
  });

  $('#chktrack').click(function () {
    $('#chktrack').attr('class', 'active');
    $('#chkalbum').removeClass('active');
    $('#artist_track').show();
    $('#artist_album').hide();
  });
});