</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
<div class="pull-right hidden-xs">
    <b>Version</b> 1.0.0
</div>
<strong>Copyright &copy; 2019 <a href="http://laptopsenqueretaro.com/">Laptop FIX</a>.</strong> All rights
reserved.
</footer>

<!-- jQuery 3 -->
<script src="<?=base_url();?>assets/bower_components/jquery/dist/jquery-3.4.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?=base_url();?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?=base_url();?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url();?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?=base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url();?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?=base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?=base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>assets/dist/js/demo.js"></script>
<!-- JS Datatable -->
<script src="<?=base_url();?>assets/dist/js/datatables.min.js"></script>

<!--URL-->
<script type="text/javascript">
    var base_url = "<?=base_url();?>";
</script>

<!--JS Técnico-->
<?php if($this->uri->segment(2) == 'agregarTecnico'): ?>
<script src="<?=base_url();?>assets/js/technical/insert.js"></script>
<?php endif; ?>
<?php if($this->uri->segment(2) == 'gestionarTecnicos'): ?>
<script src="<?=base_url();?>assets/js/technical/managment.js"></script>
<?php endif; ?>
<?php if($this->uri->segment(2) == 'abonosTecnicos'): ?>
<script src="<?=base_url();?>assets/js/technical/payment.js"></script>
<?php endif; ?>
<?php if($this->uri->segment(2) == 'gestionarComision'): ?>
<script src="<?=base_url();?>assets/js/technical/commission.js"></script>
<?php endif; ?>

<!--JS Servicio Base-->
<?php if($this->uri->segment(2) == 'gestionarServicioBase'): ?>
<script src="<?=base_url();?>assets/js/baseService/managment.js"></script>
<?php endif; ?>

<!--JS Facturas-->
<?php if($this->uri->segment(2) == 'gestionarFactura'): ?>
<script src="<?=base_url();?>assets/js/bill/managment.js"></script>
<?php endif; ?>

</body>
</html>