<div class="container">
  <?php echo $this->session->flashdata('msg'); ?>
  <?php echo validation_errors('<div class="alert alert-danger">','</div>');  ?>
  <?php
  if ($jenis_form=='tambah') {?>
    <br>
    <div class="box box-info col-sm-2">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal"  action="<?php echo base_url('pemilik/CP_User/tambah')?> " method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nama lengkap" name="nama_lengkap">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputEmail3" placeholder="Password" name="Password">
                  </div>
                </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">No Hp</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputEmail3" placeholder="Hp" name="hp">
                </div>

              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">alamat</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputEmail3" placeholder="Alamat" name="alamat">
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
                <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="tambah">
                <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
  <?php }
    else {
      foreach ($data_edit as $rowedit) {
        $iduser=$rowedit['username'];
        $password=$rowedit['password'];
        $nama=$rowedit['nama_lengkap'];
        $alamat=$rowedit['alamat'];
        $hp=$rowedit['HP'];
      }
      ?>
      <br>
      <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Form Edit user</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="" action="index.html" method="post">

              </form>
              <form class="form-horizontal"  action="<?php echo base_url('pemilik/CP_User/edit')?> " method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input type="text" value="<?php echo $nama; ?>" class="form-control" id="inputEmail3" placeholder="Nama lengkap" name="nama_lengkap">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="email" value="<?php echo $iduser; ?>" class="form-control" id="inputEmail3" placeholder="email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" value="<?php echo $password; ?>" class="form-control" id="inputEmail3" placeholder="Password" name="Password">
                  </div>
                </div>
                <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">No Hp</label>
                <div class="col-sm-9">
                  <input type="number" value="<?php echo $hp; ?>" class="form-control" id="inputEmail3" placeholder="Hp" name="hp">
                </div>

                </div>
                <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">alamat</label>
                <div class="col-sm-9">
                  <input type="text" value="<?php echo $alamat; ?>" class="form-control" id="inputEmail3" placeholder="Alamat" name="alamat">
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
                  <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="id" value="<?php echo $iduser ?>">
                  <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="edit">
                  <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
  <?php  }
   ?>
</div>
<script src="https://code.jquery.com/jquery-2.2.3.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#kategori').change(function(){
			var id=$(this).val();
			$.ajax({
			  url: '<?php echo base_url("admin/CA_Produk/ajax_subkategotri")?>',
				method : "POST",
				data : {id: id},
				async : false,
		        dataType : 'json',
				success: function(data){
					var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<option value='+data[i].id_subketegori+'>'+data[i].nama_subketegori+'</option>';
		            }
		            $('.subkategori').html(html);

				}
			});
		});
	});
</script>
<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('#foto').change(function(){

    });
  });
</script> -->
