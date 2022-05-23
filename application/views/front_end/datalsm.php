<?php $this->load->view('front_end/header');?> 

 <?php $this->load->view('front_end/nav_bar');?>
  <section class="page-title">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- breadcrumb content -->
          <div class="page-breadcrumbd">
            <h2>Data LSM Di Kota Pekanbaru</h2>
            <p>LSM (Lembaga Swadaya Masyarakat)</p>
          </div><!-- end breadcrumb content -->
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              </div>
              <div class="box-body">
                <div class="table-responsive no-padding">
              <?php echo $this->session->userdata('message');?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                     
                        <th width="40%">Nama Lembaga Swadaya Masyarakat</th>
                        <th width="50%">Nama Pimpinan</th>
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
                        <td>
                          <a href="<?php echo base_url();?>beranda/detail_data/<?php echo $l['id_organisasi']; ?>" ><?php echo $l['nama_organisasi']; ?></a></td>
                        <td><?php echo $l['nama_pemimpin'];?></td>                     
                    </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
  <?php $this->load->view('front_end/footer');?>