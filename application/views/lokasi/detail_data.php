
<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content">
      <div class="row">
              <div class="col-md-6">   
   <div class="form-group">
  <?php echo $map['html'] ?> 
</div>
    <div class="box-body">
      </div>
 <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Gambar Yang Ditampilkan</h3>
            </div>
            <div class="box-body">
              <td>
                  <embed src="<?php echo base_url(); ?>assets/file_foto/<?php echo $foto; ?>" width='100%' height='250px'/>
                </td> 


</div>
</div>
            </div>

            <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Data</h3>
            </div>

             <div class="box-body">
                <?php echo form_open_multipart('simpan_ubah/simpan_ubah','class="form-horizontal"'); ?>
                    <div class="col-lg-12">
                      <div class="form-group">
                            <label for="varchar">Nama Organisasi : &emsp; </label>
                            <label name="nama_organisasi"><?php echo $nama_organisasi; ?></label>

                      </div>
                      <div class="form-group">
                            <label for="varchar">Nama Pemimpin : &emsp; </label>
                            <label name="nama_pemimpin"><?php echo $nama_pemimpin; ?></label>
                      </div>
                      <div class="form-group">
                            <label for="varchar">Jenis Organisasi : &emsp;</label>
                             <label name="id_jenis"><?php echo $id_jenis; ?></label>         
                      </div>
                         <div class="form-group">
                            <label for="varchar">Latitude &emsp;&emsp;&emsp;&emsp; : &emsp;</label>
                             <label name="lat"><?php echo $latitude; ?></label>
                      </div>
                         <div class="form-group">
                            <label for="varchar">Longitude &emsp;&emsp;&emsp; : &emsp; </label>
                             <label name="long"><?php echo $longitude; ?></label>
                      </div>
                         <div class="form-group">
                            <label for="varchar">Alamat &emsp;: &emsp;</label>
                            <label name="alamat"><?php echo $alamat; ?></label>
                      </div>
                         <div class="form-group">
                            <label for="varchar">Telepon &emsp;: &emsp;</label>
                            <label name="telp"><?php echo $telp; ?></label>
                      </div>
            
                  
                  <?php echo form_close(); ?>

            </div>


              </div>
          </div>
          </div>

     






</section>
</div>
  <?php $this->load->view('footer');?> 