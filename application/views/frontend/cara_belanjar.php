<div class="container bg-white">
  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-8">
        <div class="col-sm-12 border-gray margin-5px">
          <h2 class="text-left">Tentang Pembayaran</h2>
          <ol>
            <?php foreach ($Pembayaran as $rowpembayaran): ?>
                <li ><?php echo $rowpembayaran['keterangan'] ?></li>
            <?php endforeach; ?>

          </ol>

        </div>
        <div class="col-sm-12 border-gray margin-5px">
            <h2 class="text-left">Tentang Pengiriman</h2>
            <ol>
              <?php foreach ($Pengiriman as $rowpengirman): ?>
                  <li><?php echo $rowpengirman['keterangan'] ?></li>
              <?php endforeach; ?>

            </ol>
        </div>
      </div>
      <div class="col-sm-4  margin-5px">
          <img src="<?php echo $this->config->item('frontend') ?>/image/toms.png" class="img-responsive center-block" style="width:70%" alt="Image">
      </div>
    </div>
  </div>
</div>
