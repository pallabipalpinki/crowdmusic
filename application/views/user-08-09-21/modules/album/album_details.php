<main id="page-view">
		<section class="inner-pg">
			<div class="inner-cover-div">
				<a class="inner-cover-bg twPc-block"> <img src="<?php echo base_url().'assets/images/innercover.jpg';?>" /> </a>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3 col-lg-3" align="center">
							<div class="profile-bg left-inner">
								<!-- <div class="profile-img">  -->
									<img src="<?= $artist[0]['profile_image'] ?>"  width="160" height="160" class="rounded-circle img-fluid mb-4">
									
								<!-- </div> -->
								<h4 class="profile-heading"><?= ucwords($artist[0]['firstname'])." ".ucwords($artist[0]['lastname'])?></h4>
								<p><?= ucwords($artist[0]['role_name'])?></p>
								<p><i class="fa fa-map-markar"></i><?=$artist[0]['address']?></p>
								<a href="#" class="follow-btn ">
									<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" /> </svg> Follow</a>
								<a href="#" class="follow-btn w-button">
									<svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22 5.71651V15.4643C22 16.5446 21.1161 17.4286 20.0357 17.4286H1.96429C0.883929 17.4286 0 16.5446 0 15.4643V5.71651C0.368304 6.12165 0.785714 6.47767 1.23996 6.78459C3.2779 8.17187 5.3404 9.55915 7.34152 11.0201C8.37277 11.7812 9.64955 12.7143 10.9877 12.7143H11.0123C12.3504 12.7143 13.6272 11.7812 14.6585 11.0201C16.6596 9.57142 18.7221 8.17187 20.7723 6.78459C21.2143 6.47767 21.6317 6.12165 22 5.71651ZM22 2.10714C22 3.48214 20.981 4.72209 19.9007 5.47098C17.9855 6.79687 16.058 8.12276 14.1551 9.46093C13.3571 10.0134 12.0067 11.1429 11.0123 11.1429H10.9877C9.9933 11.1429 8.64286 10.0134 7.84487 9.46093C5.94196 8.12276 4.01451 6.79687 2.11161 5.47098C1.23996 4.88169 0 3.49442 0 2.37723C0 1.1741 0.65067 0.142853 1.96429 0.142853H20.0357C21.1038 0.142853 22 1.02678 22 2.10714Z" fill="#fff" /> </svg> Message</a>
								<div class="m_bottom_30 m_top_30 ">
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
								</div>
								<div class="m_bottom_30 m_top_30 ">
									<div class="row">
										<div class="col-md-4 col-4"> <span>Followers</span> </div>
										<div class="col-md-8 col-4 text-right"> <span class="">650</span> </div>
									</div>
								</div>
								<div class="own_profile_text">
									<h4>About the <?= ucwords($artist[0]['role_name'])?></h4>
									<p><?=$artist[0]['about']?> </p> <a href="#" class="btn btn_blue my-3">Member since <b><?=date('jS F Y', strtotime($artist[0]['created_at']))?></b> </a> </div>
							</div>
						</div>
						<div class="col-md-9 col-lg-9 right-inner">
							<div class="row">
								<div class="innernav"> <a class="active" id="chkalbum" href="javascript:void(0);">Album</a> <a  id="chktrack" href="javascript:void(0);">Track</a></div>
							</div>
							<article class="row" id="artist_album">
								
								 <?php
         						// echo '<pre>';print_r($tracks);

				         	if(!empty($album)){

				            foreach ($album as $key => $value) {
				               ?>
							   <section class="col-lg-4 col-md-4 col-sm-6 m_top_30">
				                 <div class="top-item">
				                
				                 
				                     <img src="<?php echo $value['album_image_file']; ?>" alt="">
				                     <div class="caption">

				                       <h3><?php echo $value['album_name'];?><!-- <a href="javascript:void(0);" title="show" onclick="artistAlbumshow('<?=base_url('album-detail-view/'.$value['album_id'])?>','<?= $value['id']?>')"> --></h3>
				                     </div>
				                  </div>
				              </section>
								 <?php
						            }
						         }else{
						            echo "<b><p>There is no music to show</p></b>";
						         }

						         ?>
								<!-- <section class="col-lg-4 col-md-4 col-sm-6 m_top_30"> <img src="images/innerimg5.jpg" /> </section>
								<section class="col-lg-4 col-md-4 col-sm-6 m_top_30"> <img src="images/innerimg4.jpg" /> </section>
								<section class="col-lg-4 col-md-4 col-sm-6 m_top_30"> <img src="images/innerimg1.jpg" /> </section>
								<section class="col-lg-4 col-md-4 col-sm-6 m_top_30"> <img src="images/innerimg2.jpg" /> </section>
								<section class="col-lg-4 col-md-4 col-sm-6 m_top_30"> <img src="images/innerimg3.jpg" /> </section> -->
							</article>

							<article class="row" id="artist_track">
								
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
         						// echo '<pre>';print_r($tracks);

				         
						         // echo '<pre>';print_r($tracks);

						         if(!empty($artist)){
						            foreach ($artist as $key => $value) {
						               ?>
						               <div class="col-6 col-md-4 col-lg-3 onview">
						                <!--   <div class="top-item">
						                     <img src="<?php echo $value->content_image; ?>" alt="">
						                     <div class="caption">
						                        <h3><?php echo $value->content_track_name;?></h3>
						                     </div>
						                  </div> -->
						                  <div class="top-item player">
						                      <img src="<?php echo $value['content_image']; ?>" alt="">
						                      <div class="caption">
						                        <h3><?php echo $value['content_track_name'];?></h3>
						                      </div>
						                      <audio>
						                       <!--  <source src="<?php echo base_url(); ?>assets/80s_vibe.mp3" type="audio/mp3"> -->
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
								<!-- <section class="col-lg-4 col-md-4 col-sm-6 m_top_30"> <img src="images/innerimg5.jpg" /> </section>
								<section class="col-lg-4 col-md-4 col-sm-6 m_top_30"> <img src="images/innerimg4.jpg" /> </section>
								<section class="col-lg-4 col-md-4 col-sm-6 m_top_30"> <img src="images/innerimg1.jpg" /> </section>
								<section class="col-lg-4 col-md-4 col-sm-6 m_top_30"> <img src="images/innerimg2.jpg" /> </section>
								<section class="col-lg-4 col-md-4 col-sm-6 m_top_30"> <img src="images/innerimg3.jpg" /> </section> -->
							</article>
							<article class="row" id="artist_album">
							</article>

						</div>
					</div>
				</div>
			</div>
			</div>
		</section>
	</main>