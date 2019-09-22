<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<section class="content-header">
     <h1>
       List Tentang

     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Tables</a></li>
       <li class="active">Data List Tentang</li>
     </ol>
   </section>
   <section class="content">
     <div class="row">
       <div class="col-xs-12 col-md-12">
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">List Tentang</h3>
           </div>
           <div class="box-header text-right">
             <a href="<?php echo base_url('admin/CA_tentang/tambah/')?>" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th width="5px">No</th>
                 <th>Nama</th>
                 <th>Jabatan</th>
                 <th>Alamat</th>
                 <th>No Hp</th>
                 <th>Foto</th>
                 <th>Opsi</th>

               </tr>
               </thead>
               <tbody>
                 <?php
                 $no=0;
                 foreach ($daftar as $row1 ) {
                   $no++; ?>


               <tr>
                 <td>
                    <?php echo $no ?>

                 </td>
                 <td>
                   <?php echo $row1['nama'] ?>
                 </td>
                 <td>
                   <?php echo $row1['jabatan'] ?>
                 </td>
                 <td>
                   <?php echo $row1['alamat'] ?>
                 </td>
                 <td>
                   <?php echo $row1['no_hp'] ?>
                 </td>
                 <td>
                     <a type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal<?php echo $row1['id_tentang'];?>"  style="padding: unset !important;">

                     <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $row1['foto'];?>" class="img-responsive" style="width:50%" alt="Image">
                   </a>
                   <div class="modal fade" id="myModal<?php echo $row1['id_tentang'];?>" role="dialog">
                     <div class="modal-dialog  modal-lg">

                       <!-- Modal content-->
                       <div class="modal-content">
                         <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">Profil</h4>
                         </div>
                         <div class="modal-body">
                             <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $row1['foto'];?>" class="img-responsive" style="width:100%" alt="Image">

                         <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
                       </div>

                     </div>
                   </div>
                      </div>
                 </td>
                 <td>
                   &nbsp&nbsp
                   <a href="<?php echo base_url('admin/CA_Tentang/edit/'.$row1['id_tentang'])?>" style="color: #000;">
                     <i class="fa fa fa-pencil fa-2x" aria-hidden="true"style="background: #f39c12;border-radius: 7px;"></i>
                   </a>&nbsp&nbsp
                   <a href="<?php echo base_url('admin/CA_Tentang/delete/'.$row1['id_tentang'])?>" style="color: #000;">
                     <i class="fa fa-trash fa-2x" aria-hidden="true"style="background: #dd4b39 ;border-radius: 7px;"></i>
                   </a>
                 </td>
               </tr>
             <?php } ?>
               </tbody>
             </table>
           </div>
           </div>
       </div>
     </div>
   </section>

 <!-- /.content-wrapper -->
