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
                <h3 class="card-title">Music-track Edit Form</h3>
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
              <form role="form" id="editcontenttrackform" action="<?= base_url('admin/musictrack-update') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <input type="text" name="uri1" id="uri1" value="<?php if(!empty($uri1)){ echo $uri1;}?>" hidden>
                  <input type="text" name="uri2" id="uri2" value="<?php if(!empty($uri2)){ echo $uri2;}?>" hidden>
                  <input type="text" name="cid" id="cid" value="<?php if(!empty($contentdtl[0]['content_id'])){ echo $contentdtl[0]['content_id'];}?>" hidden>
                 <div class="form-group">
                    <label for="name">Track Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php if(!empty( $contentdtl[0]['content_track_name'])){ echo $contentdtl[0]['content_track_name'];}?>">
                     <span style="color:red"><?php echo form_error('name'); ?></span>
                    
                  </div>
                   <div class="form-group">
                   <?php $image= $contentdtl[0]['content_image']; ?>
                   <div class="col-auto"><img src="<?php echo $image; ?>"  width="120" ></div>

                    <label>Upload to change Cover page</label><br>

                    <input type="file" class="image-upload" accept="image/*" name="track_coverimage" id="track_coverimage"/>

                  
                     </div>
                 <div class="form-group">
                    <label>About Content</label>
                    <div class="">
                      <div class="mb-3">
                        <textarea class="textarea" name="content_about" id="content_about" placeholder="Place some text here"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php if(!empty($contentdtl[0]['content_about'])){ echo $contentdtl[0]['content_about'];}?></textarea>
                      </div>
                      <span style="color:red"><?php echo form_error('content_about'); ?></span>
                     
                    </div>
                  </div>
                  
                 

                  
                 </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="editcontenttrackbtn">Submit</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
            
      </div><!--/. container-fluid -->
  </section>
</div>




