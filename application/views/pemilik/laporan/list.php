<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<section class="content-header">
     <h1>
       List laporan

     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Tables</a></li>
       <li class="active">Data List laporan</li>
     </ol>
   </section>
   <section class="content">
     <div class="row">
       <div class="col-xs-12 col-md-12">
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">List laporan</h3>
           </div>
           <!-- <div class="box-header text-right">
             <a href="<?php echo base_url('admin/CA_Edukasi/tambah/')?>" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</a>
           </div> -->
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
 				<tr>
 					<th>Bulan</th>
 					<th>Tahun</th>
 					<th>Pemasukan</th>
 					<th>pengeluaran</th>
 					<th>Sisa bulan ini</th>

 					<th>Opsi</th>


 				</tr>
 			</thead>
               <tbody>
                 <?php foreach ($daftar as $row):
                   $ketsisa=$row['sisabulan'];

                   if (empty($ketsisa)) {
                     $ketsisa="<a href='#' class='btn btn-danger' disabled>Belum direkap</a>";
                     $sisabulan=0;
                   }
                   else {
                     $ketsisa=$row['sisabulan'];
                      $sisabulan=$row['sisabulan'];
                   }
                   ?>
                   <tr>
                     <td><?php echo $row['bulan']; ?></td>
                     <td><?php echo $row['tahun']; ?></td>
                     <td><?php echo $row['pemasukan_bulan']; ?></td>
                     <td><?php echo $row['pengeluaran_bulan']; ?></td>
                     <td><?php echo $ketsisa ?></td>
                     <td> <a href="<?php echo base_url('pemilik/CP_Laporan/detaillaporan1/'.$row["idtransaksi"].'/'.$row["bulan"].'/'.$row["tahun"].'/'.$sisabulan)?>" class="btn btn-success">Detail/Rekap</a> </td>
                   </tr>
                  <?php endforeach; ?>
               </tbody>
             </table>
           </div>
           </div>
       </div>
     </div>
   </section>
<!-- .$row["idtransaksi"].'/'.$row["bulan"].'/'.$row["tahun"].'/'.$row["sisabulan"]) -->
 <!-- /.content-wrapper -->
