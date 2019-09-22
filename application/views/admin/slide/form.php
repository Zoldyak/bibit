<div class="container">

  <?php echo validation_errors('<div class="alert alert-danger">','</div>');  ?>
  <?php
  if ($jenis_form=='tambah') {?>
    <br>
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Sile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Slide/tambah')?> " method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Judul" name="judul">
                  </div>
                  <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="tambah">
                </div>
                <div class="form-group">
	                <label class="control-label col-md-2">Kategori</label>
	                <div class="col-sm-9">
	                    <select name="kategori" id="kategori" class="form-control">
	                    	<option value="0">-PILIH-</option>
	                    <?php foreach ($daftarkategori as $rowkategori): ?>
	                    		  <option value="<?php echo $rowkategori['id_subketegori']; ?>"><?php echo $rowkategori['nama_subketegori']; ?></option>
	                    	<?php endforeach;?>
	                    </select>
	                </div>
	            </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-9">
                   <input type="file" class="form-control" id="inputEmail3" placeholder="Kategori" name="foto">

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
        $idslide=$rowedit['id_slide'];
          $idkat=$rowedit['id_ketegori'];
          $namakat=$rowedit['nama_subketegori'];
      }
      ?>
      <br>
      <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Form Edit Slide</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="" action="index.html" method="post">

              </form>
              <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Slide/edit')?> " method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Kategori" name="judul" value="<?php echo "$jud"; ?>">
                    </div>
                    <input type="hidden" class="form-control" id="inputEmail3" placeholder="Kategori" name="idslide" value="<?php echo "$idslide"; ?>">
                    <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="edit">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2">Kategori</label>
                    <div class="col-sm-9">
                        <select name="kategori" id="kategori" class="form-control">
                          <option value="<?php echo $idkat ?>"><?php echo $namakat ?></option>
                        <?php foreach ($daftarkategori as $rowkategori): ?>
                          <?php if ($idkat != $rowkategori['id_subketegori']): ?>
                            <option value="<?php echo $rowkategori['id_subketegori']; ?>"><?php echo $rowkategori['nama_subketegori']; ?></option>
                          <?php endif; ?>
                        <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-9">
                   <input type="file" class="form-control" id="inputEmail3" placeholder="Kategori" name="foto">

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
