<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<section class="content-header">
     <h1>
       List Sub kategori

     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Tables</a></li>
       <li class="active">Data List Sub kategori</li>
     </ol>
   </section>
   <section class="content">
     <div class="row">
       <div class="col-xs-12 col-md-12">
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">List Sub kategori</h3>
           </div>
           <div class="box-header text-right">
             <a href="<?php echo base_url('admin/CA_Subkat/tambah/')?>" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th width="5px">No</th>
                 <th>Nama Sub kategori</th>
                  <th>Nama kategori</th>
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
                   <?php echo $row1['nama_subketegori'] ?>
                 </td>
                 <td>
                   <?php echo $row1['nama_ketegori'] ?>
                 </td>
                 <td>
                   &nbsp&nbsp
                   <a href="<?php echo base_url('admin/CA_Subkat/edit/'.$row1['id_subketegori'])?>" style="color: #000;">
                     <i class="fa fa fa-pencil fa-2x" aria-hidden="true"style="background: #f39c12;border-radius: 7px;"></i>
                   </a>&nbsp&nbsp
                   <a href="<?php echo base_url('admin/CA_Subkat/delete/'.$row1['id_subketegori'])?>" style="color: #000;">
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
