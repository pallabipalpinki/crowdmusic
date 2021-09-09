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
                     <ul id="footer-right-menu" class="t-mar">
                        <li><a href="#">testing</a>
                         <ul>
                           <li><a href="#">testing</a></li>
                           <li><a href="#">testing</a></li>
                         </ul>
                        </li>
                     </ul>
                     <ul class="list-unstyled social-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="<?php echo base_url('aboutus');?>">About Us</a></li>
                        <li><a href="<?php echo base_url('privacy-policy');?>">Privacy Policy</a></li>
                        <li><a href="#">Work with Us</a></li>
                        <li><a href="<?php echo base_url('conactus');?>">Contact Us</a></li>
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
                        <li class="list-inline-item">
                           <div class="mobile-menu-section">
                              <input type="checkbox" id="btnControl-footer" />
                              <label class="btn" for="btnControl-footer" id="footer-toggle">
                                <div class="hamburger hamburger-container">
                                  <span></span>
                                  <span></span>
                                  <span></span>
                                  <span></span>
                                </div>
                              </label>  
                            </div>
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



      <?php

      if(session_userdata('SESSION_USER_ID')){
         ?>
         <div class="modal fade da-modal signinModal" id="commentModalId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg loginForm" role="document">
               <div class="modal-content px-2">
                <div class="modal-header">
                  <div class="header-title mb-0">
                    <h2>Comment</h2>
                  </div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div id="commentmsg"></div>
                  <form id="comment_form">
                     <input type="hidden" name="content_track" id="content_track">
                     <input type="hidden" name="content_track_user" id="content_track_user">
                    <div class="form-group">
                      <textarea class="form-control" rows="5" name="comment_data" id="comment_data"></textarea>
                    </div>
                    <!-- <a href="#"> <span></span> <span></span> <span></span> <span></span> Submit </a> -->
                    <button class="log-btn btn btn-lg btn-primary btn-block" type="submit" id="comment_btn" >Submit</button>
                  </form>
                </div>
               </div>
            </div>
         </div>
         <?php
      }

      ?>
<script type="text/javascript">
  
  var base_url= '<?php echo base_url();?>';
</script>

      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
      <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery.flipster.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/gsap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/additional-methods.min.js"></script>
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


      if($page=='categories_page'){
         ?>
         <script src="<?php echo base_url(); ?>assets/js/category_search.js"></script>
         <?php         
      }

      if(session_userdata('SESSION_USER_ID')){
         ?>
         <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
         <?php
         if($module=='message' && $page=='index'){
            ?>
            <script src="<?php echo base_url(); ?>assets/js/chat.js"></script>
            <?php         
         }
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
         <script type="text/javascript">
              

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

         </script>
         <?php
       }else{
         ?>
         <script type="text/javascript">
            function openSignin(){
                $('#signinModalId').modal('show');
                $('#signupModalId').modal('hide');
            }
         </script>
         <?php
       }
      ?>

      


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
   <script>
             $("#footer-toggle").on('click', function() {
  $('#footer-right-menu').toggleClass("active");
});

$(document).keydown(function(e) {
    if (e.keyCode == 27) {
       $('#footer-right-menu').removeClass("active");
       $('#btnControl-footer').prop('checked', false);
    }
});
         </script>
   <!--End of Tawk.to Script-->
   </body>
</html>