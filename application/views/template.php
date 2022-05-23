<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
                  //$no=1;
              foreach($template->result_array() as $l)
              {
          ?>
          <div class="small-box bg-aqua">
            <div class="inner">
               
              <h3><?php echo $l['jml_ormas'];?> Ormas</h3>
              <p>Jumlah Ormas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url();?>lokasi/ormas/" class="small-box-footer">Info Lanjut 
              <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $l['jml_lsm'];?> LSM</h3>

              <p>Jumlah LSM</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url();?>lokasi/lsm/" class="small-box-footer">Info Lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $l['jml_yys'];?> Yayasan</h3>

              <p>Jumlah Yayasan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url();?>lokasi/yayasan/" class="small-box-footer">Info Lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $l['jml_pkl'];?> Perkumpulan</h3>

              <p>Jumlah Perkumpulan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<? echo base_url();?>lokasi/perkumpulan/" class="small-box-footer">Info Lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php
                  //$no++;
          }
        ?>
      </div>
          <!-- Custom tabs (Charts with tabs)-->
         

               <div class="form-group">
  <?php echo $map['html'] ?> 
</div>

              </div>
            </div>
      
  
    </section>
    <!-- /.content -->
  </div>
        </section>   
        </div>  
        </section>   
        </div>  
         <!-- /.row (main row) -->
           </div>
  <?php $this->load->view('footer');?> 