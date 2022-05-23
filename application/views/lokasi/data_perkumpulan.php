
<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

        <section class="content-header">
      <h1>
        Data Perkumpulan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>template"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">lokasi</li>
        <li class="active">Perkumpulan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Order By Data Perkumpulan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body table-responsive no-padding">
              <?php echo $this->session->userdata('message');?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                     
                        <th>Nama Organisasi</th>
                        <th>Nama Pemimpin</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Foto</th>
                        <th width="10%">Actions</th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        foreach($tampil->result_array() as $l)
                        {
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $l['nama_organisasi'];?></td>
                        <td><?php echo $l['nama_pemimpin'];?></td>
                        <td><?php echo $l['alamat'];?></td>
                        <td><?php echo $l['telp'];?></td>
                        <td>
                          <a class="btn btn-success btn-xs" href="<?php echo base_url(); ?>assets/file_foto/<?php echo $l['foto']; ?>" title="Unduh File"><?php echo $l['foto']; ?></a>
                        </td>

        
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>                   
                        <td>  
                        <a       
                          <button class="btn btn-xs btn-info"><i class="ace-icon fa fa-eye bigger-120" data-toggle="modal" data-target="#modal-default"></i></button>
                          </a>                          
                          <a href="<?php echo base_url(); ?>lokasi/ubah/<?php echo $l['id_organisasi']; ?>" title="Ubah">
                          <button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
                          </a>                                 
                          <a href="<?php echo base_url(); ?>lokasi/hapus/<?php echo $l['id_organisasi']; ?>" onClick="return confirm('Anda yakin..???');" title="Hapus">
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