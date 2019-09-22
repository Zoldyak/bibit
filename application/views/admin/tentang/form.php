<div class="container">
  <?php echo $this->session->flashdata('msg'); ?>
  <?php echo validation_errors('<div class="alert alert-danger">','</div>');  ?>
  <?php
  if ($jenis_form=='tambah') {?>
    <br>
    <div class="box box-info col-sm-2">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Tentang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Tentang/tambah')?> " method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Karyawan</label>
                  <div class="col-sm-9">
                    <input type="text" name="nama_karyawan" class="form-control" id="inputEmail3" placeholder="Nama Karyawan" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Jabatan</label>
                  <div class="col-sm-9">
                    <input type="text" name="nama_jabatan" class="form-control" id="inputEmail3" placeholder="Nama Jabatan" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">

                    <textarea class="form-control" name="Alamat" rows="20" cols="80" id="comment" ></textarea>

                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No.Hp</label>
                  <div class="col-sm-9">
                    <input type="number"  name="Hp" class="form-control" id="inputEmail3" placeholder="Nama Jabatan">
                  </div>
                </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-9">
                   <input type="file"  name="foto" class="form-control" id="inputEmail3" placeholder="Kategori" >
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="tambah">
                <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
  <?php }
    else {
      foreach ($data_edit as $rowedit) {
      }
      ?>
      <br>
      <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Form Edit tentang</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->

              <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Tentang/edit')?> " method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Karyawan</label>
                    <div class="col-sm-9">
                      <input type="text" value="<?php echo $rowedit['nama']; ?>" name="nama_karyawan" class="form-control" id="inputEmail3" placeholder="Nama Karyawan" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Jabatan</label>
                    <div class="col-sm-9">
                      <input type="text" value="<?php echo $rowedit['jabatan']; ?>" name="nama_jabatan" class="form-control" id="inputEmail3" placeholder="Nama Jabatan" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-9">

                      <textarea  class="form-control" name="Alamat" rows="20" cols="80" id="comment" ><?php echo $rowedit['alamat']; ?></textarea>

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">No.Hp</label>
                    <div class="col-sm-9">
                      <input type="number" value="<?php echo $rowedit['no_hp']; ?>" name="Hp" class="form-control" id="inputEmail3" placeholder="Nama Jabatan">
                    </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-9">
                     <input type="file"  name="foto" class="form-control" id="inputEmail3" placeholder="Kategori" >
                    </div>
                  </div>
                </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="id" value="<?php echo $rowedit['id_tentang']; ?>">
                  <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="edit">
                  <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Edit</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
  <?php  }
   ?>
</div>

<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('#foto').change(function(){

    });
  });
</script> -->
