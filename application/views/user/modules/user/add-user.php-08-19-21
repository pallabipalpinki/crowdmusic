<div class="content-wrapper">
   <div class="content-header">
      <div class="container">
         <h1 class="m-0 text-dark">Register</h1>
      </div>
   </div>
   <section class="content">
      <div class="container">
         <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title"><?php echo $title;?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" id="useraddform" method="post" enctype="multipart/form-data">
               <div class="card-body">
                  <div class="row">
                     <div class="form-group col-md-12 text-center">
                        <!-- <label>Upload Your profile image</label><br>
                        <input type="file" class="image-upload" accept="image/*" name="profile_image" id="profile_image"/>
                        <br> -->

                        <div class="avatar-upload">
                         <div class="avatar-edit">
                           <input type='file' id="profile_image" name="profile_image" accept=".png, .jpg, .jpeg" />
                           <label for="profile_image"></label>
                         </div> 
                         
                         <div class="avatar-preview">
                           <div id="imagePreview"></div>
                         </div>
                        </div>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value="">
                        <span style="color:red"></span>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="">
                        <span style="color:red"></span>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="">
                        <span style="color:red"></span>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="">
                        <span style="color:red"></span>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <textarea class="textarea form-control" id="address" name="address" placeholder="Enter Phone Number" value="" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="about">Write About Yourself</label>
                        <textarea class="textarea form-control" name="about" id="about" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        <span style="color:red"></span>
                     </div>
                     <!-- select -->
                     <div class="form-group col-md-6">
                        <label>User Type</label>
                        <select class="form-control" id="usertype" name="usertype">
                           <option value="0">Account Type</option>
                           <?php
                           if ($user_role)
                           { 
                              foreach ($user_role as $role)
                              {
                              ?>
                              <option value="<?=$role->role_id; ?>"><?php echo $role->role_name;?></option>

                              <?php
                              }
                           }
                           ?>
                        </select>
                        <small class="error_msg help-block pull-left" id="week_error_msg" style="display: none">Please select a category</small>
                        <span style="color:red"></span>
                     </div>
                     <div class="form-group col-md-6" id="companydiv">
                        <label for="companyname">Company Name</label>
                        <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Enter Company Name" value="">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <span style="color:red"></span>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="cpassword1">Re-Type Password</label>
                        <input type="password" class="form-control" id="" name="cpassword" placeholder=" Re Enter Password">
                        <span style="color:red"></span>
                     </div>
                  </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer text-right">
                  <button type="submit" class="btn btn-theme" id="useraddbtn">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </section>
</div>
