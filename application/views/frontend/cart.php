<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" />
<div class="container bg-white">
  <div class="col-sm-12">
    <h2 class="text-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart</h2>
    <form class="" action="<?php echo base_url('CF_Cart/pesansekarang') ?>" method="post">


    <table id="example" class="table table-striped table-bordered dt-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Alamat Pengiriman</th>
                    <th>Harga Barang</th>
                    <th>Metode Pengiriman</th>
                    <th>Jumlah Barang</th>
                    <th>Bayar</th>

                </tr>
            </thead>
            <tbody>
              <?php
                    $no=0;
                    if ($cart = $this->cart->contents()):
                    $grand_total = 0;

              ?>
                <?php foreach ($cart as $item):
                  $no++;

                  $grand_total +=$item['subtotal'];
                ?>
                  <tr>

                    <td><?php echo  $no?>
                      <input type="hidden" name="rowid[]" value="<?php echo $item['rowid'] ?>">
                      <input type="hidden" name="produkID[]" value="<?php echo $item['id'] ?>">
                        <input type="hidden" class="form-control" name="tersedia[]" id="email" placeholder="" value="<?php echo $item['jumtersedia'] ?>">
                    </td>
                    <td> <a href="<?php echo base_url(); ?>CF_Cart/remove/<?php echo $item['rowid']; ?>"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                      <?php echo $item['name']; ?>
                      <input type="hidden" name="namaproduk[]" value="<?php echo $item['name'] ?>">
                    </td>
                    <td>
                      <?php echo $item['alamat_pengiriman']; ?>
                      <input type="hidden" name="alamat[]" value="<?php echo $item['alamat_pengiriman'] ?>">
                    </td>
                    <td><?php echo $item['harga_barang']; ?>
                      <input type="hidden" name="hargabarang[]" value="<?php echo $item['harga_barang'] ?>">
                    </td>
                    <td><?php echo $item['metode']; ?>
                      <input type="hidden" name="metode[]" value="<?php echo $item['metode'] ?>">
                    </td>
                    <td><?php echo $item['qty']; ?>
                      <input type="hidden" name="jumlahbarang[]" value="<?php echo $item['qty'] ?>"></td>
                    <td><?php echo $item['subtotal']; ?>
                      <input type="hidden" name="bayar[]" value="<?php echo $item['subtotal'] ?>">
                    </td>

                  </tr>
                <?php endforeach; ?>

              <?php endif; ?>
            </tbody>
            <thead>
              <th class="bg-gray" style="border-right: none;"></th>

              <th class="bg-gray" style="border-right: none;"></th>
              <th class="bg-gray" style="border-right: none;"></th>
                <th class="bg-gray" style="border-right: none;">TOTAL</th>
              <th class="bg-gray" style="border-right: none;"></th>
              <th class="bg-gray" style="border-right: none;"></th>

              <th><?php echo $grand_total; ?>
              <input type="hidden" name="total" value="<?php echo $grand_total ?>"></th>

            </thead>
        </table>
        <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-bookmark"></span> Pesan Sekarang</button>
        </form>
  </div>
</div>
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
