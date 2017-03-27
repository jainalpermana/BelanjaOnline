<?php

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "supermarket");

$kode_barang = $_GET ['kode_barang'];

echo $kode_barang;

$carifoto = "SELECT foto FROM barang WHERE kode_barang = '$kode_barang'";


$hapus = "DELETE  FROM barang WHERE kode_barang = '$kode_barang' ";
//mencari foto
$hasilfoto = mysqli_query($konek,$carifoto);
$foto = mysqli_fetch_array($hasilfoto);

//menghapus foto
unlink("img/$foto[foto]");

$hasil = mysqli_query($konek,$hapus);

if ($hasil) {
	header ("location:index.php");
}else{
	header ("location:input.php");
}

?>