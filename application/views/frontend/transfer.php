<?php
foreach ($detaillistlog as $row1)
{
$totalyangharusbayar=$row1['tottal_bayar'];
} ?>
<div class="container bg-white">
    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
  <div class="col-sm-12">
    <form class="form-horizontal"  action="<?php echo base_url('CF_Logtransaksi/add_transfer')?> " method="post" enctype="multipart/form-data">
      <div class="box-header">
          <h2 class="text-green">Transfer</h2>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Transfer</label>
          <div class="col-sm-10">
            <input type="number" onkeyup="myFunction1()" class="form-control" id="bayar" placeholder="nominal Transfer" name="jumlahtransfer1" value="<?php echo $totalyangharusbayar ?>" disabled>
            <input type="hidden" onkeyup="myFunction1()" class="form-control" id="bayar" placeholder="nominal Transfer" name="jumlahtransfer" value="<?php echo $totalyangharusbayar ?>" >
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="inputEmail3" placeholder="Foto" name="foto" >
          </div>
        </div>
        <div class="form-group center-block">
            <label for="inputEmail3" class="col-sm-2 control-label"></label>
          <div class="col-sm-2 ">
            <br>
            <input type="hidden" name="idtrans" class="" value="<?php echo $id; ?>">
            <input type="submit" name="" value="kirim" class="btn btn-inf0" id="myBtn">
          </div>
        </div>

      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  function myFunction1(){
    var totalyangharusbayar=<?php echo $totalyangharusbayar?>;
    var jumlah= document.getElementById("bayar").value;
    var hasil=totalyangharusbayar-jumlah;
    if (hasil > 0) {
      document.getElementById("myBtn").disabled = true;
        }
        else {
          document.getElementById("myBtn").disabled = false;
        }
  }
</script>
