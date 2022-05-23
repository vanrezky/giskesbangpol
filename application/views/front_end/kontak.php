<?php $this->load->view('front_end/header');?> 

 <?php $this->load->view('front_end/nav_bar');?>

 <section class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- breadcrumb content -->
					<div class="page-breadcrumbd">
						<h2>Kontak Kami</h2>
					</div><!-- end breadcrumb content -->
				</div>
			</div>
		</div>
	</section><!-- end breadcrumb -->

	<!-- ::::::::::::::::::::: start contant section :::::::::::::::::::::::::: -->
	<section class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
					<!-- contact title -->
					<div class="template-title text-center">
						<h2>Hubungi Kami</h2>
						<p>Hubungi Kami Jika Ada Sesuatu Yang Tidak Jelas, Atau Ada Yang Bingung</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-8">

					<?php echo form_open_multipart('beranda/simpan','class="form-horizontal"'); ?>
					<?php echo $this->session->userdata('message');?>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="sr-only" for="name">Nama</label>
                    				<input type="text" name="nama" class="form-control" id="name" placeholder="Nama Anda" required autofocus>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="sr-only" for="email">Email</label>
		                          	<input type="email" name="email" class="form-control" id="email" placeholder=" Email Anda" required autofocus>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="sr-only" for="subject">subject</label>
                          	<input type="text" name="subject" class="form-control" id="subject" placeholder="subject Anda" required autofocus>
						</div>
						<div class="form-group">
							<label class="sr-only" for="message">Pesan</label>
	                        <textarea name="pesan" class="form-control" id="message" rows="7" placeholder="Pesan Anda" required autofocus></textarea>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-primary input-btn"><span>Submit</span></button>
							<input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
                   			<input type="hidden" name="st" value="<?php echo $st; ?>">  
						</div>
						<?php echo form_close(); ?>
					</div>
				
				<div class="col-md-4">
					<!-- company address -->
					<div class="company-address">
						<ul>
							<li>
								<i class="fa fa-map-marker"></i>
								<p>305 Royal Track Suite 019. New York United States of America.</p>
								<span class="divider"></span>
								<p>Hoffman Parkway, P.O Box 154 Mountain View.  United States of America.</p>
								
							</li>
							<li>
								<i class="fa fa-phone"></i>
								<p>Fax: 545 751 385
								<br>Phone: 0123 456 789</p>
							</li>
							<li>
								<i class="fa fa-envelope-o"></i>
								<a>info@trendytheme.com</a>
								<a>www.trendytheme.com</a>
							</li>
						</ul>
					</div><!-- ./end company address -->
				</div>
			</div>
		</div>
	</section>

  <?php $this->load->view('front_end/footer');?>