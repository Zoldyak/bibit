<!-- jQuery 3 -->
<script src="<?php echo $this->config->item('admin') ?>/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $this->config->item('admin') ?>/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo $this->config->item('admin') ?>/js/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $this->config->item('admin') ?>/js/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $this->config->item('admin') ?>/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $this->config->item('admin') ?>/js/demo.js"></script>
<!-- grafik -->
<script src="<?php echo $this->config->item('admin') ?>/js/raphael.js"></script>
<script src="<?php echo $this->config->item('admin') ?>/js/morris.js"></script>

<script src="<?php echo $this->config->item('admin') ?>/css/datatables.net-bs/js/dataTables.bootstrap.js"></script>
<script src="<?php echo $this->config->item('admin') ?>/css/datatables.net/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script>
  $(function () {
    $('#example1').DataTable({
      "columns": [
        { "width": "20%" }
    })
    $('#example2').DataTable({

      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
