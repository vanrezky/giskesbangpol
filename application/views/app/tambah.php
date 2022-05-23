<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?>
 <div class="content-wrapper">
<section class="content-header">
      <h4>
        <b>Tambah Pengguna</b>
      </h4>
      <ol class="breadcrumb">
        <b><?php echo format_hari_tanggal(date('Y-m-d')); ?></b>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
          <div class="col-md-12">
            <div class="box box-danger">
              <!-- /.box-header -->
              <div class="box-body">
                <?php echo form_open_multipart('pengguna/simpan','class="form-horizontal"'); ?>
                <div class="col-md-12">                  
                    <div class="box-body">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required autofocus>
                      </div>
                      <div class="form-group">
                        <label>Password <?php echo form_error('password') ?></label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required autofocus>
                      </div>
                      <div class="form-group">
                        <label>Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
                        <input type="text" class="form-control" id="nama_lengkap" required autofocus name="nama_lengkap" placeholder="nama lengkap">
                      </div>
                     
                      <div class="form-group">
                        <label for="id_ruang">level</label>
                        <div >
                              <select data-placeholder="Level" class="form-control" name="level" id="level" required autofocus>
                                <?php
                                $admin="";$operator="";
                                if($level=="Admin"){ $admin='selected="selected"';$operator=""; }
                                else if($level=="Operator"){ $admin='';$operator='selected="selected"'; }
                                else { $admin='';$operator='';$kosong1='selected="selected"'; }
                                ?>
                                      <option value="Admin" <?php echo $admin; ?>>Admin</option>
                                      <option value="Operator" <?php echo $operator; ?>>Operator</option>
                              </select>
                        </div> 
                      </div> 
                      <div class="form-group">
                        
                      <div class="box-footer">
                          <button type="submit" class="btn btn-success">Simpan</button>
                          <a href="<?php echo site_url('pengguna') ?>" class="btn btn-warning">Batal</a>

                          <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
                          <input type="hidden" name="st" value="<?php echo $st; ?>">
                      </div>
                    </div>
                    <!-- /.box-body -->
                </div>  
                <!-- /.col-md-6 -->              
                <?php echo form_close(); ?>

              </div>
              <!-- /.box-body -->
            </div>
          </div>

      </div>
      <!-- /.row -->
    </section>
  </div>
    <!-- /.content -->
  </div>
      <?php $this->load->view('footer');?> 