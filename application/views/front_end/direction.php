<?php $this->load->view('front_end/header');?> 

 <?php $this->load->view('front_end/nav_bar');?>


  <div class="container">
    <section class="content">
        <div class="row">
         &nbsp;

          <h2>Rute: <b><?php echo $nama_organisasi; ?> </b></h2>
          <div class="col-md-8">
            &nbsp;
            <?php echo $map['html'] ?>
              <?php echo $map['js'] ?>
            </div>

            <div class="col-md-4">
          <div id="directionsDiv"></div>
            </div>

    </div>
  </section>
</div>
   <?php $this->load->view('front_end/footer');?>