<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<section class="content-header">
     <h1>
       List User

     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Tables</a></li>
       <li class="active">Data List User</li>
     </ol>
   </section>
   <section class="content">
     <div class="row">
       <div class="col-xs-12 col-md-12">
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">List User</h3>
           </div>
           <div class="box-header text-right">
             <a href="<?php echo base_url('pemilik/CP_User/tambah')?>" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th width="5px">No</th>
                 <th>Nama</th>
                 <th>Username</th>
                 <th>alamat</th>
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
                   <?php echo $row1['nama_lengkap'] ?>
                 </td>
                 <td>
                   <?php echo $row1['username'] ?>
                 </td>
                 <td>
                   <?php echo $row1['alamat'] ?>
                 </td>
                 <td>
                     <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $row1['foto'] ?>" style="width:20%;">
                 </td>
                 <td>
                   &nbsp&nbsp
                   <a href="<?php echo base_url('pemilik/CP_User/edit/'.$row1['username'])?>" style="color: #000;">
                     <i class="fa fa fa-pencil fa-2x" aria-hidden="true"style="background: #f39c12;border-radius: 7px;"></i>
                   </a>&nbsp&nbsp
                   <a href="<?php echo base_url('pemilik/CP_User/delete/'.$row1['username'])?>" style="color: #000;">
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
<script type="text/javascript">
$('#example1').dataTable( {
"columns": [
  { "width": "20%" },
  null,
  null,
  null,
  null
]
} );
</script>
 <!-- /.content-wrapper -->
