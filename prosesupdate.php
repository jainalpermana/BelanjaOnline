<?php

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "supermarket");
//ambil variabel yang dikirim dari form
$kode_barang = $_POST['kode_barang'];

$lokasifoto = $_FILES['pp']['tmp_name'];
$namafoto = $_FILES['pp']['name'];
$fotolama = $_POST['fotolama'];

$nb = $_POST['nama_barang'];
$jenb = $_POST['jenis_barang'];
$jumb = $_POST['jumlah_barang'];
$harga = $_POST ['harga'];

if ($namafoto != NULL) {
	//hapus foto
	unlink("img/$fotolama");
	//upload foto baru
	$tujuan = "img/$namafoto";
	move_uploaded_file($lokasifoto, $tujuan);

	$foto = $namafoto;
}else{
	$foto = $fotolama;
}

$update = "UPDATE barang SET nama_barang= '$nb',foto ='$foto',jenis_barang='$jenb', jumlah_barang='$jumb',harga = '$harga'
	WHERE kode_barang='$kode_barang'";

$hasil = mysqli_query($konek,$update);

if($hasil){
header("location:index.php");
}else{
echo "Update data barang gagal";
}

?>