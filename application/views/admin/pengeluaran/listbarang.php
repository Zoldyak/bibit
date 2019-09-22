<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<div class="container bg-white">
  <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<br>
<section class="content-header">
     <h1>
       List Pengeluaran Gaji

     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Tables</a></li>
       <li class="active">Data List Pengeluaran Gaji</li>
     </ol>
   </section>
   <section class="content">
     <div class="row">
       <div class="col-xs-12 col-md-12">
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">List Pengeluaran Gaji</h3>
           </div>
           <div class="box-header text-right">
             <a href="<?php echo base_url('admin/CA_Pengeluaran/add_pengeluaran/barang/tambah/')?>" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th width="5px">No</th>
                 <th>Bulan</th>
                 <th>Tahun</th>

                 <th>Jumlah Pengeluaran</th>
               </tr>
               </thead>
               <tbody>
                 <?php
                 $no=0;
                 $jumlah=0;
                 foreach ($daftar as $row1 ) {
                   $no++;
                   $jumlah +=$row1['jumlahpengeluaran']; ?>


               <tr>
                 <td>
                    <?php echo $no ?>

                 </td>
                 <td>
                    <a href="<?php echo base_url('admin/CA_Pengeluaran/detailbarang/'.$row1['bulan'].'/'.$row1['tahun'])?>">
                   <?php echo $row1['bulan'] ?></a>
                 </td>
                 <td>
                   <?php echo $row1['tahun'] ?>
                 </td>
                 <td>
                   <?php echo $jumlah ?>
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
