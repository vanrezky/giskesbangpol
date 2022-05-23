<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Baca Mail
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">kontak</li>
        <li class="active">baca</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Baca Mail</h3>
              <div class="box-tools pull-right">
                <a href="<? echo base_url();?>kontak" class="btn btn-box-tool" data-toggle="tooltip" title="back"><i class="fa fa-chevron-left"></i></a>
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3></h3>
                <h5 name="email" >From: <?php echo $email; ?></h5>
                <p></p>
                <h5 name="subject" >Subject: <?php echo $subject; ?></h5>
              </div>
              <div class="mailbox-read-message">
                <p>Hello Admin,</p>

                <p><?php echo $pesan; ?></p>

                <p></p>

                <p></p>

                <p></p>

                <p>Terimakasih,<br><?php echo $nama; ?></p>
              </div>
            </div>
            <!-- /.box-footer -->
          </div> 
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <?php $this->load->view('footer');?> 