<div class="container bg-white">
  <div class="col-sm-12">

      <?php if ($jumlahdata >0 ){ ?>
          <h2 class="text-green">Data Ketegori</h2>
        <?php foreach ($daftar_produk_kategori as $rowproduk1): ?>

          <div class="col-sm-2 box">
            <div class="col-sm-12 box-header">
            <?php echo $rowproduk1['nama_ketegori'] ?>
            </div>
            <div class="col-sm-12 box-body">
              <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $rowproduk1['foto']?>" class="img-responsive center-block"  style="width:69px; height:51px;" alt="Image">
            </div>
            <div class="col-sm-12 box-footer">
              <div class="row">
                <div class="col-sm-12 keterangan ">
                  <a href="<?php echo base_url('CF_Detail_Bibit')?>" class="color-black font-12">  <?php echo $rowproduk1['nama_produk'] ?></a><br>
                  <span class="text-green font-12">Harga diantar:Rp.<?php echo $rowproduk1['harga_diantar'] ?></span>
                  <span class="text-green font-12">Harga diambil:Rp.<?php echo $rowproduk1['harga_diambilsendiri'] ?></span>
                </div>
                <div class="col-sm-12">
                  <br>
                  <a type="button" name="button" class="btn pull-right btn-info font-12" >Stok:<?php echo $rowproduk1['jumlah'] ?></a><span style="float:right">&nbsp</span>
                  <a type="button" name="button" class="btn pull-right  btn-detail font-12" href="<?php echo base_url('CF_Detail_Bibit/detail/'.$rowproduk1['id_produk'])?>">detail</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php }
      else{?>
  <h2 class="text-green">Data Tidak Ditemukan</h2>
    <?php  }?>


  </div>
</div>
