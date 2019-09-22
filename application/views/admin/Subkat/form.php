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
            <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Subkat/tambah')?> " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Kategori</label>
                  <div class="col-sm-10">
                    <select class="form-control col-sm-10" id="sel1" name="idkat">
                      <?php foreach ($daftarkat as $rowkat): ?>
                        <option value="<?php echo $rowkat['id_ketegori'] ?>"><?php echo $rowkat['nama_ketegori'] ?></option>

                      <?php endforeach; ?>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama SubKategori </label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Kategori" name="subkategori">
                  </div>
                  <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="tambah">
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
        $kat=$rowedit['nama_subketegori'];
        $IDSUBKAT=$rowedit['id_subketegori'];
        $IDKAT=$rowedit['id_ketegori'];

      }
      ?>
      <br>
      <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Form Edit Kategori</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Subkat/edit')?> " method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Kategori</label>
                    <div class="col-sm-10">
                      <select class="form-control col-sm-10" id="sel1" name="idkat">
                        <?php foreach ($daftarkat as $rowkat):
                            if ($rowkat['id_ketegori']==$IDKAT) {?>
                              <option value="<?php echo $rowkat['id_ketegori'] ?>" selected><?php echo $rowkat['nama_ketegori'] ?></option>
                          <?php  }
                          else {
                            # code...

                          ?>
                          <option value="<?php echo $rowkat['id_ketegori'] ?>"><?php echo $rowkat['nama_ketegori'] ?></option>

                        <?php }
                      endforeach; ?>

                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Sub Kategori</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="subKategori" name="subKategori" value="<?php echo "$kat"; ?>">
                    </div>
                    <input type="hidden" class="form-control" id="inputEmail3" placeholder="Kategori" name="idsubkat" value="<?php echo "$IDSUBKAT"; ?>">
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
