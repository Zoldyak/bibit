<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<section class="content-header">
     <h1>
       List Transaksi

     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Tables</a></li>
       <li class="active">Data List Transaksi</li>
     </ol>
   </section>
   <section class="content">
     <div class="row">
       <div class="col-xs-12 col-md-12">
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">List Transaksi</h3>
           </div>

           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
                   <tr>
                       <th>No</th>
                       
                       <th style="width: 100px;">Uername</th>
                       <th>Tanggal Pemesanan</th>
                       <th>Tanggal Transfer</th>
                       <th>Total Bayar</th>
                       <th>Total Transfer</th>
                       <th style="width: 100px;">foto</th>
                       <th>Status Pembayaran</th>
                       <th>Status Pengiriman</th>
                        <th>Opsi</th>
                   </tr>
               </thead>
               <tbody>
                 <?php
                 $no=0;
                 foreach ($daftar as $row1)
                 {

                   $no++;
                   ?>
                     <tr>
                         <td><?php echo  $no;?></td>
                          <td style="width: 100px;"><?php echo $row1['username'];?></td>
                         <td><a href="<?php echo base_url('admin/CA_transaksi/detail_list_transaksi/'.$row1['id_transaksi'])?>" class="text-green">  <?php echo $row1['tanggal_pemesanan'];?></a></td>
                         <td><?php echo  $row1['tanggal'];?></td>
                         <td><?php echo $row1['tottal_bayar'];?></td>
                         <td><?php echo $row1['total_transfer'];?></td>
                           <?php if (!empty($row1['bukti'])) { ?>
                         <td>
                             <a type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal<?php echo $row1['id_transaksi'];?>"  style="padding: unset !important;">

                             <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $row1['bukti'];?>" class="img-responsive" style="width:100%" alt="Image">
                           </a>
                           <div class="modal fade" id="myModal<?php echo $row1['id_transaksi'];?>" role="dialog">
                             <div class="modal-dialog  modal-lg">

                               <!-- Modal content-->
                               <div class="modal-content">
                                 <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   <h4 class="modal-title">Profil</h4>
                                 </div>
                                 <div class="modal-body">
                                     <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $row1['bukti'];?>" class="img-responsive" style="width:100%" alt="Image">

                                 <div class="modal-footer">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 </div>
                               </div>

                             </div>
                           </div>
                              </div>
                         </td>
                       <?php }
                         else {?>
                           <td>
                               tidak ada
                           </td>
                         <?php  }?>

                           <td><?php echo $row1['status_pembayaran'];?> </td>
                           <td>
                              <a href="<?php echo base_url('admin/CA_transaksi/form_update/'.$row1['id_transaksi'])?>">
                                <i class="fa fa fa-pencil fa-2x" aria-hidden="true"style="background: #f39c12;border-radius: 7px;"></i>
                              </a>
                             <?php echo $row1['Status_pengiriman'];?>

                           </td>
                           <td>
                             <a href="<?php echo base_url('admin/CA_transaksi/Pembatalan/'.$row1['id_transaksi'])?>" style="color: #e01212;"><i class="fa fa-ban" aria-hidden="true" ></i>Pembatalan</a>
                           </td>

                     </tr>
                 <?php
                 } ?>
               </tbody>
             </table>
           </div>
           </div>
       </div>
     </div>
   </section>

 <!-- /.content-wrapper -->
