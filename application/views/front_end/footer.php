<footer>

            <!-- footer copyright area -->
            <div class="copyright-wrapper text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Copyright@2018 Badan Kesatuan Bangsa Dan Politik Kota Pekanbaru<a href="<?php ?>"> Sistem Informasi Geografis</a></p>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- ./end copyright-wrapper -->
        </footer>

        <!-- preloader -->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_four"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_one"></div>
                </div>
            </div>
        </div>

        <!-- main jQuery -->
        <script src="<?php echo base_url();?>neuron/assets/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo base_url();?>neuron/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>neuron/assets/js/bootsnav.js"></script>
        <script src="<?php echo base_url();?>neuron/assets/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url();?>neuron/assets/js/wow.min.js"></script>
        <script src="<?php echo base_url();?>neuron/assets/js/ajaxchimp.js"></script>
        <script src="<?php echo base_url();?>neuron/assets/js/ajaxchimp-config.js"></script> 
        <script src="<?php echo base_url();?>neuron/assets/js/script.js"></script>

        <script src="<?=base_url().'assets/' ?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url().'assets/' ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- Slimscroll -->
        <script src="<?=base_url().'assets/' ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?=base_url().'assets/' ?>plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?=base_url().'assets/' ?>dist/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) 
        <script src="<?php echo base_url();?>adminlte/dist/js/pages/dashboard.js"></script>-->
        <!-- AdminLTE for demo purposes -->
        <script src="<?=base_url().'assets/' ?>dist/js/demo.js"></script>
        <!-- page script -->
        <script>
          $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false
            });
          });

        function setMapToForm(latitude, longitude) 
            {
              $('input[name="latitude"]').val(latitude);
              $('input[name="longitude"]').val(longitude);
            }


        </script>
       
</body>
</html>
