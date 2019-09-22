<div class="container bg-white">
  <div class="row">
    <div class="col-sm-12">
      <h2 class="text-center"> <strong>Tentang Kami</strong> </h2>
      <?php foreach ($daftar as $row): ?>
        <div class="col-sm-4 profil">
          <a type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal<?php  echo $row['id_tentang'];?>">
            <div class="col-sm-6">
                   <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $row['foto'];?>" class="img-responsive" style="width:100%" alt="Image">
            </div>
            <div class="col-sm-6 text-left font-12">
              <div class="col-sm-12">
                <label for=""> <strong>Nama</strong> </label><br>
                  <label for=""> <strong><?php  echo $row['nama'];?></strong> </label>
                  <div class="colored">
                  <div class="bg-black"></div>
                  </div>

              </div>
              <div class="col-sm-12">
                <label for=""> <strong>Jabatan</strong> </label><br>
                  <label for=""> <strong><?php  echo $row['jabatan'];?></strong> </label>
                  <div class="colored">
                  <div class="bg-black"></div>
                  </div>
              </div>
            </div>
          </a>

        <!-- Modal -->
        <div class="modal fade" id="myModal<?php  echo $row['id_tentang'];?>" role="dialog">
        <div class="modal-dialog  modal-sm">

         <!-- Modal content-->
         <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title">Profil</h4>
           </div>
           <div class="modal-body">
                <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $row['foto'];?>" class="img-responsive" style="width:100%" alt="Image">
               <br>
               <label for=""> <strong>Nama</strong> </label><br>
                 <label for=""> <strong><?php echo $row['nama'];?></strong> </label>
                 <div class="colored">
                   <div class="bg-black"></div>
                 </div>
                 <label for=""> <strong>Jabatan</strong> </label><br>
                   <label for=""> <strong><?php echo $row['jabatan'];?></strong> </label>
                   <div class="colored">
                     <div class="bg-black"></div>
                   </div>
                   <label for=""> <strong>Alamat</strong> </label><br>
                     <label for=""> <strong><?php echo $row['alamat'];?></strong> </label>
                     <div class="colored">
                       <div class="bg-black"></div>
                     </div>
                     <label for=""> <strong>No.Hp</strong> </label><br>
                       <label for=""> <strong><?php echo $row['no_hp'];?></strong> </label>
                       <div class="colored">
                         <div class="bg-black"></div>
                       </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
         </div>

        </div>
        </div>
        </div>
        </div>
      <?php endforeach; ?>


  </div>
</div>
</div>
