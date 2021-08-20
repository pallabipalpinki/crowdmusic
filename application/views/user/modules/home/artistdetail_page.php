<main id="page-view">
  <section class="inner-pg">
    <div class="inner-cover-div">
      <a class="inner-cover-bg twPc-block"> <img src="<?php echo base_url().'assets/images/innercover.jpg';?>" /></a>
      <div class="container">
        <div class="row">
          <div class="col-lg-auto">
            <div class="profile-bg left-inner text-center">
              <div class="user-meta">
                <img src="<?php echo $user_details['user_profile_image'] ?>"  width="160" height="160" class="rounded-circle img-fluid mb-4">
                <h4 class="profile-heading"><?php echo $user_details['user_name'];?></h4>
                <p><?php echo ucwords($user_details['user_role'])?></p>
                <p>
                  <img src="<?php echo base_url('assets/images/map-pin.svg');?>" alt="">
                  <?php echo $user_details['user_address']?>
                </p>
              </div>
              <div class="btns">
                <a href="javascript:void(0);" class="follow-btn" id="btn_follow" data-usr="<?php echo $user_details['user_id'];?>" data-usr_followed_by="<?php echo $user_details['user_followed_by_me'];?>" data-follow_count="<?php echo $user_details['user_total_followers'];?>">
                  <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" />
                  </svg>
                  <?php echo $user_details['user_following'];?>
                </a>
                <!-- <a href="#" class="follow-btn opp">
                  <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 5.71651V15.4643C22 16.5446 21.1161 17.4286 20.0357 17.4286H1.96429C0.883929 17.4286 0 16.5446 0 15.4643V5.71651C0.368304 6.12165 0.785714 6.47767 1.23996 6.78459C3.2779 8.17187 5.3404 9.55915 7.34152 11.0201C8.37277 11.7812 9.64955 12.7143 10.9877 12.7143H11.0123C12.3504 12.7143 13.6272 11.7812 14.6585 11.0201C16.6596 9.57142 18.7221 8.17187 20.7723 6.78459C21.2143 6.47767 21.6317 6.12165 22 5.71651ZM22 2.10714C22 3.48214 20.981 4.72209 19.9007 5.47098C17.9855 6.79687 16.058 8.12276 14.1551 9.46093C13.3571 10.0134 12.0067 11.1429 11.0123 11.1429H10.9877C9.9933 11.1429 8.64286 10.0134 7.84487 9.46093C5.94196 8.12276 4.01451 6.79687 2.11161 5.47098C1.23996 4.88169 0 3.49442 0 2.37723C0 1.1741 0.65067 0.142853 1.96429 0.142853H20.0357C21.1038 0.142853 22 1.02678 22 2.10714Z" fill="#fff" />
                  </svg>
                  Message
                </a> -->
              </div>
              <div class="m_bottom_30 m_top_30">
                <div class="row">
                  <div class="col-auto">Albums</div>
                  <div class="col-auto ml-auto"><?php echo $user_details['total_albums'];?></div>
                </div>
              </div>
              <div class="m_bottom_30 m_top_30">
                <div class="row">
                  <div class="col-auto">Tracks</div>
                  <div class="col-auto ml-auto"><?php echo $user_details['total_tracks'];?></div>
                </div>
              </div>
              <div class="m_bottom_30 m_top_30">
                <div class="row">
                  <div class="col-auto">Followers</div>
                  <div class="col-auto ml-auto" id="follow_count"><?php echo $user_details['user_total_followers'];?></div>
                </div>
              </div>
              <div class="own_profile_text">
                <h4>About the <?php echo $user_details['user_role'];?></h4>
                <p><?php echo $user_details['user_about'];?> </p>
                <a href="#" class="btn btn_blue my-3">Member since <b><?php echo $user_details['user_created_at'];?></b> </a> 
              </div>
            </div>
          </div>
          <div class="col-lg my-5">
            <div class="row">
                <div class="account-bg">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-album-tab" data-toggle="pill" href="#pills-album" role="tab" aria-controls="pills-album" aria-selected="true">Album</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-track-tab" data-toggle="pill" href="#pills-track" role="tab" aria-controls="pills-track" aria-selected="false">Track</a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-album" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                      <?php
                        if(!empty($user_details['album'])){
                        
                          foreach ($user_details['album'] as $key => $value) {
                          ?>
                          <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="top-item">
                              <img src="<?php echo $value['album_image_file']; ?>" alt="">
                              <div class="caption">
                                <h3>
                                 <a href="<?php echo base_url('album-track-view'); ?>/<?php echo $value['album_id'];?>/<?php echo $value['album_user_id'];?>" title="show"> <?php echo $value['album_name'];?></a>
                                </h3>
                              </div>
                            </div>
                          </div>
                          <?php
                          }
                        }else{
                          echo "<b><p>There is no music to show</p></b>";
                        }                        
                        ?>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="pills-track" role="tabpanel" aria-labelledby="pills-profile-tab">
    								<!-- <p class="text-right">
    									<a href="#" class="follow-btn opp">Compose</a>
    								</p> -->
                    <div class="row">
                      <!-- <?php
                        // echo '<pre>';print_r($tracks);
                        
                        if(!empty($artist)){
                        
                        foreach ($artist as $key => $value) {
                        	?>
                        <section class="col-lg-4 col-md-4 col-sm-6 m_top_30">
                        				 <div class="top-item">
                        						<img src="<?php echo $value['content_image']; ?>" alt="">
                        						<div class="caption">
                        							 <h3><?php echo $value['content_track_name'];?></h3>
                        						</div>
                        				 </div>
                        		 </section>
                        <?php
                          }
                          }else{
                          echo "<b><p>There is no music to show</p></b>";
                          }
                          
                          ?>
                        -->
                      <?php
                        if(!empty($user_details['artist_tracks'])){
                        	 foreach ($user_details['artist_tracks'] as $key => $value) {
                        			?>
                              <div class="col-lg-4 col-sm-6 mb-4">
                                <button class="btn btn-sm like-track <?php echo $value['content_thumbs'];?>"  data-track="<?php echo $value['content_id'];?>" data-artist="<?php echo $value['content_user_id'];?>"><i class="<?php echo $value['content_thumbs_icon'];?>" id="thumbs<?php echo $value['content_id'];?>"></i></button>
                                <div class="top-item player">
                                  <img src="<?php echo $value['content_image']; ?>" alt="">
                                  <div class="caption">
                                    <h3><?php echo $value['content_track_name'];?></h3>
                                  </div>
                                  <audio>
                                    <source src="<?php echo $value['content_track'];?>" type="audio/mp3">
                                    Your browser does not support the audio element.
                                  </audio>
                                </div>
                              </div>
                            <?php
                          }
                        }else{
                          echo "<b><p>There is no music to show</p></b>";
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</main>

<script type="text/javascript">var _user_loggedin='<?php echo session_userdata('SESSION_USER_ID');?>'; var u_type='';</script>