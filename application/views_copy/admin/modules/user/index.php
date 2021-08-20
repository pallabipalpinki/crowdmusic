<div class="content-wrapper">



    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0 text-dark">Dashboard</h1><br><br>

                  <?php

                  if($this->session->userdata('success')){?>

                  <br><span style="color:green;"><?= $this->session->userdata('success')?></span> <?php

                  $this->session->unset_userdata('success'); } ?> 

                  <?php if($this->session->userdata('fail')){?>

                  <br><span style="color:green;"><?= $this->session->userdata('fail')?></span> <?php }

                  $this->session->unset_userdata('fail'); ?> 





          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/dashboard">Home</a></li>

              <li class="breadcrumb-item active">Dashboard</li>

            </ol>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->

      <!-- /.content-header -->

 <section class="content">

      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->

        <div class="row">

           <!-- ./col -->

          <div class="col-lg-3 col-8">

            <!-- small box -->

            <div class="small-box bg-warning">

              <div class="inner">

                <h3><?= $audiancecount; ?></h3>

               







                <p>Total Audiance</p>

              </div>

              <div class="icon">

                <i class="fas fa-headphones-alt"></i>

              </div>

              <a href="<?= base_url();?>admin/audiance" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <!-- ./col -->

          

          

          <div class="col-lg-3 col-8">

            <!-- small box -->

            <div class="small-box bg-danger">

              <div class="inner">

                <h3><?= $mixercount; ?></h3>



                <p>Mixer Available</p>

              </div>

              <div class="icon">

                

              <i class='fas fa-microphone'></i>

              </div>

              <a href="<?= base_url();?>admin/mixer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>

          </div>

           <div class="col-lg-3 col-8">

            <!-- small box -->

            <div class="small-box bg-success">

              <div class="inner">

                <h3><?= $contributorcount; ?> </h3>



                <p>Total Contributor</p>

              </div>

              <div class="icon">

                <i class='fas fa-guitar'></i>

              </div>

              <a href="<?= base_url();?>admin/contributor" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>

          </div>



          <div class="col-lg-3 col-8">

            <!-- small box -->

            <div class="small-box bg-primary">

              <div class="inner">

                <h3><?= $producercount; ?></h3>



                <p>Total Producer Available</p>

              </div>

              <div class="icon">

               <i class="far fa-handshake"></i>

              </div>

              <a href="<?= base_url();?>admin/producer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <div class="col-lg-3 col-8">

            <!-- small box -->

            <div class="small-box bg-primary">

              <div class="inner">

                <h3><?= $albumcount; ?></h3>



                <p>Uploaded Albums </p>

              </div>

              <div class="icon">

               <i class="fab fa-soundcloud"></i>

              </div>

              <a href="<?= base_url();?>admin/albums" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>

          </div>







          









         

         

        </div>

        

        <div class="row">

          

        </div>

      </div><!-- /.container-fluid -->

    </section>

     </div>

  <!-- /.content-wrapper -->