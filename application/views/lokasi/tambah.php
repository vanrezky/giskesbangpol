<?php $this->load->view('header'); ?>
<?php $this->load->view('side_menu'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Tambah Lokasi Organisasi
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>template"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">lokasi</li>
      <li class="active">tambah</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-md-6">

        <div class="box box-danger">
          <div class="box-header">
            <h3 class="box-title">Data Organisasi</h3>
          </div>
          <div class="box-body">

            <?php echo form_open_multipart('lokasi/simpan', 'class="form-horizontal"'); ?>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="varchar">Nama Organisasi</label>
                <input type="text" class="form-control" name="nama_organisasi" placeholder="Nama Organisasi" required autofocus />
              </div>
              <div class="form-group">
                <label for="varchar">Nama Pemimpin</label>
                <input type="text" class="form-control" name="nama_pemimpin" placeholder="Nama Pemimpin" required autofocus />
              </div>
              <div class="form-group">
                <label for="varchar">Jenis Organisasi</label>
                <select data-placeholder="id_jenis" class="form-control" name="id_jenis" id="id_jenis" required autofocus>
                  <option value=""></option>
                  <?php
                  foreach ($mst_jenis->result_array() as $mg) {
                    if ($id_jenis == $mg['id_jenis']) {
                  ?>
                      <option value="<?php echo $mg['id_jenis']; ?>" selected="selected"><?php echo $mg['keterangan']; ?></option>
                    <?php
                    } else {
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
                <div class="col-sm-11">
                  <input type="text" id="lat" class="form-control" readonly name="latitude" id="lat"  value="<?php echo set_value('latitude') ?>" placeholder="-123.1413151" required autofocus />
                </div>
              </div>
              <div class="form-group">
                <label for="varchar">Longitude</label>
                <div class="col-sm-11">
                  <input type="text" id="lng" class="form-control" readonly name="longitude" value="<?php echo set_value('longitude') ?>" placeholder="3151312513" required autofocus />
                </div>
              </div>


              <div class="form-group">
                <label for="varchar">Alamat</label>
                <textarea class="form-control" name="alamat" rows="7" placeholder="Masukkan alamat dengan Lengkap" required autofocus></textarea>
              </div>
              <div class="form-group">
                <label for="varchar">Telepon</label>
                <input type="text" class="form-control" name="telp" placeholder="082268262017" required autofocus />
              </div>
              <div class="form-group">
                <label for="userfile">Upload Gambar</label>
                <input type="file" name="userfile" id="userfile" placeholder="Upload Gambar">
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?php echo site_url('lokasi') ?>" <button type="reset" class="btn btn-success">Batal</button></a>
              <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
              <input type="hidden" name="st" value="<?php echo $st; ?>">

            </div>


          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <?php echo $map['html'] ?>
        </div>


  </section>
  <!-- /.content -->
</div>
</div>

<?php $this->load->view('footer'); ?>