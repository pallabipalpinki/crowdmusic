<!-- <section class="content"> -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> </h1>

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
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $title ?> Form</h3>
                <?php
                  if($this->session->userdata('success')){?>
                  <br><span style="color:green;"><?= $this->session->userdata('success')?></span> <?php 
                  $this->session->unset_userdata('success'); }
                   ?> 
                  <?php if($this->session->userdata('fail')){?>
                  <br><span style="color:red;"><?= $this->session->userdata('fail')?></span> <?php 
                  $this->session->unset_userdata('fail'); } 
                  ?> 
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="editcategoryform" action="<?= base_url('admin-category-update') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <input type="text" name="cid" id="cid" value="<?php if(!empty($categorydtl->spec_id)){ echo $categorydtl->spec_id;}?>" hidden>
                  <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php if(!empty($categorydtl->spec_name)){ echo $categorydtl->spec_name;}?>">
                     <span style="color:red"><?php echo form_error('name'); ?></span>
                    <div class="form-group">
                        <label>Will it be shown on homepages</label>
                      <select class="form-control" id="categoryshown" name="categoryshown">
                          <option <?php if(!empty($categorydtl->spec_show_in_home_page ) && $categorydtl->spec_show_in_home_page   == 2){ echo"selected"; } ?> value="2">No</option>
                          <option <?php if(!empty($categorydtl->spec_show_in_home_page) && $categorydtl->spec_show_in_home_page == 1){ echo"selected"; } ?> value="1">Yes</option>
                      </select>
                   </div>
                     <?php $image=$categorydtl->spec_img; ?>
                   <div class="col-auto"><img src="<?php echo $image; ?>"  width="120" class="square img-fluid"></div>
                    <div class="form-group">
                    <label>Update Your Category image</label><br>
                    <input type="file" class="image-upload" accept="image/*" name="category_image" id="category_image"/>
                    <br>
                  </div>
              
            
                 <!--  <div class="form-group">
                    <label>About Category</label>
                    <div class="">
                      <div class="mb-3">
                        <textarea class="textarea" name="about" id="about" placeholder="Place some text here"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php if(!empty($categorydtl->about)){ echo $categorydtl->about;}?></textarea>
                      </div>
                      <span style="color:red"><?php echo form_error('about'); ?></span>
                      <small class="error_msg help-block pull-left" id="lesson_error_msg" style="display: none">Please add something about Category</small>
                    </div>
                  </div>
                   -->
                 

                  
                 </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="editcategorybtn">Submit</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
            
      </div><!--/. container-fluid -->
  </section>
</div>




