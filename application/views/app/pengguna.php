
<?php $this->load->view('header');?> 
<?php $this->load->view('side_menu');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pengelola Pengguna</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
             <div class="box-body table-responsive no-padding">
              <p align="left">
                <a href="<?php echo base_url(); ?>pengguna/tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i> Tambah</a>
              </p>
              <?php echo $this->session->userdata('message');?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Id User</th>
                        <th>Nama Lengkap</th>
                        <th width="15">Level</th>
                                            
                        <th width="10">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        foreach($pengguna->result_array() as $dp)
                        {
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $dp['id_user'];?></td>
                        <td><?php echo $dp['nama_lengkap'];?></td>
                       <td><?php echo $dp['level'];?></td>
                       <td>    

                       <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Admin Pengelola</h4>
              </div>
              <div class="modal-body">
                <p>
                
                <?php echo $this->session->userdata('nama_lengkap'); ?></p>
                <?php echo $this->session->userdata('level'); ?></p>

              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>                   
                         <!-- <a href="<?php echo base_url(); ?>pengguna/ubah/<?php echo $dp['id_user']; ?>" title="Ubah">
                          <button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
                          </a>       -->   
                           <a       
                          <button class="btn btn-xs btn-info"><i class="ace-icon fa fa-eye bigger-120" data-toggle="modal" data-target="#modal-default"></i></button>
                          </a>                        
                          <a href="<?php echo base_url(); ?>pengguna/hapus/<?php echo $dp['id_user']; ?>" onClick="return confirm('Anda yakin..???');" title="Hapus">
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