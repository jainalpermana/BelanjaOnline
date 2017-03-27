<?php
session_start();

//cek user login
if (!isset($_SESSION['userid'])) {
	header("location:index.php");
	
}

//cekleveladmin
if ($_SESSION['level'] != "admin") {
	die("ANDA BUKAN ADMIN");
}

?>

<?php
error_reporting(E_ALL ^ (E_NOTICE));
$batas = 20;
$halaman = $_GET['halaman'];

if (empty($halaman)) {
	$posisi = 0;
	$halaman = 1;
}else{
	$posisi = ($halaman - 1) * $batas;
}

$konek = mysqli_connect("localhost", "root", "", "supermarket");

if (isset($_GET['cari'])) {
	$q = $_GET['s'];
	$tampil = "SELECT * FROM barang WHERE nama_barang LIKE '%$q%' OR jenis_barang LIKE '%$q%' OR jumlah_barang LIKE '%$q%' OR harga LIKE '%$q%' ORDER BY nama_barang LIMIT $posisi, $batas";
}else{
	//query menampilkan data
	$tampil = "SELECT * FROM barang LIMIT $posisi, $batas";
}


$hasil = mysqli_query($konek,$tampil);

$jmlhasil = mysqli_num_rows($hasil);

?>


<h3>Data Supermarket Online</h3>
<hr>
<form action="index.php" method="GET">
	<input type="text" name="s">
	<input type="submit" value="CARI" name="cari">

</form>
<hr>
<a href="inputan.php">Create Barang</a>
<table border="1">
	<tr>
		<th>kode barang</th>
		<th>nama barang</th>
		<th>jenis barang</th>
		<th>jumlah barang</th>
		<th>harga</th>
		<th>aksi</th>
	</tr>
<?php

if ($jmlhasil < 1) {
	echo "<tr>";
	echo "<td colspan='5'>data yang ada cari tidak ada</td>";
	echo "</tr>";
}else{
	//penomoran
	$kode_barang = $posisi + 1;

	//tampil nama,jenis,jumlah,tanggal,keterangan barang
	while($data=mysqli_fetch_array($hasil)){
		echo "<tr>";
		echo "<td>$data[kode_barang]</td>";
		echo "<td>$data[nama_barang]</td>";;
		echo "<td>$data[jenis_barang]</td>";
		echo "<td>$data[jumlah_barang]</td>";
		echo "<td>$data[harga]</td>";
		echo "<td><a href='inputan.php?kode_barang=$data[kode_barang]'>create</a> |
				  <a href='hapusbarang.php?kode_barang=$data[kode_barang]'>hapus</a> |
				  <a href='editbarang.php?kode_barang=$data[kode_barang]'>edit</a> |
				  <a href='detailbarang.php?kode_barang=$data[kode_barang]'>detail</a></td>";
		echo "</tr>";
		$data++;

	}

}


?>
</table>

<?php
//untuk pagging
$tampil2 = "SELECT * FROM barang";
$hasil2 = mysqli_query($konek, $tampil2);
$jmldata = mysqli_num_rows($hasil2);
$jmlhalaman = ceil($jmldata / $batas);

echo " jumlah data : $jmldata <br>";

for ($i=1; $i <= $jmlhalaman; $i++) { 
	if ($i != $halaman) {
		echo "<a href=$_SERVER[PHP_SELF]?halaman=$i> $i </a>";
	}else{
		echo " <b> $i </b>";
	}
}

?>


<a href="log.php?op=out">LOG OUT</a>


</body>
</html>