<div class="container bg-white">
  <div class="col-sm-12">
    <div class="col-sm-12 box">
      <div class="col-sm-12 box-header">
        List Transaksi
      </div>
      <div class="col-sm-12 box-body">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" />
        <table id="example" class="table table-striped table-bordered dt-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Total Bayar</th>
                        <th>Total Transfer</th>
                        <th>foto</th>
                        <th>Status Pembayaran</th>
                        <th>Status Barang</th>
                        <th>Download</th>
                        <th>Cek Pengiriman</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach ($listlog as $row1)
                  {
                    $uploadDate = $row1['tanggal_pemesanan'];
$date = strtotime($uploadDate);
$date = strtotime("+2 hours", $date);
$date = date('Y-m-d H:i:s', $date);
$date2 = strtotime($uploadDate);
$date2 = date('Y-m-d ', $date2);
                    $no++;
                    ?>
                      <tr>
                          <td><?php echo  $no;?></td>
                          <td><a href="<?php echo base_url('CF_Logtransaksi/detail_transaksi/'.$row1['id_transaksi'])?>" class="text-green">  <?php echo $date2;?></a></td>
                          <td><?php echo $row1['tottal_bayar'];?></td>
                          <td><?php echo $row1['total_transfer'];?></td>
                            <?php if (!empty($row1['bukti'])) { ?>
                          <td>
                              <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $row1['bukti'];?>" class="img-responsive" style="width:30%" alt="Image">
                          </td>
                        <?php }
                          else {?>
                            <td>
                                tidak ada
                            </td>
                          <?php  }if ($row1['status_pembayaran']=='Belum Lunas') {

                            ?>
                          <td>
                            <p id="demo<?php echo  $no;?>" style="color:#b90000"></p>
                           </td>
                          <?php  }
                          elseif ($row1['status_pembayaran']=='Dibatalkan') {?>
                          <td>
                            Dibatalkan karena pembayaran tidak sesuai
                            <br> <a href="<?php echo base_url('CF_Logtransaksi/transfer/'.$row1['id_transaksi'])?>" class="text-green">Bayar</a>
                          </td>
                        <?php  }
                          else{?>
                            <td>
Lunas

                              </a> </td>
                          <?php } ?>
                          <td><?php echo $row1['Status_pengiriman'];?></td>
                          <td><form class=""action="<?php echo base_url('CF_etiket/pdf')?> " method="post">
                            <div class="form-group">

                              <input type="hidden" name="idtrans" class="form-control" id="" placeholder="" value="<?php echo $row1['id_transaksi'] ?>">
                            <button type="submit" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>Bukti</button>
                            </div>
                          </form></td>
                          <td> <a href="<?php echo base_url('CF_Logtransaksi/cektransaksi/'.$row1['id_transaksi'])?>" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true">Cek</a></td>
                      </tr>
                      <script type="text/javascript">
function createCountDown(elementId, date) {
    // Set the date we're counting down to
    var countDownDate = new Date(date).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now an the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById(elementId).innerHTML =  hours + 'h '
      + minutes + 'm ' + seconds + 's '+ ' <a href="<?php echo base_url('CF_Logtransaksi/transfer/'.$row1['id_transaksi'])?>" class="text-green">Bayar</a>';

      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById(elementId).innerHTML = 'Pemasanan Gagal   <?php echo $date?>';
        // redirect(base_url().'CF_Logtransaksi/function');
        alert("Pemesanan <?php echo $date2?> Gagal,Waktu Pembayaran Habis");
         window.location = "<?php echo base_url().'CF_Logtransaksi/bataspemesanan/'.$row1['id_transaksi'] ?>";


      }
    }, 1000);
}

createCountDown('demo<?php echo  $no;?>', "<?php echo  $date;?>")
</script>


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
