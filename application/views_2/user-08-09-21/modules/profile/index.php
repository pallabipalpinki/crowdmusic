<section class="inner-pg">
  <div class="inner-cover-div">
    <div class="inner-cover-bg twPc-block"><img src="<?php echo (!empty($user_details['dp_image']))?$user_details['dp_image']:base_url().'assets/images/innercover.jpg';?>" /></div>
    <div class="container">
      <div class="page_view profile-view">
				<div class="row">
					<div class="col-lg-8">
						<!-- <section class="separator">
							<h3 class="title"><?php echo $user_details['user_name']; ?></h3>
							<a href="<?php echo $user_details['user_content_url'];?>" class="follow-btn ">content</a>
							<p>A musician is a person who composes, conducts, or performs music. According to the United States Employment Service, "musician" is a general term used to designate one who follows music as a professiA musician is a person who composes, conducts, or performs music. According to the United States Employment Service, "musician" is a general term used to designate one who follows music as a professio</p>
						</section> -->
						<section class="separator">
							<div class="row">
								<div class="col-lg-3 text-center"> 
									<div class="user-meta">
										<!-- <?php $image=$user_details['profile_image']; ?> -->
										<img src="<?php echo $user_details['user_profile_image']; ?>"  width="120" class="rounded-circle img-fluid mb-4">
										<h4 class="profile-heading"><?php echo $user_details['user_name']; ?></h4>
										<p><?php echo $user_details['user_role']; ?></p>
										<!-- <p>Vivamus siscript tortor eget felis portitor volutpat.</p> -->
																	<?php
							              if(!empty($user_details['user_address'])){
							              	?>
							            <p><i class="fa fa-map-markar"></i><?php echo $user_details['user_address'];?></p>
							            <?php
							              }
							              ?>
									</div>
								</div>
								<div class="col-lg-9">
									<h3 class="title">Profile </h3>
									<p><?php echo $user_details['user_about']; ?></p>

									<?php
									if($user_details['user_profile_edit_url']!=""){
										?>
										<div class="btns">
											<a href="<?php echo $user_details['user_profile_edit_url'];?>" class="follow-btn">
												<i class="fas fa-pen-nib mr-1" style="font-size: 18px;"></i>
												Edit
											</a>
											<a href="<?php echo $user_details['user_content_url'];?>" class="follow-btn opp">
												<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" />
												</svg>
												Contents
											</a>
											<a href="#" class="follow-btn">
												<svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M22 5.71651V15.4643C22 16.5446 21.1161 17.4286 20.0357 17.4286H1.96429C0.883929 17.4286 0 16.5446 0 15.4643V5.71651C0.368304 6.12165 0.785714 6.47767 1.23996 6.78459C3.2779 8.17187 5.3404 9.55915 7.34152 11.0201C8.37277 11.7812 9.64955 12.7143 10.9877 12.7143H11.0123C12.3504 12.7143 13.6272 11.7812 14.6585 11.0201C16.6596 9.57142 18.7221 8.17187 20.7723 6.78459C21.2143 6.47767 21.6317 6.12165 22 5.71651ZM22 2.10714C22 3.48214 20.981 4.72209 19.9007 5.47098C17.9855 6.79687 16.058 8.12276 14.1551 9.46093C13.3571 10.0134 12.0067 11.1429 11.0123 11.1429H10.9877C9.9933 11.1429 8.64286 10.0134 7.84487 9.46093C5.94196 8.12276 4.01451 6.79687 2.11161 5.47098C1.23996 4.88169 0 3.49442 0 2.37723C0 1.1741 0.65067 0.142853 1.96429 0.142853H20.0357C21.1038 0.142853 22 1.02678 22 2.10714Z" fill="#fff" />
												</svg>
												Message
											</a>
										</div>
										<?php
									}


									?>


									
								</div>
							</div>
						</section>
						<section class="separator">
							<h3 class="title">Credits</h3>
							<div class="tags">
								<a href="#">item 1</a>
								<a href="#">item 2</a>
								<a href="#">item 3</a>
								<a href="#">item 4</a>
								<a href="#">item 5</a>
								<a href="#">item 6</a>
							</div>
						</section>
						<section class="review_section">
							<h3 class="title">Reviews <small>(Total 177)</small></h3>
							<div class="review_list">
								<div class="review_head">
									<img src="https://d2p6ecj15pyavq.cloudfront.net/assets/default-avatar-9ec466c89ef1ac291093f0774a5de4d7.png" alt="" class="thumb">
									<div class="details">
										<div class="star-rating">
											<div class="star-rating__wrap">
												<i class="star-rating__icon fas fa-star"></i>
												<i class="star-rating__icon fas fa-star"></i>
												<i class="star-rating__icon fas fa-star"></i>
												<i class="star-rating__icon fas fa-star"></i>
												<i class="star-rating__icon fas fa-star"></i>
											</div>
										</div>
										<h4>17 days ago by <b>Ryan D</b>.</h4>
									</div>
								</div>
								<p>A musician is a person who composes, conducts, or performs music. According to the United States Employment Service, "musician" is a general term used to designate one.</p>
							</div>
							<!-- End .review_list -->
							<div class="review_list">
								<div class="review_head">
									<img src="https://d2p6ecj15pyavq.cloudfront.net/assets/default-avatar-9ec466c89ef1ac291093f0774a5de4d7.png" alt="" class="thumb">
									<div class="details">
										<div class="star-rating">
											<div class="star-rating__wrap">
												<i class="star-rating__icon fas fa-star"></i>
												<i class="star-rating__icon fas fa-star"></i>
												<i class="star-rating__icon fas fa-star"></i>
												<i class="star-rating__icon fas fa-star"></i>
												<i class="star-rating__icon fas fa-star"></i>
											</div>
										</div>
										<h4>17 days ago by <b>Ryan D</b>.</h4>
									</div>
								</div>
								<p>A musician is a person who composes, conducts, or performs music. According to the United States Employment Service, "musician" is a general term used to designate one.</p>
							</div>
							<!-- End .review_list -->
						</section>
					</div>
					<div class="col-lg-4">
						<div class="playlist separator pb-4">
							<div class="display">
								<div class="thumb">
									<img id="trackCover" src="" alt="">
								</div>

								<div class="track">
									<div class="controlls">
										<button id="previousTrack"><i class="fas fa-step-backward"></i></button>
										<button id="playPause"><i class="far fa-play-circle"></i></button>
										<button id="nextTrack"><i class="fas fa-step-forward"></i></button>
									</div>
									<h3 id="trackTitle"></h3>
									<audio>
										<source id="trackSource" src="" type="audio/mpeg">
									</audio>
								</div>
							</div>

							<?php 
							if(!empty($user_details['user_tracks'])){
								?>
								<ul class="list">
									<?php 						
									foreach ($user_details['user_tracks'] as $key => $value) {
										?>
										<li class="active" data-cover="<?php echo $value->content_image;?>" data-source="<?php echo $value->content_track;?>"><?php echo $value->content_track_name;?></li>

											<?php
									}						
									?>
								</ul>
								<?php
							}

							?>
							
						</div>

						<?php
						if(!empty($user_details['user_genres'])){
							?>
							<div class="genres separator">
								<h4 class="title">Genres</h4>
								<a href="#"><?php echo $user_details['user_genres']; ?></a>
							</div>
							<?php
						}
						?>						
					</div>
				</div>
			</div>
    </div>
  </div>
</section>