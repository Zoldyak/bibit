
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
                        <th>Nama Barang</th>
                        <th>Alamat Pengiriman</th>
                        <th>Jumlah Barang</th>
                        <th>Metode</th>
                        <th>Harga Barang</th>
                        <th>Total Harga</th>

                    </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach ($detaillistlog as $row1)
                  {

                    $no++;
                    ?>
                      <tr>
                          <td><?php echo  $no;?></td>
                          <td><?php echo $row1['nama_barang'];?></td>
                          <td><?php echo $row1['alamat_pengiriman'];?></td>
                          <td><?php echo $row1['Jumlah_barang'];?></td>
                          <td><?php echo $row1['metode'];?></td>
                          <td><?php echo $row1['harga_barang'];?></td>
                          <td><?php echo $row1['jumlah_harga'];?></td>


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
