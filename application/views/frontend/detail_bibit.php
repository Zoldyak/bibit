<style media="screen">
@media only screen and (min-width: 769px) {
    .gambar1 {
        display: block !important;
      }
      .gambar2 {
          display: none !important;
        }
    }
    @media only screen and (max-width: 768px) {
        .gambar2 {
            display: block !important;
          }
        .gambar1 {
              display: none !important;
            }
        }
</style>
<script src="<?php echo $this->config->item('frontend') ?>/js/jquery.elevatezoom.js"></script>
<?php foreach ($daftar_detail_produk as $detailrow): ?>
  <div class="container bg-white">
    <h1 class="text-green">Detail Bibit <?php echo $detailrow['nama_produk'] ?></h1>
    <div class="col-sm-4 border-gray box-detail">
      <div class="row">
        <div class="col-sm-12">
          <br>  <a data-toggle="modal" data-target="#myModal<?php  echo $detailrow['id_produk'];?>">
          <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $detailrow['foto'] ?>" id="zoom_021" data-zoom-image="<?php echo $this->config->item('frontend') ?>/image/tanaman2.png" class="img-responsive gambar1" style="width:40%" alt="Image">
        </a>
        </div>

        <div class="col-sm-12">
          <a type="button" name="button" class="btn pull-right btn-info btn-sm">Stok:<?php echo $detailrow['jumlah'] ?> Bibit</a>
          <br> <br>
          <a href="<?php echo base_url('CF_Beli_bibit/form_pemesanan/'.$detailrow['id_produk'])?>"type="button" name="button" class="btn pull-right  btn-detail btn-sm">Beli</a>
          <p>&nbsp</p><p>&nbsp</p>
        </div>
      </div>
    </div>
    <div class="col-sm-7 border-gray box-detail text-green">
      <span class="font-20">Keterangan Bibit <?php echo $detailrow['nama_produk'] ?><span>
        <br>
        <p class="font-12" style="color:#000;"><?php echo $detailrow['Keterangan'] ?></p>
    </div>
  </div>

  <div class="modal fade" id="myModal<?php   echo $detailrow['id_produk']?>" role="dialog">
  <div class="modal-dialog  modal-lg">

   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       <h4 class="modal-title"><?php echo $detailrow['nama_produk'] ?></h4>
     </div>
     <div class="modal-body">
          <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $detailrow['foto'];?>" class="img-responsive" style="width:100%" alt="Image">
         <br>

     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
   </div>

  </div>
  </div>
  </div>
<?php endforeach; ?>


<!-- <script type="text/javascript">
$("#img_01").elevateZoom();
</script> -->
