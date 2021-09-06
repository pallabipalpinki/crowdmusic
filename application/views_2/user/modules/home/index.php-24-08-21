
<section class="banner">

<!-- Swiper -->
<div class="swiper-container singerlist">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="dp">
          <a href="#"><img src="<?php echo base_url(); ?>assets/images/singer1.jpg" alt=""></a>
        </div>
        <p>Shawn Mendes</p>
      </div>
      <div class="swiper-slide">
        <div class="dp">
          <a href="#"><img src="<?php echo base_url(); ?>assets/images/singer1.jpg" alt=""></a>
        </div>
        <p>Shawn Mendes</p>
      </div>
      <?php
      if(!empty($artists)){
            foreach ($artists as $key => $value) { 
            ?>
      <div class="swiper-slide">
        <div class="dp">
         <a href="<?php echo $value['artists_profile'];?>" title="show"><img src="<?php echo $value['artists_image'];?>" alt="" loading="lazy"/></a>
        </div>
        <p><?php echo $value['artists_name'];?></p>
      </div>
      <?php
            }
      } ?>
      <div class="swiper-slide">
        <div class="dp">
          <a href="#"><img src="<?php echo base_url(); ?>assets/images/singer1.jpg" alt=""></a>
        </div>
        <p>Shawn Mendes</p>
      </div>
      <div class="swiper-slide">
        <div class="dp">
          <a href="#"><img src="<?php echo base_url(); ?>assets/images/singer1.jpg" alt=""></a>
        </div>
        <p>Shawn Mendes</p>
      </div>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>

   <!-- <div class="singers">

      <ul>

         <li class="item">
            <div class="dp"> <img src="<?php echo base_url(); ?>assets/images/singer1.jpg" alt="" /> </div>
            <p>Shawn Mendes</p>
         </li>
         <li class="item">
            <div class="dp"> <img src="<?php echo base_url(); ?>assets/images/singer1.jpg" alt="" /> </div>
            <p>Shawn Mendes</p>
         </li>
         <?php
        

         if(!empty($artists)){
            foreach ($artists as $key => $value) { 
            ?>
            <li class="item">
               <div class="dp">
                  <a href="<?php echo $value['artists_profile'];?>" title="show"><img src="<?php echo $value['artists_image'];?>" alt="" loading="lazy"/></a>
               </div>
               <p><?php echo $value['artists_name'];?></p>
            </li>
             <?php
            }
         }
         ?>
                  
                   <li class="item">
                     <div class="dp"> <img src="<?php echo base_url(); ?>assets/images/singer1.jpg" alt="" /> </div>
                     <p>Shawn Mendes</p>
                  </li>
                  <li class="item">
                     <div class="dp"> <img src="<?php echo base_url(); ?>assets/images/singer1.jpg" alt="" /> </div>
                     <p>Shawn Mendes</p>
                  </li>
      
        

      </ul>

   </div> -->

   <div id="equipmentImg" class="equipment">

      <div class="img"> <img src="<?php echo base_url(); ?>assets/images/equipment-edited.png" alt=""> </div>

      <img class="layerbg" src="<?php echo base_url(); ?>assets/images/bannerBg.svg" alt=""> 

   </div>

</section>

<section id="_top-songs" class="gap">

   <div class="container">

      <div class="header-title onview">

         <p class="sub">Top of the week</p>

         <h2>Top 10 Songs</h2>

      </div>

      <div class="row small-gutter">

          <?php
         // echo '<pre>';print_r($tracks);

         if(!empty($tracks)){
            foreach ($tracks as $key => $value) {
               ?>
               <div class="col-6 col-md-4 col-lg-3 onview">
                <button class="btn btn-sm like-track <?php echo $value['content_thumbs'];?>"  data-track="<?php echo $value['content_id'];?>" data-artist="<?php echo $value['content_user_id'];?>"><i class="<?php echo $value['content_thumbs_icon'];?>" id="thumbs<?php echo $value['content_id'];?>"></i></button>
                  <div class="top-item player">
                      <img src="<?php echo $value['content_image']; ?>" alt="">
                      <div class="caption">
                        <h3><?php echo $value['content_track_name'];?></h3>
                      </div>
                      <audio>
                        <source src="<?php echo $value['content_track']; ?>" type="audio/mp3">
                        Your browser does not support the audio element.
                      </audio>
                    </div>
                    <label class="form-control caption"><a href="<?php echo $value['artists_profile'];?>"><?php echo $value['content_track_user_name'];?></a></label>
                  </div>
               <?php
            }
         }

         ?>

         

         <!-- <div class="col-6 col-md-4 col-lg-3 onview">

            <div class="top-item">

               <img src="<?php echo base_url(); ?>assets/images/top2.jpg" alt="">

               <div class="caption">

                  <h3>Lorem Song 1</h3>

               </div>

            </div>

         </div>

         <div class="col-6 col-md-4 col-lg-3 onview">

            <div class="top-item">

               <img src="<?php echo base_url(); ?>assets/images/top3.jpg" alt="">

               <div class="caption">

                  <h3>Lorem Song 1</h3>

               </div>

            </div>

         </div>

         <div class="col-6 col-md-4 col-lg-3 onview">

            <div class="top-item">

               <img src="<?php echo base_url(); ?>assets/images/top4.jpg" alt="">

               <div class="caption">

                  <h3>Lorem Song 1</h3>

               </div>

            </div>

         </div>

         <div class="col-6 col-md-4 col-lg-3 onview">

            <div class="top-item">

               <img src="<?php echo base_url(); ?>assets/images/top5.jpg" alt="">

               <div class="caption">

                  <h3>Lorem Song 1</h3>

               </div>

            </div>

         </div>

         <div class="col-6 col-md-4 col-lg-3 onview">

            <div class="top-item">

               <img src="<?php echo base_url(); ?>assets/images/top6.jpg" alt="">

               <div class="caption">

                  <h3>Lorem Song 1</h3>

               </div>

            </div>

         </div>

         <div class="col-6 col-md-4 col-lg-3 onview">

            <div class="top-item">

               <img src="<?php echo base_url(); ?>assets/images/top4.jpg" alt="">

               <div class="caption">

                  <h3>Lorem Song 1</h3>

               </div>

            </div>

         </div>

         <div class="col-6 col-md-4 col-lg-3 onview">

            <div class="top-item">

               <img src="<?php echo base_url(); ?>assets/images/top1.jpg" alt="">

               <div class="caption">

                  <h3>Lorem Song 1</h3>

               </div>

            </div>

         </div>

         <div class="col-6 col-md-4 col-lg-3 onview">

            <div class="top-item">

               <img src="<?php echo base_url(); ?>assets/images/top6.jpg" alt="">

               <div class="caption">

                  <h3>Lorem Song 1</h3>

               </div>

            </div>

         </div>

         <div class="col-6 col-md-4 col-lg-3 onview">

            <div class="top-item">

               <img src="<?php echo base_url(); ?>assets/images/top2.jpg" alt="">

               <div class="caption">

                  <h3>Lorem Song 1</h3>

               </div>

            </div>

         </div> -->

         <div class="col-md-8 col-lg-6 onview">

            <div class="top-more">

               <h3>See More <img src="<?php echo base_url(); ?>assets/images/more.svg" alt=""></h3>

            </div>

         </div>

      </div>

   </div>

</section>

<section id="_intro" class="gap side-banner">

   <div class="container">

      <div class="row">

         <div class="col-xl-5 onview"><img class="bg" src="<?php echo base_url(); ?>assets/images/introBg.jpg" alt=""></div>

         <div class="col-xl-7 py-xl-5 in-right onview">

            <div class="mb-4">

               <h3>Over 50,000 musicians have used and trust CrowdmusiQ</h3>

               <p>Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Nulla quis lorem ut libero malesuada feugiat.</p>

            </div>

            <div class="row">

               <div class="col-md-6 onview">

                  <div class="point mb-4">

                     <h4>Lorem ipsum dolor sit.</h4>

                     <p>consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>

                  </div>

               </div>

               <div class="col-md-6 onview">

                  <div class="point mb-4">

                     <h4>Lorem ipsum dolor sit.</h4>

                     <p>consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>

                  </div>

               </div>

               <div class="col-md-6 onview">

                  <div class="point mb-4">

                     <h4>Lorem ipsum dolor sit.</h4>

                     <p>consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>

                  </div>

               </div>

               <div class="col-md-6 onview">

                  <div class="point mb-4">

                     <h4>Lorem ipsum dolor sit.</h4>

                     <p>consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>

                  </div>

               </div>

            </div>

         </div>

      </div>

   </div>

</section>

<section id="_categories" class="gap">

   <div class="container">

      <div class="header-title onview">

         <p class="sub">Search by category</p>

         <h2>All Categories</h2>

      </div>

      <div class="row small-gutter justify-content-center">

         <?php 
         if(!empty($categories)){
            foreach ($categories as $key => $value) {
               ?>
               <div class="col-lg-4 col-md-6 onview">
                  <div class="cat-box">
                     <a href="<?php echo $value['spec_url'];?>"><img src="<?php echo $value['spec_img'];?>" alt="<?php echo $value['spec_name'];?>" loading="lazy"></a>
                     <h3><?php echo $value['spec_name'];?></h3>
                  </div>
               </div>
               <?php
            }
         }
         ?>

      </div>

   </div>

</section>

<script type="text/javascript">var _user_loggedin='<?php echo session_userdata('SESSION_USER_ID');?>';</script>