
<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Ubah Data Lokasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>template"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">lokasi</li>
        <li class="active">ubah</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Data Lokasi</h3>
            </div>

             <div class="box-body">
                <?php echo form_open_multipart('simpan_ubah/simpan_ubah','class="form-horizontal"'); ?>
                    <div class="col-lg-12">   
                      <div class="form-group">
                            <label for="varchar">Nama Organisasi</label>
                            <input type="text" class="form-control" name="nama_organisasi" value="<?php echo $nama_organisasi; ?>"/>
                      </div>
                      <div class="form-group">
                            <label for="varchar">Nama Pemimpin</label>
                            <input type="text" class="form-control" name="nama_pemimpin" value="<?php echo $nama_pemimpin; ?>"/>
                      </div>
                      <div class="form-group">
                            <label for="varchar">Jenis Organisasi</label>
                            <select data-placeholder="id_jenis" class="form-control" name="id_jenis" id="id_jenis">
                                    <option value=""></option>
                                    <?php
                                        foreach($mst_jenis->result_array() as $mg)
                                        {
                                        if($id_jenis==$mg['id_jenis'])
                                        {
                                    ?>
                                        <option value="<?php echo $mg['id_jenis']; ?>" selected="selected"><?php echo $mg['keterangan']; ?></option>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                        <option value="<?php echo $mg['id_jenis']; ?>"><?php echo $mg['keterangan']; ?></option>
                                    <?php
                                          }
                                        }
                                    ?>
                            </select>
                      </div>
                      
                            
                  
                         <div class="form-group">
                            <label for="varchar">Latitude</label>
                            <input type="text" class="form-control" id="lat" name="latitude" readonly value="<?php echo $latitude; ?>"/>
                      </div>
                         <div class="form-group">
                            <label for="varchar">Longitude</label>
                            <input type="text" class="form-control" id="lng" name="longitude" readonly value="<?php echo $longitude; ?>"/>
                      </div>
                         <div class="form-group">
                            <label for="varchar">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="7" required autofocus><?php echo $alamat; ?></textarea>
                      </div>
                         <div class="form-group">
                            <label for="varchar">Telepon</label>
                            <input type="text" class="form-control" name="telp" value="<?php echo $telp; ?>"/>
                      </div>
                      <div class="form-group">
                       <label for="userfile">Upload Gambar</label>
                    <input type="file" name="userfile" id="userfile" value="<?php echo $foto; ?>"/>
            
</div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo site_url('lokasi') ?>" <button type="reset" class="btn btn-success">Batal</button></a>
                    <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
                    <input type="hidden" name="st" value="<?php echo $st; ?>">   
                        
                  </div>

                  <?php echo form_close(); ?>

            </div>


              </div>
          </div>
      
        
<!--  Left -->


<div class="col-md-6">
<div class="form-group">
  <?php echo $map['html'] ?> 
</div>
              
          
            <!-- /.box-header -->
            <div class="box-body">
              <td>
                  <embed src="<?php echo base_url(); ?>assets/file_foto/<?php echo $foto; ?>" width='100%' height='500px'/>
                </td> 


</div>
            </div>
          </div>

     






</section>
</div>
  <?php $this->load->view('footer');?> 