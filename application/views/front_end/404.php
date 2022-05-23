<?php $this->load->view('front_end/header');?> 

 <?php $this->load->view('front_end/nav_bar');?>

 		<!-- ::::::::::::::::::::: single-blog section:::::::::::::::::::::::::: -->
		<section class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- post wrapper -->
						<div class="post-wrapper clearfix">
							<!-- post thumbnail -->
							<div class="single-thumb">
								<a href="">
									<img src="assets/img/slider-bg/3.jpg" alt="" />
								</a>
							</div>
							
							<!-- start single blog content -->
							<div class="blog-content">
								<!-- start single blog header -->
								<header class="single-header">
									<div class="single-post-title">
										<a align="center"><img src="<?php echo base_url()?>neuron/assets/img/404..png" width="20%" height="20%" style="display: block; margin: auto;"><h1>Halaman Tidak Ditemukan</h1></a>
						<div class="text-center">
							<button href="<?php echo base_url()?>beranda" class="btn btn-primary input-btn"><span>Home</span></button>
						</div>
									</div>
								
								</header><!-- /.end single blog header -->
								
							</div><!-- /.end single blog content -->
							
							<!-- start comments wrapper -->
						</div>
					</div>
				</div>
			</div>
		</section>

    <?php $this->load->view('front_end/footer');?>