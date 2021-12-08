<?php
include 'koneksi.php';
?>
<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get">
<label>Cari :</label>
<input type="text" name="cari">
<input type="submit" value="Cari">
</form>
<?php
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
<table border="1">
<tr>
<th>No</th>
<th>NIM</th>
<th>Nama</th>
<th>Kode MK</th>
<th>Nama Matkul</th>
<th>Nilai</th>
</tr>
<?php
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
$sql="SELECT khs.NIM, mahasiswa.nama, khs.kodeMK, khs.nama_matakuliah, khs.Nilai FROM khs INNER JOIN mahasiswa ON khs.NIM = mahasiswa.nim WHERE khs.NIM like '%".$cari."%'";
$tampil = mysqli_query($con,$sql);
}else{
$sql="SELECT khs.NIM, mahasiswa.nama, khs.kodeMK, khs.nama_matakuliah, khs.Nilai FROM khs INNER JOIN mahasiswa ON khs.NIM = mahasiswa.nim ";
$tampil = mysqli_query($con,$sql);
}
$no = 1;
while($r = mysqli_fetch_array($tampil)){
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $r['NIM']; ?></td>
<td><?php echo $r['nama']; ?></td>
<td><?php echo $r['kodeMK']; ?></td>
<td><?php echo $r['nama_matakuliah']; ?></td>
<td><?php echo $r['Nilai']; ?></td>
</tr>
<?php } ?>
</table>