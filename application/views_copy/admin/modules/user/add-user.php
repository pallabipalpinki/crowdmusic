<!-- <section class="content"> -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard </h1>

          </div><!-- /.col -->
         <!--  <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/logout')?>">Logout</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div> /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
  <div class="container-fluid">
       <!--  <div class="row"> -->
          <!-- left column -->
         <!--  <div class="col-md-6"> -->
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $title?></h3>
               <!-- <?php
                  if($this->session->userdata('success')){?>
                  <br><span style="color:green;"><?= $this->session->userdata('success')?></span> <?php 
                  $this->session->unset_userdata('success'); }
                   ?> 
                  <?php if($this->session->userdata('fail')){?>
                  <br><span style="color:green;"><?= $this->session->userdata('fail')?></span> <?php 
                  $this->session->unset_userdata('fail'); } 
                  ?> -->
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="useraddform" action="<?= base_url('admin/save-user') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value="<?= (isset($_POST['fname']))?  $_POST['fname']: ''?>">
                    <span style="color:red"><?php echo form_error('fname'); ?></span>
                  </div>
                   <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="<?= (isset($_POST['lname']))? $_POST['lname']: ''?>">
                   <span style="color:red"><?php echo form_error('lname'); ?></span>
                   
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="<?= (isset($_POST['address']))? $_POST['address']: ''?>">
                     <span style="color:red"><?php echo form_error('address'); ?></span>
                  </div>


                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="<?= (isset($_POST['phone']))? $_POST['phone']: ''?>">
                     <span style="color:red"><?php echo form_error('phone'); ?></span>
                  </div>


                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?= (isset($_POST['email']))? $_POST['email']: ''?>">
                     <span style="color:red"><?php echo form_error('email'); ?></span>
                     </div>


                   <!-- select -->
                    <div class="form-group">
                        <label>User Type</label>
                        <select class="form-control" id="usertype" name="usertype">

                      <?php
                    if($user_role){ ?>
                      <option value="">User Type</option>
                    <?php
                      foreach ($user_role as $role) {
                    ?>
                        <option value="<?=$role['role_id']?>"><?= $role['role_name']; ?></option>
                    <?php
                      }
                    }
                    else{
                      echo "<option>Please Add one</option>";
                    }
                    ?>
                    </select>
                    <small class="error_msg help-block pull-left" id="week_error_msg" style="display: none">Please select a category</small>
                     <span style="color:red"><?php echo form_error('usertype'); ?></span>
                  </div>

                      <!-- <div class="form-group">
                        <label>User Type</label>
                        <select class="form-control" id="usertype" name="usertype">
                         
                          <option value="A">Artist</option>
                          <option value="L">Listener</option>
                          <option value="C">Collaborator</option>
                       </select>
                        <span style="color:red"><?php echo form_error('usertype'); ?></span>
                      </div> -->
                    <div class="form-group" id="companydiv">
                    <label for="companyname">Company Name</label>
                    <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Enter Company Name" value="<?= (isset($_POST['companyname']))? $_POST['companyname']: ''?>">
                     </div>
                    <div class="form-group">
                    <label>Upload Your profile image</label><br>
                    <input type="file" class="image-upload" accept="image/*" name="profile_image" id="profile_image"/>
                    <br>
                  </div>
                    <div class="form-group">
                    <label>Write About Yourself</label>
                    <div>
                      <div class="mb-3">
                        <textarea class="textarea" name="about" id="about" placeholder="Place some text here"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                       <span style="color:red"><?php echo form_error('about'); ?></span>
                      <small class="error_msg help-block pull-left" id="lesson_error_msg" style="display: none">Please add something about yourself</small>
                    </div>
                  </div>
                   
                 
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                   <span style="color:red"><?php echo form_error('password'); ?></span>
                  </div>
                   <div class="form-group">
                    <label for="cpassword1">Re-Type Password</label>
                    <input type="password" class="form-control" id="" name="cpassword" placeholder=" Re Enter Password">
                    <span style="color:red"><?php echo form_error('cpassword'); ?></span>
                  </div>
                 </div>
                   
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="useraddbtn">Submit</button>
                </div>
              </form>
            </div>
            
      </div><!--/. container-fluid -->
</section>

</div>