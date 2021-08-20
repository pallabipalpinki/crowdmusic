      </main>
      <footer id="footer">
         <div class="container-fluid text-center text-md-left">
            <div class="row">
               <div class="col-auto mx-auto">
                  <a href="#" class="logo"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt=""></a>
               </div>
            </div>
            <div class="bottom-nav m_top_60">
               <div class="row align-items-center">
                  <div class="col-md-auto mb-3 mb-md-0 footer-nav">
                     <ul class="list-unstyled social-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Work with Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class="col-md-auto ml-md-auto">
                     <ul class="list-unstyled list-inline social">
                        <li class="list-inline-item">
                           <a href="#"><img src="<?php echo base_url(); ?>assets/images/facebook.png" /></a>
                        </li>
                        <li class="list-inline-item">
                           <a href="#"><img src="<?php echo base_url(); ?>assets/images/twitter.png" /></a>
                        </li>
                        <li class="list-inline-item">
                           <a href="#"><img src="<?php echo base_url(); ?>assets/images/linkedin.png" /></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                  <p class="copyright">Copyright © 2021.<a class="text-green ml-2" href="#" target="_blank">Crowdmusiq.com</a> </p>
               </div>
               <hr>
            </div>
         </div>
      </footer>
<script type="text/javascript">
  
  var base_url= '<?php echo base_url();?>';
</script>

      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
      <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery.flipster.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/gsap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/howler/howler.core.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/siriwave.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/jQuery.tagify.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/chosen/chosen.jquery.min.js"></script>
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

  
      <?php
      if($this->session->userdata('SESSION_USER_ID')){
         ?>
         <script src="<?php echo base_url(); ?>assets/js/account_edit.js"></script>        
         <script src="<?php echo base_url(); ?>assets/js/contents.js"></script>
         <?php
      }else{
         ?>
         <script src="<?php echo base_url(); ?>assets/js/account.js"></script>
         <?php
      }
      
      ?>

      <script>
         jQuery(function() {
            $.ajaxSetup({cache:false}); 

            //setup before functions
            var typingTimer;                //timer identifier
            var doneTypingInterval = 0.1;  //time in ms, 5 second for example
            var $input = $('#search_params');

            //on keyup, start the countdown
            $input.on('keyup', function () {
              clearTimeout(typingTimer);
              typingTimer = setTimeout(doneTyping2, doneTypingInterval);
              //doneTyping();
            });

            //on keydown, clear the countdown 
            $input.on('keydown', function () {
             clearTimeout(typingTimer);
             typingTimer = setTimeout(doneTyping2, doneTypingInterval);
            });

            $input.on('paste', function () {
              // clearTimeout(typingTimer);
              // typingTimer = setTimeout(doneTyping2, doneTypingInterval);
              doneTyping2();
            });

            $input.on('cut', function () {
              clearTimeout(typingTimer);
             typingTimer = setTimeout(doneTyping2, doneTypingInterval);
            });

            function doneTyping2 () {
               var searchInput=$input.val();
               var html='';
               if(searchInput!=''){
                  $.ajax({
                     type:'GET',
                     url:base_url+'search_global?_searched_param='+searchInput,
                     data:{},
                     success:function(d){
                        if(d!=''){
                           $.each(d,function(i,v){
                              html+='<li>';
                              html+='<div class="img"><img src="'+v.searched_data_image+'" alt="" loading="lazy"></div>';
                              html+='<div class="text"><a href="'+v.searched_access_url+'">'+v.serach_data_name+'</a></div>';
                              html+='</li>';
                           });

                           $('ul.search-list').css('display','block').html(html);
                        }else{
                           $('ul.search-list').css('display','none').html('');
                        } 
                     }
                  });
               }else{
                  $('ul.search-list').css('display','none').html('');
               }        
            }


            // $('body').on('keyup keydown paste cut','#search_params',function(){
            //    var search_params=$('#search_params').val();
            //    var html='';

            //    $.ajax({
            //       type:'GET',
            //       url:base_url+'search_global?_searched_param='+search_params,
            //       data:{},
            //       success:function(d){
            //          if(d!=''){
            //             $.each(d,function(i,v){
            //                html+='<li>';
            //                html+='<div class="img"><img src="'+v.searched_data_image+'" alt="" loading="lazy"></div>';
            //                html+='<div class="text"><a href="'+v.searched_access_url+'">'+v.serach_data_name+'</a></div>';
            //                html+='</li>';
            //             });

            //             $('ul.search-list').css('display','block').html(html);
            //          }else{
            //             $('ul.search-list').css('display','none').html('');
            //          }

                     
            //       }
            //    });
            // });
         });
      </script>

         <?php 
         if(session_userdata('SESSION_USER_ID')){
            ?>
            <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
            <script >
               $(".messages").animate({ scrollTop: $(document).height() }, "fast");

            $("#profile-img").click(function() {
               $("#status-options").toggleClass("active");
            });

            $(".expand-button").click(function() {
              $("#profile").toggleClass("expanded");
               $("#contacts").toggleClass("expanded");
            });

            $("#status-options ul li").click(function() {
               $("#profile-img").removeClass();
               $("#status-online").removeClass("active");
               $("#status-away").removeClass("active");
               $("#status-busy").removeClass("active");
               $("#status-offline").removeClass("active");
               $(this).addClass("active");
               
               if($("#status-online").hasClass("active")) {
                  $("#profile-img").addClass("online");
               } else if ($("#status-away").hasClass("active")) {
                  $("#profile-img").addClass("away");
               } else if ($("#status-busy").hasClass("active")) {
                  $("#profile-img").addClass("busy");
               } else if ($("#status-offline").hasClass("active")) {
                  $("#profile-img").addClass("offline");
               } else {
                  $("#profile-img").removeClass();
               };
               
               $("#status-options").removeClass("active");
            });

            $.ajaxSetup({cache:false});

            function newMessage() {
               var message = $(".message-input input#msg").val();
               var reciever = $(".message-input input#reciever_id").val();
               var utype = $(".message-input input#utype").val();
               if($.trim(message) == '') {
                  return false;
               }else{
                  $.ajax({
                     type:'POST',
                     url:base_url+'send_msg',
                     data:{message:message,u_type:u_type,reciever:reciever},
                     success:function(d){

                     }
                  });
               }
               load_msgs(reciever);
               $('<li class="sent"><img src="'+sender_img+'" alt="" loading="lazy"/><p>' + message + '</p></li>').appendTo($('.messages ul'));
               $('.message-input input#msg').val(null);
               $('.contact.active .preview').html('<span>You: </span>' + message);
               $(".messages").animate({ scrollTop: $(document).height() }, "fast");



            };

            $('.submit').click(function() {
              newMessage();
            });

            $('body').on('keydown','input#msg', function(e) {
              if (e.which == 13) {
                newMessage();
                return false;
              }
            });            

            $(window).on('load',function(d){
              load_chatters();
            });

            //setup before functions
            var ctypingTimer;                //timer identifier
            var cdoneTypingInterval = 0.1;  //time in ms, 5 second for example
            var $cinput = $('#search_chatters');

            //on keyup, start the countdown
            $cinput.on('keyup', function () {
              clearTimeout(ctypingTimer);
              ctypingTimer = setTimeout(load_chatters, cdoneTypingInterval);
              //doneTyping();
            });

            //on keydown, clear the countdown 
            $cinput.on('keydown', function () {
             clearTimeout(ctypingTimer);
             ctypingTimer = setTimeout(load_chatters, cdoneTypingInterval);
            });

            $cinput.on('paste', function () {
              // clearTimeout(typingTimer);
              // typingTimer = setTimeout(doneTyping2, doneTypingInterval);
              load_chatters();
            });

            $cinput.on('cut', function () {
              clearTimeout(ctypingTimer);
             ctypingTimer = setTimeout(load_chatters, cdoneTypingInterval);
            });




            setInterval(function(){load_chatters();load_msgs($(".message-input input#reciever_id").val());},1000);

            function load_msgs(reciever){
               var mhtml='';
               var cimg='';
               $.ajax({
                  type:'GET',
                  url:base_url+'load_msg?reciever='+reciever,
                  beforeSend:function(){

                  },
                  success:function(d){
                     if(d!=''){
                        $.each(d,function(i,v){
                           if(v.msg_type=='sent'){
                              //cimg=v.msg_sender_img;
                              mhtml+='<li class="sent">';
                              mhtml+='<img src="'+v.msg_sender_img+'" alt="" loading="lazy"/>';
                              mhtml+='<p>'+v.msg_sent+'</p>';
                              mhtml+='</li>';
                           }else{
                              //cimg=v.msg_reciever_img;
                              mhtml+='<li class="replies">';
                              mhtml+='<img src="'+v.msg_sender_img+'" alt="" loading="lazy"/>';
                              mhtml+='<p>'+v.msg_sent+'</p>';
                              mhtml+='</li>';
                           }
                           
                        });
                     }

                     $('div.messages ul').html(mhtml);
                  }
               });
            }

            function load_chatters(){
               var _searched_param=$cinput.val();
               var html='';
               $.ajax({
                  type:'GET',
                  url:base_url+'load_chat_users?u_type='+u_type+'&_searched_param='+_searched_param,
                  data:{u_type:u_type},
                  beforeSend:function(){

                  },
                  success:function(d){
                     if(d!=''){
                        $.each(d,function(i,v){

                           var online_status='';

                           if(v.user_online_status=='online'){
                              online_status='';
                           }

                           html+='<li class="contact" data-utype_id="'+v.user_id+'" data-uname="'+v.user_name+'" data-img="'+v.user_image+'" data-utype="'+v.user_type+'">';
                              html+='<div class="wrap">';
                                 html+='<span class="contact-status '+v.user_online_status+'"></span>';
                                 html+='<img src="'+v.user_image+'" alt="" loading="lazy"/>';
                                 html+='<div class="meta">';
                                    html+='<p class="name">'+v.user_name+'</p>';
                                    html+='<p class="preview">'+v.user_last_message+'</p>';
                                 html+='</div>';
                              html+='</div>';
                           html+='</li>';
                        });
                     }else{
                        html='';
                     }

                     $('#contacts ul').html(html);
                  }
               });
            }


            $('body').on('click','li.contact',function(){
               var uid=$(this).attr('data-utype_id');
               var uname=$(this).attr('data-uname');
               var uimg=$(this).attr('data-img');
               var utype=$(this).attr('data-utype');
               load_msgs(uid);
               $('#reciever_id').val(uid);
               $('#utype').val(uid);
               $('#selected_img').closest('img').attr('src',uimg);
               $('#selected_name').closest('p').text(uname);
               $(".message-input input#msg").prop('disabled',false);
            });
         </script>
            <?php
         }
         ?>


      <script type="text/javascript">
        function openSignin(){
          $('#signinModalId').modal('show');
          $('#signupModalId').modal('hide');
        }

         // var controller = new ScrollMagic.Controller();

         // new ScrollMagic.Scene({
         //    duration: 400,
         //    offset: $('#equipmentImg').offset().top + $('#equipmentImg').height() - $(window).height()
         // })
         // .setPin('#equipmentImg')
         // .addIndicators({name: "1 (duration: 0)"})
         // .addTo(controller);


      $(".likebtn").click(function() {
      var d=$(this).attr('data-thumbs');
      var track_id=$(this).attr('data-track');
      var artist_id=$(this).attr('data-artist');
      //alert(track_id);
      $('#idown').removeClass('fas fa-thumbs-down');
      $('#iup').removeClass('fas fa-thumbs-down');
      if(d=='down'){
         $('#idown').addClass('fas fa-thumbs-down');
         $('#iup').addClass('far fa-thumbs-up');
      }else if(d=='up'){
         $('#idown').addClass('far fa-thumbs-down');
         $('#iup').addClass('fas fa-thumbs-down');
      }


            
          $.ajax({
         type:'POST',
         data:{d:d,track_id:track_id,artist_id:artist_id},
          url:base_url+'user-addlike',
           success:function(data){
          //   if (data.st == 0) {
          //   $('#likedata').html(data.msg);
          // } else
          //  if (data.st == 1) {
            
          // }
        }
      },
        'json');
      return false;
  
   });

  </script><!--Start of Tawk.to Script-->
   <script type="text/javascript">
   // var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
   // (function(){
   // var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
   // s1.async=true;
   // s1.src='https://embed.tawk.to/61166576d6e7610a49b009e0/1fcvnombg';
   // s1.charset='UTF-8';
   // s1.setAttribute('crossorigin','*');
   // s0.parentNode.insertBefore(s1,s0);
   // })();
   </script>
   <!--End of Tawk.to Script-->
      <!--Start of Tawk.to Script-->
   <script type="text/javascript">
   // var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
   // (function(){
   // var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
   // s1.async=true;
   // s1.src='https://embed.tawk.to/61166576d6e7610a49b009e0/1fcvnombg';
   // s1.charset='UTF-8';
   // s1.setAttribute('crossorigin','*');
   // s0.parentNode.insertBefore(s1,s0);
   // })();
   </script>
   <!--End of Tawk.to Script-->
   </body>
</html>