<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
    <?php   include 'inc/metacss.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php   include 'inc/header.php'; ?>
  <?php   include 'inc/menu.php'; ?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->


      <!-- Default box -->

        <?php
          if (!Empty($halaman)) {
             include $halaman;
          }
else { ?>
  <div class="row">
    <div class="col-sm-12">
      <div class="box-body chart-responsive">
        <div class="panel panel-default">

            <div class="panel-body">
                <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Dahsbord')?> " method="post" enctype="multipart/form-data">
              <div class="form-group">

                <div class="col-sm-5">

                  <select id="mySelect" onchange="myFunction()" class="form-control col-sm-10" name="pilih">
                    <?php
                $thn_skr = date('Y');
                for ($x = $thn_skr; $x >= 2013; $x--) {
                ?>
                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                <?php
                }
                ?>
                  </select>
                </div>

                <div class="col-sm-2">
                    <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
                </div>
              </div>
            </form>
            <div class="panel-heading">Grafik Penjualan Perbulan Tahun:<?php echo $tahunke; ?></div>
              <div  id="myfirstchart"></div>
              <br>
                <div class="panel-heading">Grafik Penjualan Terlaris Tahun:<?php echo $tahunke; ?></div>
                <div  id="myfirstchart2"></div>


            </div>

          </div>

      </div>
    </div>

  </div>


<script>

new Morris.Line({

// ID of the element in which to draw the chart.
element: 'myfirstchart',
// Chart data records -- each entry in this array corresponds to a point on
// the chart.
parseTime: false,
data: [

    // code...
    <?php foreach ($grapjual as $rowgraphjual) {
      $bulan=$rowgraphjual['bulan'];
      $jumlah=$rowgraphjual['jumlahbarang'];
      $tahun=$rowgraphjual['tahun'];
      if ($bulan==1) {
        $namabulan="Januari";
      }
      elseif ($bulan==2) {
          $namabulan="Februari";
      }
      elseif ($bulan==3) {
          $namabulan="Maret";
      }
      elseif ($bulan==4) {
          $namabulan="April";
      }
      elseif ($bulan==5) {
          $namabulan="Mei";
      }
      elseif ($bulan==6) {
          $namabulan="Juni";
      }
      elseif ($bulan==7) {
          $namabulan="Juli";
      }
      elseif ($bulan==8) {
          $namabulan="Agustus";
      }
      elseif ($bulan==9) {
          $namabulan="September";
      }
      elseif ($bulan==10) {
          $namabulan="Oktober";
      }
      elseif ($bulan==11) {
          $namabulan="November";
      }
      elseif ($bulan==12) {
          $namabulan="Desember";
      }?>

{ month: '<?php echo $namabulan ?>', jumlah: <?php echo $jumlah ?> },
  <?php } ?>
],

// The name of the data record attribute that contains x-values.

xkey: 'month',
// A list of names of data record attributes that contain y-values.
ykeys: ['jumlah'],
// Labels for the ykeys -- will be displayed when you hover over the
// chart.
labels: ['penjualan Bibit'],

});

new Morris.Bar({

// ID of the element in which to draw the chart.
element: 'myfirstchart2',
// Chart data records -- each entry in this array corresponds to a point on
// the chart.
parseTime: false,
data: [

    // code...
    <?php foreach ($graphlaris as $rowgraphjual1) {
      $bulan=$rowgraphjual1['nama_produk'];
      $jumlah=$rowgraphjual1['jumlahbarang'];
      $tahun=$rowgraphjual1['tahun'];
?>

{ month: '<?php echo $bulan ?>', jumlah: <?php echo $jumlah ?> },
  <?php } ?>
],

// The name of the data record attribute that contains x-values.

xkey: 'month',
// A list of names of data record attributes that contain y-values.
ykeys: ['jumlah'],
// Labels for the ykeys -- will be displayed when you hover over the
// chart.
labels: ['penjualan Bibit'],

});

</script>

<?php
}
 ?>
  <br>
  <br>
  <br>
  <br>
  <br>

      <!-- /.box -->


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php   include 'inc/js.php'; ?>
</body>
</html>
