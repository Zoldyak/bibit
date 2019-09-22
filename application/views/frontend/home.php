

<div class="container bg-white">
  <div class="row">

    <div class="col-sm-12">
<br>
      <div class="col-sm-12">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <?php foreach ($daftarslide as $rowslide): ?>
                <?php if ($rowslide['status']==1) {?>
                  <div class="item active">
                <?php   } else{ ?>
                    <div class="item">
                <?php } ?>
                <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $rowslide['foto'] ?>" alt="Chania" style="width: 100% !important;height: 191px;">
                <div class="carousel-caption">
                    <a href="<?php echo base_url('CF_Kategori/kategori/'.$rowslide['id_subketegori'])?>" style="text-decoration:none;color:#fff;"> <h3><?php echo $rowslide['judul'] ?></h3></a>

                </div>
                </div>
              <?php endforeach; ?>

            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
      </div>
    </div>

    <div class="colored" sr>

    <div class="bg-black">  </div>
    </div>
    <h3>Populer</h3>
    <?php foreach ($daftar_produk_populer as $rowproduk): ?>
      <div class="col-sm-2 box">
        <div class="col-sm-12 box-header">
        <?php echo $rowproduk['nama_ketegori'] ?>
        </div>
        <div class="col-sm-12 box-body">
          <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $rowproduk['foto']?>" class="img-responsive center-block"  style="width:100%; height:51px;" alt="Image">
        </div>
        <div class="col-sm-12 box-footer">
          <div class="row">
            <div class="col-sm-12 keterangan ">
              <a href="<?php echo base_url('CF_Detail_Bibit')?>" class="color-black font-12">  <?php echo $rowproduk['nama_produk'] ?></a><br>
              <span class="text-green font-12">Harga diantar:Rp.<?php echo $rowproduk['harga_diantar'] ?></span>
              <span class="text-green font-12">Harga diambil:Rp.<?php echo $rowproduk['harga_diambilsendiri'] ?></span>
            </div>
            <div class="col-sm-12">
              <br>
              <!-- <a type="button" name="button" class="btn pull-right btn-info font-12" >Stok:<?php echo $rowproduk['jumlahbarang'] ?></a><span style="float:right">&nbsp</span> -->
              <a type="button" name="button" class="btn pull-right  btn-detail font-12" href="<?php echo base_url('CF_Detail_Bibit/detail/'.$rowproduk['id_produk'])?>">Detail</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

    <div class="colored" sr>

    <div class="bg-black">  </div>
    </div>
    <h3>Bibit</h3>
    <div class="col-sm-12">
      <form class="navbar-form navbar-right" action="<?php echo base_url("CF_search/search") ?>" method="post">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Nama Bibit" name="bibit">
    <div class="input-group-btn">
      <button class=" btn btn-info" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>

    </div>
    <?php foreach ($daftar_produk as $rowproduk1): ?>
      <div class="col-sm-2 box">
        <div class="col-sm-12 box-header">
        <?php echo $rowproduk1['nama_ketegori'] ?>
        </div>
        <div class="col-sm-12 box-body">
          <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $rowproduk1['foto']?>" class="img-responsive center-block"  style="width:100%; height:51px;" alt="Image">
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
              <a type="button" name="button" class="btn pull-right  btn-detail font-12" href="<?php echo base_url('CF_Detail_Bibit/detail/'.$rowproduk1['id_produk'])?>">Detail</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>







    <!-- <div class="col-sm-12">
      <ul class="pagination">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
    </ul>
    </div> -->
<br>
  </div>
</div><br>
<script type="text/javascript">
$('.myCarousel').carousel({
interval: 500
});
</script>
