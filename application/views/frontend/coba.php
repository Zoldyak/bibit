
<input type="submit" name="" value="1" id="aku" onclick="loaddata()">
<div class="" id="display_info">

</div>
<p>Name: <input type="text" name="user" id="bismilah"></p>

<button>Set the value of the input field</button>
<?php
$n=3;
for ($i=0; $i <= $n ; $i++) { ?>


<input type="submit" name="" value="<?php echo "aku".$i ?>" id="aku<?php echo $i ?>" >
<br>



<script>
$(document).ready(function(){
$("#aku<?php echo $i ?>").click(function(){
    $("#bismilah").val("<?php echo "aku".$i ?>");


});

});
</script>
<!-- <script>
$(document).ready(function(){
    $("#aku<?php echo $i ?>").click(function(){
        $("#bismilah").val("<?php echo "aku".$i ?>");
    });
});
</script> -->
<?php } ?>
<br>
<?php
$l=3;
  for ($i=1; $i <= $l ; $i++) {
?>
<button id="button<?php echo $i ?>"> saya
<input type="text" name="" value="saya<?php echo $i ?>" id="saya<?php echo $i ?>" ></button>
<script type="text/javascript">


$(document).ready(function(){
$("#button<?php echo $i ?>").click(function(){
    var name=$("#saya<?php echo $i ?>").val();

    if(name)
    {

    $.ajax({
            type: 'post',
            url: '<?php echo base_url("coba/load_data")?>',
            data: {
            user_name:name,
            },
            success: function (response) {
            // We get the element having id of display_info and put the response inside it
            $( '#display_info' ).html(response);
            }
           });
    }
    else
    {
    $( '#display_info' ).html("Please Enter Some Words");
    }


  });

  });
</script>
<?php }
?>











<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" />
<table id="example" class="table table-striped table-bordered dt-responsive" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>

        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
    <h1>Table ke 2</h1>
    <table id="example1" class="table table-striped table-bordered dt-responsive" style="width:100%">
            <thead>
              <tr>
                <td  >Tanggal</td>
                 <td  >Keterangan</td>
                 <td align="center" colspan="2">pemasukan</td>

                 <td  align="center" colspan="3">pengeluaran</td>

              </tr>
              <tr>
          				<td>data tanggal</td>

          				<td>Keterangan Keuagan</td>

          				<td >NAMA SISWA</td>
          				<td>Biaya pemasukan</td>

          				<td >Nama Barang atau Nama Dosen</td>
          				<td>Jumlah Barang atau jumlah mengajar </td>
          				<td>Biaya pengeluaran</td>

        			</tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>

            </tfoot>
        </table>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#example').DataTable();
} );

$(document).ready(function() {
  $('#example1').DataTable();
} );
</script>
