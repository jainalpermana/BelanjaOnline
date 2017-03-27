<?php
$konek = mysqli_connect("localhost", "root", "", "supermarket");;

$kode_barang = $_GET['kode_barang'];
error_reporting(E_ALL ^ (E_NOTICE));

$perintah = "SELECT * FROM barang WHERE kode_barang = '$kode_barang'";

$hasil = mysqli_query($konek, $perintah);

$data = mysqli_fetch_array($hasil);

$foto = $data['foto'];

if ($foto == NULL) {
	$foto = "bola.jpeg";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h1>DETAIL BARANG <?php echo $data['nama_barang'];?></h1>
<a href="index.php">KEMBALI</a>
<table border="1">
	<tr>
		<td rowspan="7"><img src="img/<?php echo $foto;?>" alt="" width="150"></td>
	</tr>
	<tr>
		<td>Kode Barang</td>
		<td><?php echo $data['kode_barang'];?></td>
	</tr>
	<tr>
		<td>Nama Barang</td>
		<td><?php echo $data['nama_barang'];?></td>
	</tr>
	<tr>
		<td>Jenis Barang</td>
		<td><?php echo $data['jenis_barang'];?></td>
	</tr>
	<tr>
		<td>Jumlah Barang</td>
		<td><?php echo $data['jumlah_barang'];?></td>
	</tr>
	<tr>
		<td>Harga</td>
		<td><?php echo $data['harga'];?></td>
	</tr>

</table>
<?php

    session_start();

    if (!isset($_SESSION['userid'])) {
      echo "<h2><a href='login.php'>Jika ingin membeli silahkan login</a></h2>
      <h2><a href='register.php'>ATAU MEREGISTER</a></h2>";
    }else {

      echo "<form action='chart.php' method='post'>
      <input type='hidden' name='nama_barang' value='$data[nama_barang]'>
        <input type='hidden' name='jenis_barang' value='$data[jenis_barang]'>
        <input type='hidden' name='harga' value='$data[harga]'>
        <input type='submit'  value='ADD TO CART'>
      </form>";
      echo "<a href='buy.php?kode_barang=$data[kode_barang]'>BUY NOW</a>";
    }

    ?>
	
</body>
</html>