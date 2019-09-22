<div class="container">
  <?php echo validation_errors('<div class="alert alert-danger">','</div>');  ?>

    <br>
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Update</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <?php foreach ($daftar as $row): ?>
            <form class="form-horizontal"  action="<?php echo base_url('admin/CA_transaksi/update_pengiriman')?> " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Status Pingiriman</label>
                  <div class="col-sm-10">
                    <select class="form-control col-sm-10" id="sel1" name="proses">
                      <?php if ($row['Status_pengiriman']=='Proses') {
                        $status1='Barang Telah Dikirim';
                        $status2='Barang Dikemas';
                        $status3='Barang Telah Diterima ';
                        $status4='Barang Siap Diambil';

                      }
                      elseif ( $row['Status_pengiriman']=='Barang Dikemas') {
                        $status1='Barang Telah Dikirim';
                        $status2='Proses';
                        $status3='Barang Telah Diterima ';
                        $status4='Barang Siap Diambil';
                      }
                      elseif ($row['Status_pengiriman']=='Barang Siap Diambil') {
                        $status1='Barang Telah Dikirim';
                        $status2='Barang Telah Diterima ';
                        $status3='Barang Dikemas';
                        $status4='Proses';
                      }
                      elseif ($row['Status_pengiriman']=='Barang Telah Dikirim') {
                        $status1='Barang Siap Diambil';
                        $status2='Barang Telah Diterima ';
                        $status3='Barang Dikemas';
                        $status4='Proses';
                      }
                      // elseif ($row['Status_pengiriman']=='Barang Telah Diterima') {
                      //   $status1='Barang Telah Dikirim';
                      //   $status2='Proses';
                      //   $status3='Barang Dikemas';
                      //   $status4='Barang Siap Diambil';
                      // }

                      else{
                      $status1='Barang Telah Dikirim';
                      $status2='Proses';
                      $status3='Barang Dikemas';
                      $status4='Barang Siap Diambil';

                      }
                      ?>
                        <option value="<?php echo $row['Status_pengiriman'] ?>"><?php echo $row['Status_pengiriman'] ?></option>
                        <option value="<?php echo $status1; ?>"><?php echo $status1 ?></option>
                        <option value="<?php echo $status2; ?>"><?php echo $status2 ?></option>
                        <option value="<?php echo $status3; ?>"><?php echo $status3 ?></option>
                        <option value="<?php echo $status4; ?>"><?php echo $status4 ?></option>

                    </select>

                  </div>
                  <input type="hidden" name="id" value="<?php echo $row['id_transaksi'] ?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
              <?php endforeach; ?>
          </div>
</div>
