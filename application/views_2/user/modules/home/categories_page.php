<main id="page-view">
		<section class="inner-pg artist-sec">
			<div class="inner-cover-div">
				
				<div class="artist_body">
					<div class="container-fluid">
						<div class="row">
							<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<button type="button" class="btn btn-sm  btn-primary m-t-15"><i class="fa fa-search "> </i> Filter</button>
							</div> -->
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<div class="form-line">
										<input type="text" id="system_srch_param" class="form-control" placeholder="Search ....">
									</div>
								</div>
							</div>
							<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<select class="form-control" id="system_genere">
										<option value="0">All Genere</option>
										<?php 
										// if(!empty($geners)){
										// 	foreach ($geners as $key => $value) {
										// 		?>
										// 		<option value="<?php echo $value->genere_id;?>"><?php echo $value->genere_name;?></option>
										// 		<?php
										// 	}
										// }
										?>
									</select>
								</div>
							</div> -->

							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<select class="form-control" id="system_category">
										<option value="0">All Categories</option>
										<?php 
										if(!empty($categories)){
											foreach ($categories as $key => $value) {
												?>
												<option value="<?php echo $value['spec_id'];?>" <?php echo $value['selected'];?>><?php echo $value['spec_name'];?></option>
												<?php
											}
										}
										?>
									</select>
								</div>
							</div>
							
						</div>
						<div class="row" id="cate_list">
							<?php
							if(!empty($category_users)){
								foreach ($category_users as $key => $value) {
									?>
									<div class="col-md-3">
										<div class="artist-item">
										  <div class="ai-img-wrapper">
											<img src="<?php echo $value['user_image'];?>" class="img-responsive" loading="lazy"/>
										  </div>
										  <div class="artist-box">
											<h3><?php echo $value['user_name'];?></a></h3>
											<div class="ai-price"><a href="<?php echo $value['user_slug'];?>">View Profile</a></div>
											<ul class="rating">
												<li class="fa fa-star"></li>
												<li class="fa fa-star"></li>
												<li class="fa fa-star"></li>
												<li class="fa fa-star"></li>
												<li class="fa fa-star disable"></li>
											</ul>
										  </div>
										  <div class="artist-desc">
											<p><?php echo $value['user_about'];?></p>
										  </div>
										</div>
									</div>
									<?php
								}
							}else{?>
								<div class="col-md-4 offset-md-4">
								<div class="no-img">
							     <img src="assets/images/no-img.png" class="img-responsive" />
								</div>
							    </div>


							<?php }
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<script type="text/javascript">var c='<?php echo $category;?>';var u_type='';</script>