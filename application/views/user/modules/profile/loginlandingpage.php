<main id="page-view">

		<section class="inner-pg">

			<div class="inner-cover-div">

				<a class="inner-cover-bg twPc-block"> <img src="<?php echo base_url(); ?>assets/images/innercover.jpg" /> </a>

				<div class="artist_body">

					<div class="container">

						<div class="row">



							<?php

						      if(!empty($artists)){

						            foreach ($artists as $key => $value) { 

						            ?>

							<div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">

								<div class="artist-item">

								  <div class="ai-img-wrapper">

								  	<a href="<?php echo $value['artists_profile'];?>" title="show"><img src="<?php echo $value['artists_image'];?>" class="img-responsive"/></a>

									<!-- <img src="<?php echo base_url(); ?>assets/images/edit.jpg" class="img-responsive" /> -->

								  </div>

								  <div class="artist-box">

									<h3><?php echo $value['artists_name'];?></h3>

									<div class="ai-price"><a href="<?php echo $value['artists_profile'];?>" title="show">View Profile</a></div>

									<ul class="rating">

										<li class="fa fa-star"></li>

										<li class="fa fa-star"></li>

										<li class="fa fa-star"></li>

										<li class="fa fa-star"></li>

										<li class="fa fa-star disable"></li>

									</ul>

								  </div>

								  <div class="artist-desc">

									<p><?php echo $value['artist_spec'];?></p>

								  </div>

								</div>

							</div>

							 		<?php

						            }

						      } ?>

      

							<!-- <div class="col mx-1">

								<div class="artist-item">

								  <div class="ai-img-wrapper">

									<img src="<?php echo base_url(); ?>assets/images/edit.jpg" class="img-responsive" />

								  </div>

								  <div class="artist-box">

									<h3>Berry Lace Dress</h3>

									<div class="ai-price">Song Type</div>

									<ul class="rating">

										<li class="fa fa-star"></li>

										<li class="fa fa-star"></li>

										<li class="fa fa-star"></li>

										<li class="fa fa-star"></li>

										<li class="fa fa-star disable"></li>

									</ul>

								  </div>

								  <div class="artist-desc">

									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

								  </div>

								</div>

							</div> -->

							

						</div>





						<div class="row">

						<div class="col-lg-12">

							<div class="iq-card mt-65">

							   <div class="iq-card-header d-flex justify-content-between">

								  <div class="iq-header-title">

									 <h4 class="card-title">Trending Songs</h4>

								  </div>

								  <div class="d-flex align-items-center iq-view">

									 <b class="mb-0 text-primary"><a href="javascript:void(0);">View More <i class="las la-angle-right"></i></a></b>

								  </div>

							   </div>

							   <div class="iq-card-body">

								  <ul class="list-unstyled row iq-box-hover mb-0">





								  	<?php

							         // echo '<pre>';print_r($tracks);



							         if(!empty($tracks)){

							            foreach ($tracks as $key => $value) {

							               ?>

									 <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">

										<div class="iq-card">

										   <div class="iq-card-body p-0">

											  <div class="iq-thumb">

												 <div class="top-item player">

							                      <img src="<?php echo $value['content_image']; ?>" alt="">

							                      <div class="caption">

							                        <!-- <h3><?php echo $value['content_track_name'];?></h3> -->

							                        <h6 class="font-weight-600  mb-0"><?php echo $value['content_track_name'];?></h6>

							                      </div>

							                      <audio>

							                        <source src="<?php echo $value['content_track']; ?>" type="audio/mp3">

							                        Your browser does not support the audio element.

							                      </audio>

							                    </div>

												
												 <div class="feature-list text-center">

												 <button class="btn btn-sm like-track <?php echo $value['content_thumbs'];?>"  data-track="<?php echo $value['content_id'];?>" data-likeby-logged-user="<?php echo $value['like_by_logged_user'];?>" data-total-like-ct="<?php echo $value['total_like_ct'];?>" data-artist="<?php echo $value['content_user_id'];?>"><i class="<?php echo $value['content_thumbs_icon'];?>" id="thumbs<?php echo $value['content_id'];?>"></i><h6 id="like_count<?php echo $value['content_id'];?>"> <?php echo $value['total_like_ct'];?></h6></button>

												 <?php
								                    if($value['content_user_id']!=session_userdata('SESSION_USER_ID')){
								                     ?>
								                      <button class="btn btn-sm comment-track" data-track_user="<?php echo $value['content_user_id'];?>" data-track="<?php echo $value['content_id']; ?>" data-toggle="modal" data-target="#commentModalId"><i class="fa fa-comment" id=""></i></button>
								                      <label class="caption"><a href="<?php echo $value['content_track_user_profile_url'];?>">By-<?php echo $value['content_track_user_name'];?></a></label>
								                     <?php
								                    }else{
								                     ?>
								                     <label class="caption"><a href="<?php echo $value['content_track_user_profile_url'];?>">By-<?php echo $value['content_track_user_name'];?></a></label>
								                     <?php
								                    }
								                    ?>


												</div>

											  </div>

										   </div>

										</div>

									 </li>



											<?php

									         }

									       }



									    ?>

									 <!-- <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">

										<div class="iq-card">

										   <div class="iq-card-body p-0">

											  <div class="iq-thumb">

												 <div class="iq-music-overlay"></div>

												 <a href ="#">

													<img src="<?php echo base_url(); ?>assets/images/01.png" class="img-border-radius img-fluid w-100" alt="">

												 </a>

												 <div class="overlay-music-icon">

													<a href ="#">

													   <i class="fa fa-play-circle"></i>

													</a>

												 </div>

											  </div>

											  <div class="feature-list text-center">

												 <h6 class="font-weight-600  mb-0">Life Is Good</h6>

												 <p class="mb-0">Billie Eilish</p>

											  </div>

										   </div>

										</div>

									 </li> -->



									 

								  </ul>

							   </div>

							</div>

						 </div>

						</div>





					</div>

				</div>









				<!-- <div class="album-featured-music-area mt-50">

					<div class="container">

						<div class="row">

							<div class="col-12">

								<div class="album-music-area box-shadow d-flex align-items-center flex-wrap border" data-animation="fadeInUp" data-delay="900ms" style="animation-delay: 900ms;">

									<div class="album-music-thumbnail"> <img src="<?php echo base_url(); ?>assets/images/x4.webp" alt="" data-pagespeed-url-hash="1794959822" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"> </div>

									<div class="album-music-content"> <span class="music-published-date">December 9, 2018</span>

										<h2>Episode 203 - The Last Blockbuster</h2>

										<div class="music-meta-data">

											<p>By <a href="#" class="music-author">Admin</a> | <a href="#" class="music-catagory">Tutorials</a> | <a href="#" class="music-duration">00:02:56</a></p>

										</div>

										<div class="album-music-player">

											<div class="audioplayer">

												<audio preload="auto" controls="" style="width: 0px; height: 0px; visibility: hidden;">

													<source src="audio/dummy-audio.mp3"> </audio>

												<div class="audioplayer-playpause" title="">

													<a href="#"></a>

												</div>

												<div class="audioplayer-time audioplayer-time-current">00:00</div>

												<div class="audioplayer-bar">

													<div class="audioplayer-bar-loaded"></div>

													<div class="audioplayer-bar-played"></div>

												</div>

												<div class="audioplayer-time audioplayer-time-duration">…</div>

												<div class="audioplayer-volume">

													<div class="audioplayer-volume-button" title="">

														<a href="#"></a>

													</div>

													<div class="audioplayer-volume-adjust">

														<div>

															<div style="width: 100%;"></div>

														</div>

													</div>

												</div>

											</div>

										</div>

										<div class="likes-share-download d-flex align-items-center justify-content-between"> <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Like (29)</a>

											<div> <a href="#" class="mr-4"><i class="fa fa-share-alt" aria-hidden="true"></i> Share(04)</a> <a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a> </div>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div> -->
				<div class="container">
					<!-- sdfdgf -->
				<div class="post-content">
				<?php
				if(!empty($newuserdata)){
					//print_r($newuserdata);die;
					?>
					
					<?php
						$i=0;
						foreach ($newuserdata as $key => $value) {
						  if($value['user_id']==session_userdata('SESSION_USER_ID')){?>
						<div class="post-container">
						   <a href="<?php echo $value['artists_profile'];?>"><img src="<?php echo $value['user_image']; ?>"  class="profile-photo-md pull-left" /></a>
						  <div class="post-detail">
							<div class="user-info">
							  <h5><a href="#" class="profile-link">You</a></h5>
							  <p class="text-muted">Logged-in on <?php echo date('jS F Y', strtotime($value['logindate']));?> as <?php echo $value['user_role_name'];?></p>
							</div>
							
							
							<div class="line-divider"></div>
							<!-- <div class="post-comment">
							 <p><a href="<?php echo $value['artists_profile'];?>">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
							</div> -->
							
						  </div>
						</div>
						     <?php }else{?>



							<div class="post-container">
						   <a href="<?php echo $value['artists_profile'];?>"><img src="<?php echo $value['user_image']; ?>"  class="profile-photo-md pull-left" /></a>
						  <div class="post-detail">
							<div class="user-info">
							  <h5><a href="<?php echo $value['artists_profile'];?>" class="profile-link"><?php echo $value['user_name'];?></a></h5>
							  <p class="text-muted">Logged-in on <?php echo date('jS F Y', strtotime($value['logindate']));?> as <?php echo $value['user_role_name'];?></p>
							</div>
							
							
							<div class="line-divider"></div>
							<!-- <div class="post-comment">
							 <p><a href="<?php echo $value['artists_profile'];?>">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
							</div> -->
							
						  </div>
						</div>
							<?php
									
								}}
							   }
								?>
							
							

				<?php
				if(!empty($newtracks)){
					//print_r($newuserdata);die;
					?>


					   <?php
						$i=0;
						foreach ($newtracks as $key => $value) {
						if($value['content_user_id']==session_userdata('SESSION_USER_ID')){?>




						<div class="post-container">
						  <img src="<?php echo $value['artists_image']; ?>"  class="profile-photo-md pull-left" />
						  <div class="post-detail">
							<div class="user-info">
							  <h5><a href="#" class="profile-link">You</a></h5>
							  <p class="text-muted">Have uploaded track  on  <?php echo date('jS F Y',strtotime($value['uploaddate']));?>  at  <?php echo date('G:ia',strtotime($value['uploaddate']));?></p>
							</div>
							
							
							<div class="line-divider"></div>
							<div class="post-comment">
							   <img src="<?php echo $value['content_image']; ?>"  class="profile-photo-md pull-left" />
							  <p><a href="#" class="profile-link"   area><?php echo $value['content_track_name'];?> </a><i class="em em-laughing"></i> <?php echo $value['content_about'];?> </p>
							</div>
							
						  </div>
						</div>
						<?php }else{ ?>
							<div class="post-container">
						  <img src="<?php echo $value['artists_image']; ?>"  class="profile-photo-md pull-left" />
						  <div class="post-detail">
							<div class="user-info">
							  <h5><a href="#" class="profile-link"><?php echo $value['content_track_user_name']; ?></a></h5>
							  <p class="text-muted">Have uploaded track  on  <?php echo date('jS F Y',strtotime($value['uploaddate']));?>  at  <?php echo date('G:ia',strtotime($value['uploaddate']));?></p>
							</div>
							
							
							<div class="line-divider"></div>
							<div class="post-comment">
							   <img src="<?php echo $value['content_image']; ?>"  class="profile-photo-md pull-left" />
							  <p><a href="#" class="profile-link" area><?php echo $value['content_track_name'];?> </a><i class="em em-laughing"></i> <?php echo $value['content_about'];?> </p>
							</div>
							
						  </div>
						</div>
						<?php
									
								}}}
								?>
<!-- ///========================= -->
							
				

				<?php
				if(!empty($comments)){
					?>
					
						
						
							
							<div class="post-container">
								              
								<?php
								$i=0;
								foreach ($comments as $key => $value) {
									if($i>0){
										?>
										<div class="line-divider"></div>
										<?php
									}
									?>
									<img src="<?php echo $value[0]['comment_content_image']; ?>" alt="<?php echo $value[0]['comment_track']; ?>" class="profile-photo-md pull-left" />
									<div class="post-detail">
										<div class="user-info">
										  <h5><a href="timeline.html" class="profile-link"><?php echo $value[0]['comment_track']; ?></a></h5>
										  <!-- <p class="text-muted">Published a photo about 3 mins ago</p> -->
										</div>
										<div class="reaction">
										  <a class="btn text-green"><i class="fa fa-thumbs-up"></i> <?php echo $value[0]['comment_track_thumbs_up'];?></a>
										  <a class="btn text-red"><i class="fa fa-thumbs-down"></i> <?php echo $value[0]['comment_track_thumbs_down'];?></a>
										</div>
										<div class="line-divider"></div>
										<?php
										if(!empty($value[0]['comments'])){
											foreach ($value[0]['comments'] as $k => $v) {
												?>
												<div class="post-comment">
												  <img src="<?php echo $v->profile_image;?>" alt="" class="profile-photo-sm" />
												  <p><a href="javascript:void(0);" class="profile-link"><?php echo $v->comment_username;?> </a><i class="em em-laughing"></i> <?php echo $v->comment_data;?>  <strong><!-- <?php echo date('F d,Y',strtotime($v->created_at));?> --></strong></p>
												</div>
												<?php
											}

											?>

											<?php
											if($value[0]['comment_track_user']!=session_userdata('SESSION_USER_ID')){
												?>
												<div class="post-comment">
												  <img src="<?php echo $value[0]['logged_in_user_image']; ?>" alt="" class="profile-photo-sm" />
												  	
													  <input type="hidden" value="<?php echo $key;?>" name="content_track" id="content_track">
													  <input type="hidden" name="content_track_user" id="content_track_user" value="<?php echo $value[0]['comment_track_user'];?>">
													  <input type="text" class="form-control" placeholder="Post a comment" id="post_comment">
												</div>
												<?php
											}
										}
										?>
									</div>
									<?php
									$i++;
								}
								?>
							</div>
						</div>
						
					
					<?php
				}

				?>
				</div>
					
				</div>

			</div>

		</section>

	</main>


	<script type="text/javascript">var _user_loggedin='<?php echo session_userdata('SESSION_USER_ID');?>';</script>