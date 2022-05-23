<?php $this->load->view('front_end/header');?> 

 <?php $this->load->view('front_end/nav_bar');?>
  <section class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- breadcrumb content -->
					<div class="page-breadcrumbd">
						<h2>Tentang Kami</h2>
					</div><!-- end breadcrumb content -->
				</div>
			</div>
		</div>
	</section>

	<section class="block about-us-block section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<!-- block text -->
						<div class="block-text">
							<h2>Visi dan Misi Kesbangpol Kota Pekanbaru</h2>
							<p></p>
							<h3>Visi</h3>
							<blockquote>Terwujudnya Kota Pekanbaru yang tertib, aman, tentram, serta bebas dari konflik dan berwawasan kebangsaan.</blockquote>
							<p></p>
							<h3>Misi</h3>
							<p>1. Meningkatkan kualitas demokrasi.
							<br>2. Menciptakan Stabilitas daerah yang aman, tertib dan kondusif.
							<br>3. Meningkatkan kualitaas wawasan kebangsaan.
							<br>4. Meningkatkan peran serta  masyarakat dalam mendukung dan mensukseskan percepatan pembangunan provinsi Riau.</br></p>

							
						</div>
					</div>
					<div class="col-md-6">
						<!-- block image -->
						<div class="block-img">
							<img src="<?=base_url().'assets/' ?>dist/img/1.jpeg" alt="" style="height:500px; width: 550px" />
						</div>
					</div>
				</div>
			</div>
		</section>

  <?php $this->load->view('front_end/footer');?>