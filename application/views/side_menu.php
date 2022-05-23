<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        
        <div class="pull-left image">
       <img src="<?=base_url().'assets/' ?>dist/img/user.png" alt="User Image"> 

        </div>
        <div class="pull-left info">
          <p><strong>Hi, <?php echo $this->session->userdata('nama_lengkap');?></strong></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="<?php echo base_url();?>template">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Master Data</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>lokasi"><i class="fa fa-circle-o"></i>Data Lokasi</a></li>
            <li><a href="<?php echo base_url();?>jenis_organisasi"><i class="fa fa-circle-o"></i> Data Jenis Organisasi</a></li>

          </ul>
        </li>
       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>Pengaturan</span>
          </a>
           <ul class="treeview-menu">
             <li><a href="<?php echo base_url();?>pengguna"><i class="fa fa-circle-o"></i> Admin</a></li>
          </ul>
        </li>      
        <li class="header"></li>
        <li><a href="<?= base_url();?>kontak"><i class="fa fa-smile-o"></i>
          <span>Kontak</span>
          <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php $jumlah = $this->db->get('kontak')->num_rows(); echo $jumlah?></small>
            </span>
         </a></li>

        <li><a href="<?= base_url('beranda');?>" target="_blank"><i class="fa fa-eye"></i> <span>View Site</span></a></li>

        <li class="header"></li>
        <li><a href="<?= base_url('dashboard/logout');?>"><i class="fa fa-times-circle text-red"></i> <span>Keluar</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>