<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Selamat datang di Website Sistem Informasi Geografis Badan Kesatuan Bangsa Dan Politik (Kesbangpol) Kota Pekanbaru. Website ini sebagai sarana untuk memberikan Informasi Organisasi masyarakat (Ormas) dan Lembaga Swadaya Masyarakat (LSM)terdaftar.">
    <meta name="keywords" content="Geografis, pekanbaru, lsm, ormas, pemetaan, kesbangpol, gis">
    <meta name="author" content="kesbangpol-pekanbaru.org">
    <meta name="google-site-verification" content="7Zmbd8UGqg3xvyFSmrUrh7mqzH0-fKcURKVsQ7GknJw" />

    <title>Sistem Informasi Geografis | Kesbangpol Kota Pekanbaru</title>
<!-- js MAPS -->
     <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
     <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.sticky.min.js') ?>"></script>
     <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
     <?php if(isset($map['js'])) echo $map['js']; ?>
<!-- end js map -->
        <!-- DataTables -->
        <link rel="stylesheet" href="<?=base_url().'assets/' ?>plugins/datatables/dataTables.bootstrap.css">
        <!--  favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>neuron/assets/img/ico/favicon.png">
        <!--  apple-touch-icon -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>neuron/assets/img/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>neuron/assets/img/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>neuron/assets/img/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>neuron/assets/img/ico/apple-touch-icon-57-precomposed.png">

    <!-- animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>neuron/assets/css/animate.min.css" media="all" />
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>neuron/assets/fonts/font-awesome/css/font-awesome.min.css" media="all" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url();?>neuron/assets/css/owl.carousel.min.css" media="all" />
    <!-- Bootsnav Menu -->
    <link rel="stylesheet" href="<?php echo base_url();?>neuron/assets/css/bootsnav.css" media="all" />
    <!-- Bootstrap -->
    <link rel="stylesheet"  href="<?php echo base_url();?>neuron/assets/bootstrap/css/bootstrap.min.css" media="all" />
    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>neuron/style.css" media="all" />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
    <!-- ::::::::::::::::::::: Header Section:::::::::::::::::::::::::: -->
    <header>
      <!-- start top bar -->
      <div class="header-top-area">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 hidden-xs">
              <div class="contact">
                <p>
                  <i class="fa fa-phone"></i>
                  +880 123 456 789
                </p>
                <p>
                  <i class="fa fa-envelope"></i>
                  <a href="#">bakesbangpol@domain.com</a>
                </p>
              </div>
            </div>
            
            <div class="col-sm-4">
              <div class="social-icon">
                <ul>
                  <li><a href=""><i class="fa fa-facebook"></i></a></li>
                  <li><a href=""><i class="fa fa-twitter"></i></a></li>
                  <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                  <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                  <li><a href=""><i class="fa fa-tumblr"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      
          <!-- Start Navigation -->
          <nav class="navbar navbar-default navbar-sticky bootsnav">
              <!-- Start Top Search -->
              <div class="top-search">
                  <div class="container">
                  </div>
              </div>
              <!-- End Top Search -->

              <div class="container">
                  <!-- Start Atribute Navigation -->
                  <div class="attr-nav">
                      <ul>
                          
                      </ul>
                  </div>
                  <!-- End Atribute Navigation -->

                  <!-- Start Header Navigation -->
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                          <i class="fa fa-bars"></i>
                      </button>
                      <a class="navbar-brand" href="<?php echo base_url();?>beranda"><img src="<?php echo base_url();?>neuron/assets/img/logo1.png" class="logo logo-scrolled" alt=""></a>
                  </div>
                  <!-- End Header Navigation -->

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  