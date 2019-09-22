<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<section class="content-header">
     <h1>
       List Gaji

     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Tables</a></li>
       <li class="active">Data List Gaji</li>
     </ol>
   </section>
   <section class="content">
     <div class="row">
       <div class="col-xs-12 col-md-12">
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">List Gaji</h3>
           </div>

           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th width="5px">No</th>
                 <th>Nama Pengeluaran</th>
                 <th>Bulan</th>
                 <th>Tahun</th>
                 <th>Jumlah Pengeluaran</th>
                 <th>opsi</th>
               </tr>
               </thead>
               <tbody>
                 <?php
                 $no=0;
                 $jumlah=0;
                 foreach ($daftar as $row1 ) {
                   $no++;
                   $jumlah +=$row1['jumlah_pengeluaran']; ?>


               <tr>
                 <td>
                    <?php echo $no ?>

                 </td>

                 <td>

                   <?php echo $row1['nama_pengeluaran'] ?></a>
                 </td>
                 <td>

                   <?php echo $row1['bulan'] ?></a>
                 </td>

                 <td>
                   <?php echo $row1['tahun'] ?>
                 </td>
                 <td>
                   <?php echo $row1['jumlah_pengeluaran']; ?>
                 </td>
                 <td>
                   <a href="<?php echo base_url('admin/CA_Pengeluaran/update_pengeluaran/gaji/edit/'.$row1['id_transaksi'])?>" style="color: #000;">
                     <i class="fa fa fa-pencil fa-2x" aria-hidden="true"style="background: #f39c12;border-radius: 7px;"></i>
                     &nbsp&nbsp
                     <a href="<?php echo base_url('admin/CA_Pengeluaran/delete/'.$row1['id_transaksi'])?>" style="color: #000;">
                       <i class="fa fa-trash fa-2x" aria-hidden="true"style="background: #dd4b39 ;border-radius: 7px;"></i>
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
