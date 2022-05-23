<?php $this->load->view('front_end/header');?> 

 <?php $this->load->view('front_end/nav_bar');?>

<section class="slider-area">
			<!-- slide item one -->
			<div class="homepage-slider slider-bg1">
				<div class="display-table">
					<div class="display-table-cell">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<div class="slider-content">
										<h1>Kesbangpol Kota Pekanbaru</h1>
										<p></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="homepage-slider slider-bg2">
				<div class="display-table">
					<div class="display-table-cell">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<div class="slider-content">
										<h1>Visi</h1>
										<p>Terwujudnya Kota Pekanbaru yang tertib, aman, tentram, serta bebas dari konflik dan berwawasan kebangsaan.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- slide item three -->
			<div class="homepage-slider slider-bg3">
				<div class="display-table">
					<div class="display-table-cell">
						<div class="container">
							<div class="row">
								<div class="col-sm-7">
									<div class="slider-content">
										<h1>MISI</h1>
										<p>Meningkatkan kualitas demokrasi, Menciptakan Stabilitas daerah yang aman, tertib dan kondusif</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section><!-- slider area end -->
	
	
		<!-- ::::::::::::::::::::: start intro section:::::::::::::::::::::::::: -->
		<section class="section-padding darker-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
						<div class="intro-title text-center">
							<h3><b>Sambutan Kepala Badan Kesbangpol Kota Pekanbaru</b></h3>
							<div class="hidden-xs">
								<p></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<div class="single-intro">
							<img class="intro-img" src="<?=base_url().'assets/' ?>dist/img/p.kesbangpol.jpg"></div>
							
						</div>
					

				<div class="col-md-8">
						<div class="single-intro">
								<p>Selamat datang di Website Sistem Informasi Geografis Badan Kesatuan Bangsa Dan Politik (Kesbangpol) Kota Pekanbaru. Website ini sebagai sarana untuk memberikan Informasi Organisasi masyarakat (Ormas) dan Lembaga Swadaya Masyarakat (LSM)terdaftar</p>

								<p></p>

								<blockquote>Dengan adanya pemetaan ini, diharapkan masyarakat dapat melihat secara langsung lokasi, Organisasi yang terdaftar, yang dibuat secara online, dan ini akan lebih mengefisiensi waktu dalam pencarian lokasi Organisasi yang terdaftar. dan mengurangi adanya Organisasi tidak terdaftar yang belum diakui oleh pemerintahan.</blockquote>
								<h4>Kepala Badan Kesbangpol:<b> Drs. M. Yusuf, M.Pd</b></h4>
							</div>
						</div>
					
</div>

		</section><!-- intro area end -->
	
	
		<!-- ::::::::::::::::::::: start block content area:::::::::::::::::::::::::: -->
		<section class="section-padding">

			<div class="row">
					<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
						<div class="intro-title text-center">
							<h2>LSM dan Ormas Terdaftar <b>Kota Pekanbaru</b></h2>
							<div class="hidden-xs">
								<p></p>
							</div>
						</div>
					</div>
				</div>
		
			<div class="container">
				<div class="col-md-8">
					<?php echo $map['html'] ?> 
</div>
				<div class="col-md-4">
					<div class="box">
            <div class="box-header text-center">
              <h3 class="box-title"><b>Lokasi Organisasi</b></h3>
            </div>
			</div>
			<div class="box-body">
              <div class="box-body table-responsive no-padding">
              	 <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                     
                        <th width="75%">Nama Organisasi</th>
                    </tr>
                      </thead>
                <tbody>
                    <?php
                       
                        foreach($lokasi->result_array() as $l)
                        {
                    ?>
                    <tr>
                        
                        <td>
                          <a href="<?php echo base_url();?>beranda/detail_data/<?php echo $l['id_organisasi']; ?>" ><?php echo $l['nama_organisasi']; ?></td>
					</div>
					
				</div>
			</div>
			 </tr>
                    <?php
                    }
                    ?>
                </tbody>
              </table>
            </div>
    

		</section>
  <?php $this->load->view('front_end/footer');?>