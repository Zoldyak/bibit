<?php
$namaFile = "laporan keuangan bulan:".$bulan."tahun:".$tahun.".xls";
 header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment;filename=".$namaFile."");


 header("Pragma: no-cache");

 header("Expires: 0");

 ?>
<center> <h1>Laporan keuangan Toms Agribis</h1></center>
Bulan ke:<?php echo $bulan; ?> <br>
Tahun ke:<?php echo $tahun; ?>

<table border="1px" style="margin-top:10px;">
  <thead>
<tr>
<td style="background:#1abfe3;">Tanggal</td>
<td style="background:#1abfe3;">Keterangan</td>
<td align="center" colspan="1" style="background:#1abfe3;">Pemasukan</td>

<td  align="center" colspan="2" style="background:#1abfe3;">Pengeluaran</td>

</tr>


<tr>
<td style="background:#fffc00">data tanggal</td>

<td style="background:#fffc00">Keterangan Keuagan</td>


<td style="background:#fffc00">Jumlah pemasukan</td>

<td style="background:#fffc00">Nama pegeluaran</td>
<td style="background:#fffc00">Jumlah pegeluaran </td>


</tr>
</thead>
<tbody>
  <?php $i=1;
    $jumlah1 = 0;
   $pengeluaran=0;
  foreach ($daftar1 as $row):
    $jumlah=$row['total_transfer'];
    $jumlah1 += $jumlah;
    $pengeluaran +=$row['jumlah_pengeluaran'];
    $idrekap=$row['id_rekap'];?>
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
  <?php $i++; endforeach; ?>
  <tfoot>
    <tr>
      <td colspan="2">TotaL pemasukan</td>
      <td colspan=""><?php echo $jumlah1 ?></td>
      <td colspan="">TotaL pengeluaran</td>
       <td colspan=""><?php echo $pengeluaran ?></td>
    </tr>
    <tr>
      <td colspan="1">Sisa bualan </td>
       <td colspan="4"><?php echo $jumlahsisabulanini ?></td>
    </tr>
  </tfoot>
</tbody>
</table>
