
<div class="container bg-white">
  <h1 class="text-green">Pesan Bibit</h1>
  <div class="col-sm-8  ">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title text-green">Form Pesan Bibit</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="<?php echo base_url('CF_Cart/add')?>" method="post">
          <?php foreach ($daftar_detail_produk as $rowdetail ):
            $gambar=$rowdetail['foto'];?>

              <input type="hidden" class="form-control" name="idproduk" id="email" placeholder="" value="<?php echo $rowdetail['id_produk'] ?>" >


          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Nama Bibit:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="" id="email" placeholder="" value="<?php echo $rowdetail['nama_produk'] ?>" disabled>
              <input type="hidden" class="form-control" name="namabibit" id="email" placeholder="" value="<?php echo $rowdetail['nama_produk'] ?>">
              <input type="hidden" class="form-control" name="tersedia" id="tersedia" placeholder="" value="<?php echo $rowdetail['jumlah'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">metode</label>
            <div class="col-sm-10">

              <select id="mySelect" onchange="myFunction()" class="form-control col-sm-10" name="metode">
                <option value="0">Pilih</option>
                <option value="diambil">diambil</option>
                <option value="diantar">diantar</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="email" >Harga Bibit:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="" id="HargaBibit" placeholder="" value="" disabled>
              <input type="hidden" class="form-control" name="HargaBibit" id="HargaBibit1" placeholder="" value="" >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Jumlah Bibit:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" onkeyup="myFunction()" name="JumlahBibit" id="JumlahBibit" placeholder="" value="" >
            </div>
            <label class="control-label col-sm-10" for="email" ><p style="color:#ff0000" id="infobatas"></p></label>

          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Total Harga:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="TotalHarga" id="TotalHarga" placeholder="" value="" >
              <input type="hidden" class="form-control" name="Totaltersedia" id="Totaltersedia" placeholder="" value="" >

            </div>
          </div>
          <div class="form-group alamat" id="alamat">

          </div>

          <button type="submit" name="button" id="myBtn" class="btn btn-success center-block">Pesan</button>
            <?php endforeach; ?>
        </form>
      </div>

    </div>

  </div>
  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title text-green">Bibit</h3>
      </div>
      <div class="panel-body">
          <img src="<?php echo $this->config->item('frontend') ?>/image/<?php echo $gambar?>" class="img-responsive center-block" style="width:70%" alt="Image">
      </div>

    </div>
  </div>
</div>
<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    var jumlah= document.getElementById("JumlahBibit").value;
    var hargabibit=document.getElementById("HargaBibit1").value;
    var hasil= jumlah *hargabibit
    var jumtersedia=document.getElementById("tersedia").value;
    var hasil2=jumtersedia-jumlah
    var batas=500;
    var infobatasan=" khusus untuk metode dengan cara diantar minimal pembelian 500 Bibit";
     var formalamat         = $(".alamat");
    var removealamat =$(".remove_alamat");
    var max_fields  =2;
    var no= 1;
    if (x === 'diambil'){
      var harga="<?php echo $rowdetail['harga_diambilsendiri'] ?>"
    	 document.getElementById("HargaBibit").value =harga;
       document.getElementById("HargaBibit1").value =harga;
      //  no--;
      // $(this).parent('div').remove();
      document.getElementById("alamat").innerHTML='<div class="col-sm-10"><input type="hidden" name="alamat" value="Diambil di toko"></div>';


    }
    else if (x === 'diantar'){

      var form='<label for="" class="control-label col-sm-2">Alamat Pengiriman</label><div class="col-sm-10"><input type="text" class="form-control" name="alamat" ></div>'
      // alert(jumlah);

        var harga="<?php echo $rowdetail['harga_diantar'] ?>"
    	 document.getElementById("HargaBibit").value = harga;
        document.getElementById("HargaBibit1").value =harga;
        document.getElementById("alamat").innerHTML='<label for="" class="control-label col-sm-2">Alamat Pengiriman</label><div class="col-sm-10"><input type="text" class="form-control" name="alamat" ></div>';


    }

    document.getElementById("TotalHarga").value=hasil;
    document.getElementById("Totaltersedia").value=hasil2;
    if (hasil2 <= 0) {
  document.getElementById("myBtn").disabled = true;
    }
    else {
      document.getElementById("myBtn").disabled = false;
    }

    if (x === 'diantar') {
      if (jumlah < batas) {
        document.getElementById("infobatas").innerHTML = infobatasan;
        document.getElementById("myBtn").disabled = true;
      }

    }

}
// function myFunction1(){
//   var jumlah= document.getElementById("JumlahBibit").value;
//   var hargabibit=document.getElementById("HargaBibit1").value;
//   var hasil= jumlah *hargabibit
//   var jumtersedia=document.getElementById("tersedia").value;
//   var hasil2=jumtersedia-jumlah
//   document.getElementById("TotalHarga").value=hasil;
//   document.getElementById("Totaltersedia").value=hasil2;
//   if (hasil2 <= 0) {
// document.getElementById("myBtn").disabled = true;
//   }
//   else {
//     document.getElementById("myBtn").disabled = false;
//   }
// }
</script>
