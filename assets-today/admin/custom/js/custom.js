
$(document).ready(function(){
 // bsCustomFileInput.init();
 //  $("#companydiv").hide(); 
 //    $("#usertype").change(function(){
      
 //        if($("#usertype").val() == 'C') {
 //            $("#companydiv").show();
 //            $('#company_name').show();
 //            var c = $("#company_name").val();
 //            //alert(c);

 //        } else {
 //            $("#companydiv").hide();
 //            $("#colaboratordiv").hide(); 
 //        } 
 //    });


  //   $.validator.setDefaults({
  //     submitHandler: function () {
  //       // $("#quickForm").submit(function();
  //       $("#refresh_button2").show();
  //       $("#useraddbtn").prop('disabled', true);
  //       document.getElementById("useraddform").submit();
  //     }
  //   });
  // $('#useraddform').validate({
   
  //   rules: {
  //     fname: {
  //       required: true,
  //       minlength: 1
  //     },
  //     lname: {
  //       required: true,
  //       minlength: 1
  //     },
  //     phone: {
  //       required: true,
  //       minlength: 10,
  //       maxlength: 10
  //     },
  //     email: {
  //       required: true,
  //       email: true
  //     },
  //     password: {
  //       required: true,
  //       minlength: 4
  //     },
  //     usertype: {
  //       required: true
  //     },
  //     cpassword: {
  //           required: true,
  //           minlength: 4,
  //           equalTo: "#password"
  //       }
      
  //   },
  //   messages: {
  //     fname: {
  //       required: "Please enter a first name",
  //       minlength: "Your first name must be at least 1 characters long"
  //     },
  //      lname: {
  //       required: "Please enter a last name",
  //       minlength: "Your last name must be at least 1 characters long"
  //     },
  //     phone: {
  //       required: "Please enter phone number",
  //       minlength: "Your phone must be at least 10 characters long",
  //       maxlength: "Your phone must be at most 10 characters long"
  //     },
  //     email: {
  //       required: "Please enter a email address",
  //       email: "Please enter a vaild email address"
  //     },
  //     userrole: {
  //       required: "Please provide a usertype",
        
  //     },
  //     password: {
  //       required: "Please provide a password",
  //       minlength: "Your password must be at least 4 characters long"
  //     },
  //     cpassword: {
  //       required: "Please provide a matching password",
  //       minlength: "Your password must be at least 4 characters long"
  //     }
  //   },
  //   errorElement: 'span',
  //   errorPlacement: function (error, element) {
  //     error.addClass('invalid-feedback');
  //     element.closest('.form-group').append(error);
  //   },
  //   highlight: function (element, errorClass, validClass) {
  //     $(element).addClass('is-invalid');
  //   },
  //   unhighlight: function (element, errorClass, validClass) {
  //     $(element).removeClass('is-invalid');
  //   }
  // });



jQuery(function($) {
  "use strict";
  //alert('hi');
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
   
  $('#categoryaddform').validate({
   
    rules:{
      name:{
        required:true
      },
      categoryshown:{
        required:true
      },
    
      category_image:{
        extension: "jpg,jpeg,png",
        maxFileSize: {
            "unit": "KB",
            "size": "10000"
        },
      }
    },
    messages:{
      name:{
        required:'Please enter  Name'
      },
      categoryshown:{
        required:"Please enter categoryshown "
      },

      category_image:{
        extension: "Only jpg,jpeg,png files are allowed"
      }
    },

    submitHandler:function(){
      $.ajax({
        type:'POST',
        url:base_url+'admin-save-category',
        data:$('#categoryaddform').serialize(),
        // beforeSend:function(){
        //   $('#loguser').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').prop('disabled',true);
        // },
        success:function(d){
          if(d.success){
            $('#addcategorysbtn').html(d.success);
            window.location.href=d.redirect;
          }else if(d.error){
            swal(d.error, {
              icon: "error",
              allowOutsideClick: false,
            });
            //$('#loguser').html('Login').prop('disabled',false);
          }
        }
      });
    }
  });


});
});
// function myFunctionDelete(send_url){
//     // alert(send_url);
    
//     if (confirm("Are You Sure!")) {
//       window.location.replace(send_url);
//     } else {
      
//     }
//   }

// $('body').on('change','#usertype',function(){
//     var s=$('#usertype :selected').val();

//     if(s=='2'){
//       $('#user_spec').css('display','block');
//       $('#userspeciality_chosen').css('width','100%')
//     }else{
//       $('#user_spec').css('display','none');
//     }
//   });

    function myUserDelete(send_url,fid)
     {   
      var  rmvfile=fid;
    
      if (confirm("Are you sure you want to Delete the file?") == true) {
      if(fid!='')
        {
         $.ajax({
         type:'post',
         url:send_url,
         data:{rmvfile: rmvfile},
         success:function(msg){
          
         $( "#user_"+rmvfile).remove();
            alert('User Deleted!');
         //location.reload();
          }
         });
         } } }


   function myCategoryDelete(send_url,fid)
     {   
      var  rmvfile=fid;
    
      if (confirm("Are you sure you want to Delete the file?") == true) {
      if(fid!='')
        {
         $.ajax({
         type:'post',
         url:send_url,
         data:{rmvfile: rmvfile},
         success:function(msg){

         $( "#category_"+rmvfile).remove();
              alert('Category Deleted');
                //alert(msg.success);
            },
            // error: function(e){
            //     alert(e.error);
            // }
        });
          
         
         } }else{
        //alert ('no');
        return false;
         } }
       


     



 
