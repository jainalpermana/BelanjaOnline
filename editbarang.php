<?php

// koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "supermarket");


$kode_barang = $_GET['kode_barang'];


$hapus = "SELECT * FROM barang WHERE kode_barang = '$kode_barang'";

$hasil = mysqli_query($konek,$hapus);

$data = mysqli_fetch_array($hasil);

$foto = $data['foto'];
if ($foto == NULL) {
	$foto = "bola.jpeg";
}

?>

<h3>Edit Barang</h3>
<form method="POST" action="prosesupdate.php" enctype="multipart/form-data">
	<img src="img/<?php echo $foto;?>" width="100px">

	<input type="hidden" value="<?php echo $data['foto'];?>" name="fotolama">

	<input type="file" name="pp">
	<br>
	
	Nama_Barang : <input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>"><br>

	<input type="hidden" name="kode_barang" value="<?php echo $data['kode_barang']; ?>">

	Jenis_Barang : <input type="text" name="jenis_barang" value="<?php echo $data['jenis_barang']; ?>"><br>

	Jumlah_Barang : <input type="text" name="jumlah_barang" value="<?php echo $data['jumlah_barang']; ?>"><br>

	Harga : <input type="text" name="harga" value="<?php echo $data['harga']; ?>"><br>
<input type="submit" value="Kirim"><br>
</form>