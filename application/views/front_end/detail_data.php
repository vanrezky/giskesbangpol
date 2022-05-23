<?php $this->load->view('front_end/header');?> 

 <?php $this->load->view('front_end/nav_bar');?>

  <section>
  <div class="container">
    <section class="content">
        <div class="row">
          <div class="col-md-6">
            &nbsp;
            <?php echo $map['html'] ?>
              <?php echo $map['js'] ?>
            </div>

          
        <!--<div class="col-md-4">
          <div id="directionsDiv"></div>
            </div>-->

        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-body">
                  <div class="col-lg-12">
                     &nbsp;
                    <div class="form-group">
                        <h4> Nama Organisasi</h4>
                      </div>
                      &nbsp;
                      &nbsp;
                      <div class="form-group">
                        <h4> Nama Pimpinan</h4>
                      </div>
                      <div class="form-group">
                        <h4>Jenis Organisasi</h4>        
                      </div>
                        <div class="form-group">
                        <h4>Latitude</h4> 
                      </div>
                         <div class="form-group">
                        <h4>Longitude</h4>
                      </div>
                      &nbsp;
                      &nbsp;
                         <div class="form-group">
                      <h4>Alamat</h4>
                      </div>
                      
                      <div class="form-group">
                      <h4>Telp</h4>
                    </div>
                </div>
              </div>
            </div>  
          </div>
        </div>

        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-body">
                  <div class="col-lg-12">
                   
                    <div class="form-group">
                        <h4></h4>
                      </div>
                      <div class="form-group">
                        <h4><b><u><?php echo $nama_organisasi; ?></u></b></h4>
                      </div>
                      &nbsp;
                      <div class="form-group">
                        <h4><b><?php echo $nama_pemimpin; ?></b></h4>        
                      </div>
                        <div class="form-group">
                        <h4><b><?php echo $id_jenis; ?></b></h4> 
                      </div>
                         <div class="form-group">
                        <h4><b><?php echo $latitude; ?></b></h4>
                      </div>
                         <div class="form-group">
                      <h4><b><?php echo $longitude; ?></b><h4>
                      </div>
                       <div class="form-group">
                      <p><b><?php echo $alamat; ?></b></p>
                    </div>
                     <div class="form-group">
                      <h4><?php echo $telp; ?></h4>
                    </div>
                </div>
              </div>
            </div>  
          </div>
        </div>

      </div>
      &nbsp;
      <div class="text-left">
              <a href="<?php echo site_url('beranda/direction/'.$id_param) ?>" target="_blank" class="btn btn-primary input-btn"><span>Cari Rute</span></a>
            </div>
    </div>
  </section>
  </div>
  <section class="content">
      <div class="container">
      <div class="row">
          <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
              &nbsp;
              <div align="center">
              <h2><b>Foto Lokasi<b></h2>
                  <embed src="<?php echo base_url(); ?>assets/file_foto/<?php echo $foto; ?>" width='100%' height='400px'/>
                  </div>          
          </div>
        </div>
      
</div>
</div>
</section>
</div>

   <?php $this->load->view('front_end/footer');?>