<section class="content"> -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ALBUMS</h1>
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
<div class="container-fluid">

        <!-- <div class="row"> -->
          <!-- <div class="col-md-6"> -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">ALBUMS LIST</h3>
                  <?php
                  if($this->session->userdata('success')){?>
                  <br><span style="color:green;"><?= $this->session->userdata('success')?></span> <?php 
                  $this->session->unset_userdata('success'); }
                   ?> 
                  <?php if($this->session->userdata('fail')){?>
                  <br><span style="color:green;"><?= $this->session->userdata('fail')?></span> <?php 
                  $this->session->unset_userdata('fail'); } 
                  ?> 
                <div class="add-button" style="float: right;width: 6%;">
               <!--  <a class="btn btn-block btn-primary" href="<?= base_url('admin/albums-add') ?>" style="padding:5px"><i class="fa fa-user-plus" aria-hidden="true" ></i>ADD</a> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="genresid" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">SL.</th>
                      <th>Album Name</th>
                      <th>Artist Name</th>
                      <th>Cover</th>
                      <th style="width: 200px">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                       $i=1;
                        if($list)
                        { 
                            foreach($list as $albums)
                            {?>
                           <?php $image=$albums['album_image_file']; ?>
                     
                  	 <tr id="albums_<?= $albums['album_id']?>">
                      <td><?= $i ?></td>
                      <td><?= $albums["album_name"]?></td>
                      <td><?= $albums["firstname"]." ".$albums["lastname"] ?></td>
                      <td><img src="<?php echo $image; ?>"  width="50" height="40"></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?=base_url('admin/albums-edit/'.$albums['album_id'])?>" title="Edit"><i class="fas fa-pencil-alt"> </i>Edit</a>

                        <a class="btn btn-primary btn-sm" href="<?=base_url('admin/albums-view/'.$albums['album_id'])?>" title="view"><i class="fas fa-eye"> </i>view</a> 

                 <a class="btn btn-danger btn-sm" href="javascript:;" title="delete" onclick="myAlbumsDelete('<?=base_url('admin/albums-delete/'.$albums['album_id'])?>','<?= $albums['album_id']?>')"><i class="fas fa-trash"> </i> Delete</a>
                      </td>
                    </tr>
                    <?php $i++;} } ?>
                  </tbody>
                </table>
              </div>

               <div class="card-footer clearfix">
             <!--  <?php if($pagination_link) {
               $pagination_link->setPath('Ci_Music/index.php/admin/userlist');?>
               <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><?= $pagination_link->links()?></li>
                    <?php
                     // $pagination_link->links(); 
                  } ?> 
                  </ul>-->
                    </div>
              <!-- /.card-body -->
             <!--  <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div> -->
          
            
          <!-- </div> -->
         </div> 
    </div>
  </div>


<!-- </section>