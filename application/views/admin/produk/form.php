<div class="container">
  <?php echo $this->session->flashdata('msg'); ?>
  <?php echo validation_errors('<div class="alert alert-danger">','</div>');  ?>
  <?php
  if ($jenis_form=='tambah') {?>
    <br>
    <div class="box box-info col-sm-2">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Produk</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Produk/tambah')?> " method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Produk</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Produk" name="nama_produk">
                  </div>
                </div>

                <div class="form-group">
	                <label class="control-label col-md-2">Kategori</label>
	                <div class="col-sm-9">
	                    <select name="kategori" id="kategori" class="form-control">
	                    	<option value="0">-PILIH-</option>
	                    <?php foreach ($daftarkategori as $rowkategori): ?>
	                    		  <option value="<?php echo $rowkategori['id_ketegori']; ?>"><?php echo $rowkategori['nama_ketegori']; ?></option>
	                    	<?php endforeach;?>
	                    </select>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="control-label col-md-2">Sub Kategori</label>
	                <div class="col-sm-9">
	                    <select name="subkategori" class="subkategori form-control">
	                    	<option value="0">-PILIH-</option>
	                    </select>
	                </div>

	            </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputEmail3" placeholder="Kategori" name="jumlahbibt">
                </div>

              </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga diambil sendiri</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="Kategori" name="sendiri">
                  </div>

                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga diantar</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="Kategori" name="antar">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">keterangan</label>
                  <div class="col-sm-9">

                    <textarea class="form-control" rows="20" cols="80" id="comment" name="keterangan"></textarea>

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
        $idproduk=$rowedit['id_produk'];
        $idkat=$rowedit['id_ketegori'];
        $idsubkat=$rowedit['id_subketegori'];
        $namakat=$rowedit['nama_ketegori'];
        $namasubkat=$rowedit['nama_subketegori'];
        $namaproduk=$rowedit['nama_produk'];
        $hargasendiri=$rowedit['harga_diambilsendiri'];
        $hargaantar=$rowedit['harga_diantar'];
        $ket=$rowedit['Keterangan'];
        $jumlahbibit=$rowedit['jumlah'];
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
              <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Produk/edit')?> " method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Produk</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Produk" name="nama_produk" value="<?php echo $namaproduk ?>">
                    </div>
                  </div>

                  <div class="form-group">
  	                <label class="control-label col-md-2">Kategori</label>
  	                <div class="col-sm-9">
  	                    <select name="kategori" id="kategori" class="form-control">
  	                    	<option value="<?php echo $idkat ?>"><?php echo $namakat ?></option>
  	                    <?php foreach ($daftarkategori as $rowkategori): ?>
                          <?php if ($idkat != $rowkategori['id_ketegori']): ?>
                            <option value="<?php echo $rowkategori['id_ketegori']; ?>"><?php echo $rowkategori['nama_ketegori']; ?></option>
                          <?php endif; ?>
  	                    <?php endforeach;?>
  	                    </select>
  	                </div>
  	            </div>
  	            <div class="form-group">
  	                <label class="control-label col-md-2">Sub Kategori</label>
  	                <div class="col-sm-9">
  	                    <select name="subkategori" class="subkategori form-control">
  	                    		<option value="<?php echo $idsubkat ?>"><?php echo $namasubkat ?></option>
  	                    </select>
  	                </div>

  	            </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="Kategori" name="jumlahbibt" value="<?php echo $jumlahbibit ?>">
                  </div>

                </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Harga diambil sendiri</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="inputEmail3" placeholder="Kategori" name="sendiri" value="<?php echo $hargasendiri ?>">
                    </div>

                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Harga diantar</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="inputEmail3" placeholder="Kategori" name="antar" value="<?php echo $hargaantar ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">keterangan</label>
                    <div class="col-sm-9">

                      <textarea class="form-control" rows="20" cols="80" id="comment" name="keterangan"><?php echo $ket ?></textarea>

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
                  <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="id" value="<?php echo $idproduk ?>">
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
