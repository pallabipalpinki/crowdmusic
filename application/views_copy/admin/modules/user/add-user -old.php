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
                <?php
                  if($this->session->userdata('success')){?>
                  <br><span style="color:green;"><?= $this->session->userdata('success')?></span> <?php 
                  $this->session->unset_userdata('success'); }
                   ?> 
                  <?php if($this->session->userdata('fail')){?>
                  <br><span style="color:green;"><?= $this->session->userdata('fail')?></span> <?php 
                  $this->session->unset_userdata('fail'); } 
                  ?> 
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="useraddform" action="<?= base_url('admin/save-user') ?>" method="post">
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
                         
                          <option value="A">Artist</option>
                          <option value="L">Listener</option>
                          <option value="C">Collaborator</option>
                       </select>
                        <span style="color:red"><?php echo form_error('usertype'); ?></span>
                      </div>
                    <div class="form-group" id="companydiv">
                    <label for="companyname">Company Name</label>
                    <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Enter Company Name" value="<?= (isset($_POST['companyname']))? $_POST['companyname']: ''?>">
                   
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