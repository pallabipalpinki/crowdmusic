<section class="inner-pg">
			<div class="inner-cover-div">
				<a class="inner-cover-bg twPc-block"> <img src="<?php echo (!empty($user_details['dp_image']))?$user_details['dp_image']:base_url().'assets/images/innercover.jpg';?>" /> </a>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3 col-lg-3" align="center">
							<div class="profile-bg left-inner">
								<!-- <div class="profile-img">
									<img src="<?php echo base_url()?>assets/images/avatar.jpg" alt="Circle Image" width="120" class="rounded-circle img-fluid">
								 </div> -->
								<?php $image=$user_details['profile_image']; ?>
								<div class="col-auto"><img src="<?php echo $image; ?>"  width="120" class="rounded-circle img-fluid"></div>
								<h4 class="profile-heading"><?php echo ucwords($user_details['firstname']); ?> <?php echo ucwords($user_details['lastname']); ?></h4>
								<h5><?php echo $user_details['user_rolename'];?> </h5>
								<!-- <p>Vivamus siscript tortor eget felis portitor volutpat.</p> -->
								<?php
								if(!empty($user_details['address'])){
									?>
									<p><i class="fa fa-map-markar"></i><?php echo $user_details['address'];?></p>
									<?php
								}
								?>
								<a href="<?php echo base_url('user/profile-edit/'.$user_details['id']);?>" class="follow-btn ">
								<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
  								<path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z"/>
								</svg>Edit</a>

								<a href="<?php echo base_url('user-contents');?>" class="follow-btn ">
									<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" /> </svg> Contents</a>
								<a href="#" class="follow-btn ">
									<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" /> </svg> Follow</a>
								<a href="#" class="follow-btn w-button">
									<svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22 5.71651V15.4643C22 16.5446 21.1161 17.4286 20.0357 17.4286H1.96429C0.883929 17.4286 0 16.5446 0 15.4643V5.71651C0.368304 6.12165 0.785714 6.47767 1.23996 6.78459C3.2779 8.17187 5.3404 9.55915 7.34152 11.0201C8.37277 11.7812 9.64955 12.7143 10.9877 12.7143H11.0123C12.3504 12.7143 13.6272 11.7812 14.6585 11.0201C16.6596 9.57142 18.7221 8.17187 20.7723 6.78459C21.2143 6.47767 21.6317 6.12165 22 5.71651ZM22 2.10714C22 3.48214 20.981 4.72209 19.9007 5.47098C17.9855 6.79687 16.058 8.12276 14.1551 9.46093C13.3571 10.0134 12.0067 11.1429 11.0123 11.1429H10.9877C9.9933 11.1429 8.64286 10.0134 7.84487 9.46093C5.94196 8.12276 4.01451 6.79687 2.11161 5.47098C1.23996 4.88169 0 3.49442 0 2.37723C0 1.1741 0.65067 0.142853 1.96429 0.142853H20.0357C21.1038 0.142853 22 1.02678 22 2.10714Z" fill="#fff" /> </svg> Message</a>

								

							</div>
						</div>
						<div class="col-md-9 col-lg-9 right-inner">
							<!-- <div class="row">
								<div class="innernav"> <a class="active" href="#home">Album</a> <a href="#news">Trucks</a> </div>
							</div> -->
							<div class="row">
								<div class="account-bg">
									<div class="profile-head">
										<h4><?php echo $user_details['firstname']; ?> <?php echo $user_details['lastname']; ?></h4>
										<h6><?php echo $user_details['user_rolename']; ?> </h6>
										<!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
										<h5>About The <?php echo $user_details['user_rolename']; ?> </h5>
										<p><?php echo $user_details['about']; ?></p>
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