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
              <a href="<?php echo $user_details['user_profile_url']; ?>" class="follow-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 22 22">
                  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                </svg>
                Go to Profile
              </a>
              <a href="<?php echo $user_details['user_content_url']; ?>" class="follow-btn opp">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" />
                </svg>
                Contents
              </a>
              <!-- <a href="#" class="follow-btn ">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                
                  <path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" /> </svg> Follow</a> -->

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
              <div class="container register-form">
                <form id="usereditprofile" method="post" enctype="multipart/form-data">
                  <div class="form">
                    <div class="note">
                      <p>Update Your Profile</p>
                    </div>
                    <div class="avatar-upload">
                      <div class="avatar-edit">
                        <input type='file' id="profile_image" name="profile_image" accept=".png, .jpg, .jpeg" />
                        <label for="profile_image"></label>
                      </div>
                      <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url(<?php echo $user_details['user_profile_image']; ?>);"></div>
                      </div>
                    </div>
                    <div class="form-content">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value="<?php echo $user_details['user_fname']; ?>"/>
                            <span style="color:red"><?php echo form_error('fname'); ?></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="<?php echo $user_details['user_lname'];?>"/>
                            <span style="color:red"><?php echo form_error('lname'); ?></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $user_details['user_email']; ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="<?php echo $user_details['user_phone']; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>User Role</label>
                            <select class="form-control wek-nbr-cls" name="usertype" id="usertype" <?php echo ($role['selected']!='')?'disabled':''; ?>>
                              <option value="0">Select a Account Type</option>
                              <?php
                                foreach ($user_details['user_roles'] as $role) {
                                
                                  ?>
                              <option value="<?php echo $role['user_role_id'];?>" <?php echo $role['selected']; ?>><?php echo $role['user_role_name']; ?></option>
                              <?php 
                                }
                                
                                ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group" id="companydiv">
                            <label for="companyname">Company Name</label>
                            <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Enter Company Name"  value="<?php echo $user_details['user_company_name']; ?>"> 
                          </div>
                        </div>
                      </div>

                      <?php

                      if(isset($user_details['user_specs'])){
                        ?>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Your Specialty</label>
                              <select class="form-control" multiple="true" id="userspeciality" name="userspeciality[]">
                                 <option value="0">Speciality</option>
                                 <?php
                                 if ($user_details['user_specs'])
                                 { 
                                    foreach ($user_details['user_specs'] as $spec)
                                    {
                                    ?>
                                    <option value="<?php echo $spec['spec_id']; ?>" <?php echo $spec['selected'];?>><?php echo $spec['spec_name'];?></option>
                                    <?php
                                    }
                                 }
                                 ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <?php
                      }
                      ?>

                      
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Enter address" rows="2"/><?php echo $user_details['user_address']; ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="about">About Lesson</label>
                            <textarea class="form-control" name="about" id="about" placeholder="Place some text here" rows="10"><?php  echo $user_details['user_about'];?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="password">Set new Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Set new password">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="cpassword">Re-Type New Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Re-Type new password">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <button type="submit" class="btnSubmit pyull-right" id="edituserprofile">Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>