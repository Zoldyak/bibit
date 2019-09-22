<div class="container">
  <?php echo validation_errors('<div class="alert alert-danger">','</div>');  ?>
  <?php
  if ($jenis_form=='tambah') {?>
    <br>
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Kategori</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Edukasi/tambah')?> " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Kategori" name="judul">
                  </div>
                  <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="tambah">
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">URL</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Kategori" name="url">
                  </div>

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
        $jud=$rowedit['judul'];
        $IDEDU=$rowedit['id_edukasi'];
        $URL=$rowedit['alamat_web'];

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
              <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Edukasi/edit')?> " method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Kategori" name="judul" value="<?php echo "$jud"; ?>">
                    </div>
                    <input type="hidden" class="form-control" id="inputEmail3" placeholder="Kategori" name="idedu" value="<?php echo "$IDEDU"; ?>">
                    <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="edit">
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">URL</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Kategori" name="url" value="<?php echo "$URL"; ?>">
                    </div>

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
