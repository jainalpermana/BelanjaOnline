<?php
$konek = mysqli_connect("localhost", "root", "", "supermarket");

$nama= $_POST['nama_barang'];
$jenis = $_POST['jenis_barang'];
$harga = $_POST['harga'];

$input = "INSERT INTO chart(nama_barang,jenis_barang,harga)
VALUES ('$nama','$jenis','$harga')";
$hasil = mysqli_query($konek,$input);

if ($hasil) {
	header("location:chart2.php");
}else{
	echo"Gagal";
}

?>
