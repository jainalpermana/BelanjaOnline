<?php
$konek = mysqli_connect("localhost", "root", "", "supermarket");

$barang= $_POST['barang'];
$tgl_pem = $_POST['tgl_pem'];
$penerima_pem = $_POST['penerima_pem'];
$alamat = $_POST['alamat'];
$kp = $_POST['kp'];
$kota = $_POST['kota'];
$tlp = $_POST['tlp'];
$nmrek = $_POST['nmrek'];
$norek = $_POST['norek'];
$bank = $_POST['bank'];


$input = "INSERT INTO pembelian(barang,tgl_pem,penerima_pem,alamat_pem,kp,kota,tlp,rek_pem,nmrek_pembeli,bank_pembeli,tot_pem)
VALUES ('$barang','$tgl_pem','$penerima_pem','$alamat','$kp','$kota','$tlp','$nmrek','$norek','$bank')";
$hasil = mysqli_query($konek,$input);

if ($hasil) {
	echo "TERIMAKASIH SUDAH MEMBELI  $_POST[barang]  SEMOGA ANDA PUAS JIKA ANDA INGIN BELANJA KEMBALI TEKAN TOMBOL <a href='index.php'>BELANJA</a>";
}else{
	echo"Gagal";
}

?>
