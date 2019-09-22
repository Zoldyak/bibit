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
                       <th>Nama Barang</th>
                       <th>Alamat Pengiriman </th>
                       <th>Jumlah Barang</th>
                       <th>Metode</th>
                       <th>Harga Barang</th>
                       <th>Total Harga</th>

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
                         <td><?php echo $row1['nama_barang'];?></td>
                         <td><?php echo $row1['alamat_pengiriman'];?></td>
                         <td><?php echo $row1['Jumlah_barang'];?></td>
                         <td><?php echo $row1['metode'];?></td>
                         <td><?php echo $row1['harga_barang'];?></td>
                         <td><?php echo $row1['jumlah_harga'];?></td>


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
