<section class="content"> -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Music category</h1>
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
                <h3 class="card-title">CATEGORY LIST</h3>
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
              <a class="btn btn-block btn-primary" href="<?= base_url('admin-category-add') ?>" style="padding:5px"><i class="fa fa-user-plus" aria-hidden="true" ></i>ADD</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="categoryid" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">SL.</th>
                      <th>Category Name</th>
                      <th>Present in Homepage</th>
                      <th>Category Serial</th>
                      <th>Category Image</th>
                      <th style="width: 200px">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                       $i=1;
                        if($list)
                        { 
                            foreach($list as $category)
                            {?>
                           <?php $image=$category['spec_img']; ?>
                     
                  	 <tr id="category_<?= $category["spec_id"]?>">
                      <td><?= $i ?></td>

                      <td><?= $category["spec_name"]?></td>
                       <td><?= ($category['spec_show_in_home_page']==1)?  "Yes": "No"?></td>
                       <td><?= $category["spec_serial"]?></td>
                     <td><img src="<?php echo $image; ?>"  width="50" height="40"></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?=base_url('admin-category-edit/'.$category['spec_id'])?>" title="Edit"><i class="fas fa-pencil-alt"> </i>Edit</a>

                       

                  <a class="btn btn-danger btn-sm" href="javascript:;" title="delete" onclick="myCategoryDelete('<?=base_url('admin-category-delete/'.$category['spec_id'])?>','<?= $category['spec_id']?>')"><i class="fas fa-trash"> </i> Delete</a> 
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