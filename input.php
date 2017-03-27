<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "supermarket");
//ambil data dari form
$kode_barang = $_POST['kode_barang'];
$nb = $_POST['nama_barang'];
$lokasifile = $_FILES['upfile']['tmp_name'];
$namafile = $_FILES['upfile']['name'];
$sizefile = $_FILES['upfile']['size'];
$jenb = $_POST['jenis_barang'];
$jumb = $_POST['jumlah_barang'];
$ha = $_POST['harga'];

//tujuan
$tujuan = "img/$namafile";
//perintah upload
$upload = move_uploaded_file($lokasifile, $tujuan);

$input = "INSERT INTO barang(kode_barang,nama_barang,foto,jenis_barang,jumlah_barang,harga) VALUES ('$kode_barang','$nb','$namafile','$jenb','$jumb','$ha')";
$hasil = mysqli_query($konek,$input);
//apabila query untuk input data benar
if($hasil OR $upload)
{
	header("location:index.php");
}else{
	header("location:input.php");
}
?>