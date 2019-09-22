<?php
foreach ($pilih as $row2 ) {

  $web=$row2['alamat_web'];
  $judul=$row2['judul'];
}
 ?>
<div class="container bg-white">
  <div class="col-sm-12">
    <div class="col-sm-6">
      <div class="col-sm-12 box">
        <div class="col-sm-12 box-header">
          <?php echo $judul?>
        </div>
        <div class="col-sm-12 box-body">
          <iframe width="100%" height="315"
            src="<?php echo $web?>">
        </iframe>
        </div>
      </div>

    </div>
    <div class="col-sm-6">
        <div class="col-sm-12 box">
          <div class="col-sm-12 box-header">
            Daftar Video
          </div>
          <div class="col-sm-12 box-body">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" />
            <table id="example" class="table table-striped table-bordered dt-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>

                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=0;
                      foreach ($list as $row1)
                      {
                        $no++;
                        ?>
                          <tr>
                              <td><?php echo  $no;?></td>
                              <td> <a href="<?php echo base_url('CF_Edukasi/index/'.$row1['id_edukasi'])?>"><?php echo  $row1['judul'];?></a> </td>

                          </tr>
                      <?php
                      } ?>
                    </tbody>

                </table>

            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
            <script type="text/javascript">
            $(document).ready(function() {
              $('#example').DataTable({
                'searching'   : true
              });
            } );
            </script>
          </div>
            <div class="col-sm-12 box-footer">
            </div>
        </div>


    </div>
  </div>
</div>
