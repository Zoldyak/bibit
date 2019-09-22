
<div class="container bg-white">

  <div class="col-sm-12">

    <div class="col-sm-12 box">

      <?php foreach ($cekgambar as $row):
        $almat=$row['alamat_pengiriman'];
       ?>
      <?php if ($row['status']=='Pemesanan') {?>
      <br>  <img src="<?php echo $this->config->item('frontend') ?>/image/pesan.png" class="img-responsive" style="width:100%" alt="Image">
    <?php  }
    elseif ($row['status']=='Pembayaran') {?>
      <br>  <img src="<?php echo $this->config->item('frontend') ?>/image/bayar.png" class="img-responsive" style="width:100%" alt="Image">

  <?php   }   elseif ($row['status']=='Barang Dikemas') {?>
      <br>  <img src="<?php echo $this->config->item('frontend') ?>/image/kemas.png" class="img-responsive" style="width:100%" alt="Image">

  <?php   } elseif ($row['status']=='Barang Siap Diambil') {
    ?>
      <br>  <img src="<?php echo $this->config->item('frontend') ?>/image/siap.png" class="img-responsive" style="width:100%" alt="Image">

  <?php   } elseif ($row['status']=='Barang Telah Dikirim' ) {
    ?>
      <br>  <img src="<?php echo $this->config->item('frontend') ?>/image/antar.png" class="img-responsive" style="width:100%" alt="Image">

  <?php   } elseif ($row['status']=='Barang Telah Diterima ' ) {
      if ($row['metode']=='diambil') {?>
            <br>  <img src="<?php echo $this->config->item('frontend') ?>/image/kirim2.png" class="img-responsive" style="width:100%" alt="Image">
      <?php } else { ?>
        <img src="<?php echo $this->config->item('frontend') ?>/image/kirim.png" class="img-responsive" style="width:100%" alt="Image">
    <?php   }?>


  <?php   }?>

  <?php endforeach; ?><br>
  <!-- <div class="col-sm-12">
    <?php foreach ($cekdetaillistlog as $row12): ?>
      <span>ll</span>
    <?php endforeach; ?>
  </div> -->
      <div class="col-sm-12 box-header">
        List Transaksi
      </div>
      <div class="col-sm-12 box-body">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" />



        <table id="example" class="table table-striped table-bordered dt-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>


                    </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach ($cekdetaillistlog as $row1)
                  {
                    if ($row1['status']=='Barang Telah Dikirim') {
                      $tanggal=$row1['tanggal_log'];
                      $estimasi=date('Y-m-d h:i:s', strtotime('+3 day', strtotime($tanggal)));
                    }
                  
                    $no++;
                    ?>
                      <tr>
                          <td><?php echo  $no;?></td>
                          <?php if ($row1['status']=='Barang Telah Dikirim') {?>
                            <td><?php echo "Estimasi Barang Sampai 3 Hari Dari: ".$row1['tanggal_log']." - ".$estimasi;?></td>
                          <?php } else{?>
                          <td><?php echo $row1['tanggal_log'];?></td>
                        <?php }   if ($row1['status']=='Barang Telah Diterima ' && $row1['metode']=='diantar')
                                {
                              ?>
                          <td><?php echo $row1['status']."Ke Alamat : ".$almat?></td>
                        <?php } else{?>
                          <td><?php echo $row1['status']?></td>
                      <?php  } ?>


                      </tr>
                  <?php
                  } ?>
                </tbody>

            </table>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
          $('#example').DataTable({
            'searching'   : true
          });
        } );
        </script>
      </div>
        <div class="col-sm-12 box-footer">
        </div>
    </div>
  </div>
</div>
