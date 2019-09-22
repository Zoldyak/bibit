<div class="container">
  <?php echo validation_errors('<div class="alert alert-danger">','</div>');  ?>
  <?php
  if ($jenis_form=='tambah') {?>
    <br>
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Cara Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Pembayaran/tambah')?> " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Kategori" name="keterangan">
                  </div>
                  <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="tambah">
                    <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="tipe" value="Pembayaran">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
  <?php }
    else {
      foreach ($data_edit as $rowedit) {
        $KET=$rowedit['keterangan'];
        $ID=$rowedit['id_carabelanja'];

      }
      ?>
      <br>
      <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Form Edit Edukasi</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="" action="index.html" method="post">

              </form>
              <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Pembayaran/edit')?> " method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Kategori" name="keterangan" value="<?php echo "$KET"; ?>">
                    </div>
                    <input type="hidden" class="form-control" id="inputEmail3" placeholder="Kategori" name="idedu" value="<?php echo "$ID"; ?>">
                    <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="tipe" value="Pembayaran">
                    <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="edit">
                  </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Edit</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
  <?php  }
   ?>
</div>
