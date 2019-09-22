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
           <div class="box-header text-right">
             <?php if (!empty($jumlahsisabulanini)||$jumlahsisabulanini != 0) { ?>
              <a href="<?php echo base_url('admin/CA_Laporan/exel/'.$bulan.'/'.$tahun.'/'.$jumlahsisabulanini)?>" class="btn btn-info"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Print</a>
            <?php } ?>

           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
				 <tr>
				 <td  >Tanggal</td>
				  <td  >Keterangan</td>
					<td align="center" colspan="1">pemasukan</td>

					<td  align="center" colspan="2">pengeluaran</td>

				</tr>


				<tr>
				<td>data tanggal</td>

				<td>Keterangan Keuagan</td>


				<td>Jumlah pemasukan</td>

				<td >Nama pegeluaran</td>
				<td>Jumlah pegeluaran </td>


				</tr>
				</thead>
               <tbody>
                 <?php

                 $jumlah1 = 0;
                 $pengeluaran=0;?>
                 <?php foreach ($daftar1 as $row):
                   $jumlah=$row['total_transfer'];
                   $jumlah1 += $jumlah;
                   $pengeluaran +=$row['jumlah_pengeluaran'];
                   $idrekap=$row['id_rekap'];

                   ?>
                   <tr>
                     <td>
                       <?php echo $row['tanggal']; ?>
                     </td>
                     <td>
                       <?php if ($row['keterangan']==='Pembelian Bibit') {
                         echo $row['keterangan']." oleh ".$row['username'];
                       }
                       else {
                          echo $row['keterangan'];
                       }
                      ?>
                     </td>
                     <td>
                       <?php
                       if (empty($row['total_transfer'])) {
                         echo "-";
                       }
                       else{
                         echo $row['total_transfer'];
                       }
                       ?>
                     </td>
                     <td>
                       <?php
                        if (empty($row['nama_pengeluaran'])) {
                          echo "-";
                        }
                        else {
                          echo $row['nama_pengeluaran'];
                        }
                        ?>
                     </td>
                     <td>
                       <?php
                       if (empty($row['jumlah_pengeluaran'])) {
                        echo "-";
                       }
                       else {
                          echo $row['jumlah_pengeluaran'];
                       }
                       ?>
                     </td>
                   </tr>
                 <?php endforeach; ?>
                 <tr>
                   <td colspan="2">TotaL pemasukan</td>
                   <td colspan=""><?php echo $jumlah1 ?></td>
                   <td colspan="">TotaL pengeluaran</td>
                    <td colspan=""><?php echo $pengeluaran ?></td>
                 </tr>
                 <tr>
                   <?php

                   if (empty($idrekap)) {?>
                     <td colspan="5"> <a href="<?php echo base_url('admin/CA_Laporan/laporan/'.$row["bulan"].'/'.$row["tahun"].'/'.$jumlah1.'/'.$pengeluaran)?>" class="btn btn-success" style="width: 100%;">Rekap</a> </td>
                   <?php   } else{ ?>
                     <td colspan="1">Sisa bualan </td>
                      <td colspan="4"><?php echo $jumlahsisabulanini ?></td>
                  <?php }?>

                 </tr>
               </tbody>
             </table>
           </div>
           </div>
       </div>
     </div>
   </section>

 <!-- /.content-wrapper -->
