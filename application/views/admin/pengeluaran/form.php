<div class="container">
  <?php echo validation_errors('<div class="alert alert-danger">','</div>');
    date_default_timezone_set('Asia/Jakarta');
    $tanggal=date('Y-m-d H:i:s');
  ?>
  <?php if ($kategori_form =='gaji') {
            if ($jenis_form == 'tambah') {?>
              <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">Form Tambah Pengeluaran Gaji</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Pengeluaran/add_pengeluaran')?> " method="post">
                        <div class="box-body">
                          <div class="form-group">
          	                <label class="control-label col-md-2">Nama Pegwai</label>
          	                <div class="col-sm-9">
          	                    <select name="namapengeluaran" id="kategori" class="form-control">
          	                    	<option value="0">-PILIH-</option>
          	                    <?php foreach ($list_karyawan as $rowkaryawan): ?>
          	                    		  <option value="<?php echo $rowkaryawan['nama']; ?>"><?php echo $rowkaryawan['nama']; ?></option>
          	                    	<?php endforeach;?>
          	                    </select>
          	                </div>
          	            </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Bulan</label>
                            <div class="col-sm-10">
                              <select class="form-control col-sm-10" id="sel1" name="bulan">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pengeluaran</label>

                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="inputEmail3" placeholder="Jumlah" name="pengeluaran">
                            </div>

                          </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                          <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="tambah">
                          <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="level" value="2">
                          <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="jenisform" value="gaji">
                          <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="keterangan" value="Gaji">
                          <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</button>
                        </div>
                        <!-- /.box-footer -->
                      </form>
                    </div>
          <?php  }
          else { ?>
            <?php foreach ($detailpengeluaran as $row):
              $namakar= $row['nama_pengeluaran']; ?>


            <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Form edit Pengeluaran</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Pengeluaran/update_pengeluaran')?> " method="post">
                      <div class="box-body">
                        <div class="form-group">
        	                <label class="control-label col-md-2">Kategori</label>
        	                <div class="col-sm-9">
        	                    <select name="kategori" id="kategori" class="form-control">
        	                    	<option value="<?php echo $namakar ?>"><?php echo $namakar ?></option>
        	                    <?php foreach ($list_karyawan as $rowkaryawan): ?>
                                <?php if ($namakar != $rowkaryawan['nama']): ?>
                                  <option value="<?php echo $rowkaryawan['nama']; ?>"><?php echo $rowkaryawan['nama']; ?></option>
                                <?php endif; ?>
        	                    <?php endforeach;?>
        	                    </select>
        	                </div>
        	            </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Bulan</label>
                          <div class="col-sm-10">
                            <select class="form-control col-sm-10" id="sel1" name="bulan">
                              <option value="01">Januari</option>
                              <option value="02">Februari</option>
                              <option value="03">maret</option>
                              <option value="04">April</option>
                              <option value="05">Mei</option>
                              <option value="06">Juni</option>
                              <option value="07">Juli</option>
                              <option value="08">Agustus</option>
                              <option value="09">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pengeluaran</label>

                          <div class="col-sm-10">
                            <input type="number" value="<?php echo $row['jumlah_pengeluaran']; ?>" class="form-control" id="inputEmail3" placeholder="Kategori" name="pengeluaran">
                          </div>

                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="idtrans" value="<?php echo $row['id_transaksi']; ?>">
                        <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="tambah">
                        <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="level" value="2">
                        <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="keterangan" value="Gaji">
                          <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="jenisform" value="gaji">
                        <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</button>
                      </div>
                      <!-- /.box-footer -->
                    </form>
                  </div>
                <?php endforeach; ?>
          <?php }
  }
  else{
    if ($jenis_form == 'tambah') {?>
    <!-- barang -->
      <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Pengeluaran lainnya</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Pengeluaran/add_pengeluaran')?> " method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Pengeluaran</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Nama" name="namapengeluaran">
                    </div>

                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pengeluaran</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inputEmail3" placeholder="Jumlah" name="pengeluaran">
                    </div>

                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">keterangan</label>

                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="keterangan" name="keterangan" value="">
                    </div>

                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="tambah">
                  <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="level" value="3">
                  <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="bulan" value="<?php echo $tanggal; ?>">
                  <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="jenisform" value="barang">
                  <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
  <?php  }
  else { ?>
    <?php foreach ($detailpengeluaran as $row): ?>


    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form edit Pengeluaran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal"  action="<?php echo base_url('admin/CA_Pengeluaran/update_pengeluaran')?> " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Pegawai</label>

                  <div class="col-sm-10">
                    <input type="text" name="namapengeluaran" value="<?php echo $row['nama_pengeluaran']; ?>" class="form-control" id="inputEmail3" placeholder="Nama">
                  </div>

                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pengeluaran</label>

                  <div class="col-sm-10">
                    <input type="number" value="<?php echo $row['jumlah_pengeluaran']; ?>" class="form-control" id="inputEmail3" placeholder="Kategori" name="pengeluaran">
                  </div>

                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">keterangan</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" placeholder="keterangan" name="keterangan" value="<?php echo $row['keterangan']; ?>">
                  </div>

                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="idtrans" value="<?php echo $row['id_transaksi']; ?>">
                <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="aksi" value="tambah">
                <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="level" value="3">
                <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="jenisform" value="barang">
                <input type="hidden" class="form-control" id="inputEmail3" placeholder="Email" name="bulan" value="<?php echo $row['tanggal']; ?>">
                <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        <?php endforeach; ?>
  <?php }

    }?>

</div>
