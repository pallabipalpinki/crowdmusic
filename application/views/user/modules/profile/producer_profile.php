<section class="inner-pg">
  <div class="inner-cover-div">
    <a class="inner-cover-bg twPc-block"> <img src="<?php echo $user_details['user_dp_image'];?>" /> </a>
    <div class="container">
      <div class="row">
        <div class="col-lg-auto">
          <div class="profile-bg left-inner text-center">
            <!-- <div class="profile-img"> </div> -->
            <div class="user-meta">
              <img src="<?php echo $user_details['user_profile_image']; ?>" id="img_profile" width="160" height="160" class="rounded-circle img-fluid mb-4" loading="lazy">
              <h4 class="profile-heading"><?php echo $user_details['user_name']; ?></h4>
              <p><?php echo $user_details['user_role'];?> </p>
              <!-- <p>Vivamus siscript tortor eget felis portitor volutpat.</p> -->
              <?php
                if(!empty($user_details['user_address'])){
                  ?>
              <p><img src="<?php echo base_url('assets/images/map-pin.svg');?>" alt=""><?php echo $user_details['user_address'];?></p>
              <?php
                }
                ?>
            </div>
            <div class="btns">

              <?php
              if($user_details['user_profile_edit_url']!=''){
                ?>
                <a href="<?php echo $user_details['user_profile_edit_url']; ?>" class="follow-btn">
                  <i class="fas fa-pen"></i>
                  Edit Profile
                </a>
                <?php
              }


              if($user_details['user_content_url']!=''){
                ?>
                <a href="<?php echo $user_details['user_content_url']; ?>" class="follow-btn opp">
                  <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" />
                  </svg>
                  Contents
                </a>
                <?php
              }
              ?>
              
              
              <!-- <a href="#" class="follow-btn ">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                
                  <path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" /> </svg> Follow</a> -->

                  <?php
                  if($user_details['user_contributorlist_url']!=''){
                    ?>
                    <a href="<?php echo $user_details['user_contributorlist_url'];?>"  class="follow-btn">
                      <i class="fas fa-microphone mr-1" style="font-size: 18px;"></i>Contributors
                      </a>
                    <?php
                  }

                  ?>

                  <?php
                  if($user_details['user_message_link']!=''){
                    ?>
                    <a href="<?php echo $user_details['user_message_link'];?>" class="follow-btn">
                      <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 5.71651V15.4643C22 16.5446 21.1161 17.4286 20.0357 17.4286H1.96429C0.883929 17.4286 0 16.5446 0 15.4643V5.71651C0.368304 6.12165 0.785714 6.47767 1.23996 6.78459C3.2779 8.17187 5.3404 9.55915 7.34152 11.0201C8.37277 11.7812 9.64955 12.7143 10.9877 12.7143H11.0123C12.3504 12.7143 13.6272 11.7812 14.6585 11.0201C16.6596 9.57142 18.7221 8.17187 20.7723 6.78459C21.2143 6.47767 21.6317 6.12165 22 5.71651ZM22 2.10714C22 3.48214 20.981 4.72209 19.9007 5.47098C17.9855 6.79687 16.058 8.12276 14.1551 9.46093C13.3571 10.0134 12.0067 11.1429 11.0123 11.1429H10.9877C9.9933 11.1429 8.64286 10.0134 7.84487 9.46093C5.94196 8.12276 4.01451 6.79687 2.11161 5.47098C1.23996 4.88169 0 3.49442 0 2.37723C0 1.1741 0.65067 0.142853 1.96429 0.142853H20.0357C21.1038 0.142853 22 1.02678 22 2.10714Z" fill="#fff" />
                      </svg>
                      Message
                    </a>
                    <?php
                  }
                  ?>
              
            </div>
            <!-- <div class="m_bottom_30 m_top_30 ">
              <div class="row">
              
                <div class="col-md-4 col-4"> <span>Lorem</span> </div>
              
                <div class="col-md-8 col-4 text-right"> <span class="">650</span> </div>
              
              </div>
              
              </div>
              
              <div class="m_bottom_30 m_top_30 ">
              
              <div class="row">
              
                <div class="col-md-4 col-4"> <span>Lorem</span> </div>
              
                <div class="col-md-8 col-4 text-right"> <span class="">650</span> </div>
              
              </div>
              
              </div> -->
            <!-- <div class="m_bottom_30 m_top_30 ">
              <div class="row">
              
                <div class="col-md-4 col-4"> <span>Followers</span> </div>
              
                <div class="col-md-8 col-4 text-right"> <span class="">650</span> </div>
              
              </div>
              
              </div> -->
            <div class="m_bottom_30 m_top_30 ">
              <div class="row">
                <div class="col-md-4 col-4"> <span></span> </div>
                <div class="col-md-8 col-4 text-right"> <span class=""></span> </div>
              </div>
            </div>
            <div class="own_profile_text">
              <h4>About</h4>
              <div class="more_text">
                <p><?php echo $user_details['user_about']; ?></p>
                <a href="#" class="more_btn">Read more</a>
              </div>
              <a href="#" class="btn btn_blue my-3">Member since  <?php echo $user_details['user_created_at'];?></a> 
            </div>
          </div>
        </div>
        <div class="col-lg my-5">
          <div class="row">
            <div class="account-bg">
              <div class="container">
               
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>