<section class="inner-pg">
			<div class="inner-cover-div">
				<a class="inner-cover-bg twPc-block"> <img src="<?php echo (!empty($user_details['dp_image']))?$user_details['dp_image']:base_url().'assets/images/innercover.jpg';?>" /> </a>
				<div class="container">
					<div class="row">
						<div class="col-lg-auto">
							<div class="profile-bg left-inner text-center">
								<div class="user-meta">
									
									<img src="<?php echo $user_details['user_profile_image']; ?>" width="160" height="160" class="rounded-circle img-fluid mb-4">
									<h4 class="profile-heading"><?php echo $user_details['user_name']; ?></h4>
									<p><?php echo $user_details['user_role'];?></p>
									<?php
									if(!empty($user_details['user_address'])){
										?>
										<p><img src="<?php echo base_url('assets/images/map-pin.svg');?>" alt=""><?php echo $user_details['user_address'];?></p>
										<?php
									}
									?>
								</div>
								<div class="btns">
									<a href="<?php echo $user_details['user_profile_url']; ?>" class="follow-btn">
										<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" /> </svg> My Profile</a>

										<a href="<?php echo $user_details['user_content_url']; ?>" class="follow-btn ">
				              <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
				                <path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" />
				              </svg>
				              Contents
				            </a>
									<!-- <a href="#" class="follow-btn opp">
										<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" /> </svg> Follow</a> -->
									<a href="#" class="follow-btn">
										<svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M22 5.71651V15.4643C22 16.5446 21.1161 17.4286 20.0357 17.4286H1.96429C0.883929 17.4286 0 16.5446 0 15.4643V5.71651C0.368304 6.12165 0.785714 6.47767 1.23996 6.78459C3.2779 8.17187 5.3404 9.55915 7.34152 11.0201C8.37277 11.7812 9.64955 12.7143 10.9877 12.7143H11.0123C12.3504 12.7143 13.6272 11.7812 14.6585 11.0201C16.6596 9.57142 18.7221 8.17187 20.7723 6.78459C21.2143 6.47767 21.6317 6.12165 22 5.71651ZM22 2.10714C22 3.48214 20.981 4.72209 19.9007 5.47098C17.9855 6.79687 16.058 8.12276 14.1551 9.46093C13.3571 10.0134 12.0067 11.1429 11.0123 11.1429H10.9877C9.9933 11.1429 8.64286 10.0134 7.84487 9.46093C5.94196 8.12276 4.01451 6.79687 2.11161 5.47098C1.23996 4.88169 0 3.49442 0 2.37723C0 1.1741 0.65067 0.142853 1.96429 0.142853H20.0357C21.1038 0.142853 22 1.02678 22 2.10714Z" fill="#fff" /> </svg> Message</a>
								</div>
							</div>
						</div>
						<div class="col-lg my-5">
							<ul class="nav nav-pills mb-3 profile-tab" id="pills-tab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="pills-album-tab" data-toggle="pill" href="#pills-album" role="tab" aria-controls="pills-album" aria-selected="true">Album</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="pills-track-tab" data-toggle="pill" href="#pills-track" role="tab" aria-controls="pills-track" aria-selected="false">Tracks</a>
								</li>
								<li class="nav-item ml-auto" role="presentation">
									<a href="#contentsModalId" id="upload_button" data-toggle="modal" type="button" class="nav-link active">Upload</a>
								</li>
							</ul>
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-album" role="tabpanel" aria-labelledby="pills-home-tab">
									<div class="row" id="album_div">
										
									</div>
								</div>
								<div class="tab-pane fade" id="pills-track" role="tabpanel" aria-labelledby="pills-profile-tab">
									<div class="row" id="tracks_div">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</section>
		
		<div class="modal fade da-modal signinModal" id="contentsModalId" tabindex="-1" role="dialog" aria-labelledby="contentsModalIdLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg loginForm" role="document">
        <div class="modal-content px-2">
          <div class="modal-header">
            <div class="header-title mb-0">
              <h2>Create Album</h2>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_album_tracks" method="post" enctype="multipart/form-data">
            	<input type="hidden" name="content_id" id="content_id">
            	<div class="row">
            		<div class="col-sm-6">
                  	<div class="form-group">
	                    <label>Content Type</label>
	                    <select class="form-control" id="content_type" name="content_type">
	                    	<option value="1">Track</option>
	                    	<option value="2" selected="">Album</option>
	                    </select>
                  	</div>
              	</div>
              	<div class="col-sm-6" id="content_genere_div">
                  	<div class="form-group">
	                    <label>Generes</label>
	                    <select class="form-control" name="content_genere" id="content_genere">
	                    	<?php
	                    	if(!empty($content_generes)){
	                    		foreach ($content_generes as $key => $value) {
	                    			?>
	                    			<option value="<?php echo $value->genere_id;?>"><?php echo $value->genere_name;?></option>
	                    			<?php
	                    		}
	                    	}
	                    	?>
	                    </select>
                  	</div>
              	</div>
            </div>
						<div class="form-group">
								<label>Title</label>
								<input type="text" name="content_title" id="content_title" class="form-control">
								<span style="color:red"></span>
						</div>
						<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" rows="2" name="content_desc" id="content_desc"></textarea>
								<span style="color:red"></span>
						</div>
						<div class="form-group">
							<label>Cover Image (.png,.jpg)</label>
							<input type="file" name="content_cover_image">
						</div>
						<div class="form-group">
							<label>Track (.mp3)</label>
							<input type="file" name="content_track">
						</div>
						<div class="form-group">
							<label>Add Tags</label>
							<input name="tags" placeholder="write some tags" value="new">
						</div> 
						<button class="log-btn btn btn-lg btn-primary btn-block" type="submit" id="upload_album_track" >Upload Track</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade da-modal signinModal" id="contentsModalTracksId" tabindex="-1" role="dialog" aria-labelledby="contentsModalTracksIdLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg loginForm" role="document">
        <div class="modal-content px-2">
          <div class="modal-header">
            <div class="header-title mb-0">
              <h2>Upload Tracks</h2>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_album_only_tracks" method="post" enctype="multipart/form-data">
            	<input type="hidden" name="content_type" id="content_type" value="1">
            	<input type="hidden" name="content_album_id" id="content_album_id">
            	<div class="row">
            		
              	<div class="col-lg-12" id="content_genere_div">
                  	<div class="form-group">
	                    <label>Generes</label>
	                    <select class="form-control" name="content_genere" id="content_genere">
	                    	<?php
	                    	if(!empty($content_generes)){
	                    		foreach ($content_generes as $key => $value) {
	                    			?>
	                    			<option value="<?php echo $value->genere_id;?>"><?php echo $value->genere_name;?></option>
	                    			<?php
	                    		}
	                    	}
	                    	?>
	                    </select>
                  	</div>
              	</div>
            </div>
            <div class="row">
            	<div class="col-lg-12">
	                <div class="form-group">
	                    <label>Title</label>
	                    <input type="text" name="content_title" id="content_title" class="form-control">
	                    <span style="color:red"></span>
	                </div>
	            </div>
            </div>
            <div class="row">
            	<div class="col-lg-12">
	                <div class="form-group">
	                    <label>Description</label>
	                    <textarea class="form-control" rows="2" name="content_desc" id="content_desc"></textarea>
	                    <span style="color:red"></span>
	                </div>
	            </div>
            </div>

            <div class="row">
            		<div class="col-sm-6">
                  	<div class="form-group">
	                    <label>Cover Image (.png,.jpg)</label>
	                    <input type="file" name="content_cover_image">
                  	</div>
              	</div>
              	<div class="col-sm-6" id="content_track_div">
                  	<div class="form-group">
	                    <label>Track (.mp3)</label>
	                    <input type="file" name="content_track">
                  	</div>
              	</div>
            </div>
             
              <button class="log-btn btn btn-lg btn-primary btn-block" type="submit" id="upload_album_only_track" >Upload Track</button>

            </form>
          </div>
        </div>
      </div>
    </div>


<style type="text/css">
	.innernav button.active {
	    background-color: #4100f5;
	    color: white;
	    border-radius: 6px;
	}
	.innernav button {
	    float: right;
	    color: #000000;
	    text-align: center;
	    padding: 5px 16px;
	    text-decoration: none;
	    font-size: 15px;
	    font-weight: 500;
	}

	.btn_group{
		position: absolute;
    bottom: 1em;
    right: 2em;
    /*background-color: #8F0005;
    border-radius: 0.5em;
    color: white;
    text-transform: uppercase;
    padding: 0em 1.5em;*/
    display: none;
	}

	img:hover + .btn_group, .btn_group:hover {
    display: inline-block;
	}
</style>