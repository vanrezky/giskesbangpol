
<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Jenis Organisasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>template"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jenis</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Jenis Organisasi</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body table-responsive no-padding">
              <p align="left">
                <a href="<?php echo base_url(); ?>jenis_organisasi/tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i> Tambah</a>
              </p>
              <?php echo $this->session->userdata('message');?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">jenis Organisasi</th>
                        <th>keterangan</th>
                        <th width="15%">foto</th>
                        <th width="15%">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        foreach($data_jenis->result_array() as $dp)
                        {
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $dp['jenis_organisasi'];?></td>
                        <td><?php echo $dp['keterangan'];?></td>
                        <td>
                          <a class="btn btn-success btn-xs" href="<?php echo base_url(); ?>assets/file_jenis/<?php echo $dp['foto']; ?>" title="Unduh File"><?php echo $dp['foto']; ?></a>
                        </td>
                        <td>                           
                          <a href="<?php echo base_url(); ?>jenis_organisasi/ubah/<?php echo $dp['id_jenis']; ?>" title="Ubah">
                          <button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
                          </a>                                  
                          <a href="<?php echo base_url(); ?>jenis_organisasi/hapus/<?php echo $dp['id_jenis']; ?>" onClick="return confirm('Anda yakin..???');" title="Hapus">
                          <button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
                          </a> 
                        </td>
                    </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <?php $this->load->view('footer');?> 