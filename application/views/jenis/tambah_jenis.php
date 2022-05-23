
<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Tambah Jenis Organisasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>template"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jenis</li>
        <li class="active">Tambah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Tambah Jenis Organisasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           
            <?php echo form_open_multipart('Jenis_organisasi/simpan','class="form-horizontal"'); ?>
                    <div class="col-lg-6">   
                    <div class="form-group">
                            <label for="varchar">Jenis Organisasi</label>
                            <input type="text" class="form-control" name="jenis_organisasi" placeholder="Jenis organisasi" required autofocus/>
                      </div>
                       <div class="form-group">
                            <label for="varchar">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="keterangan" required autofocus/>
                      </div>
                      <div class="form-group">
                       <label for="userfile">Upload Gambar</label>
                    <input type="file" name="userfile" id="userfile" placeholder="Upload Gambar"> 
                  </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo site_url('jenis_organisasi') ?>" <button type="reset" class="btn btn-success">Batal</button></a>
                    <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
                    <input type="hidden" name="st" value="<?php echo $st; ?>">   
                        
                  </div>
                  <?php echo form_close(); ?>
                  
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