<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="index.php"><h1>BELANJA LAGI</h1></a>

    <form class="" action="chart2.php" method="GET">
      <input type="text" name="s">
      <input type="submit" name="cari" value="CARI">

    </form>

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
  $tampil = "SELECT * FROM barang WHERE nama_barang LIKE '%$q%' OR jenis_barang LIKE '%$q%' OR harga LIKE '%$q%' ORDER BY nama_barang LIMIT $posisi, $batas";
}else{
  //query menampilkan data
  $tampil = "SELECT * FROM barang LIMIT $posisi, $batas";
}


$hasil = mysqli_query($konek,$tampil);

$jmlhasil = mysqli_num_rows($hasil);

?>
    	<table border="1" align="center">
    		<tr>
    			<th>nama barang</th>
    			<th>jenis barang</th>
    			<th>harga</th>
    			<th>AKSI</th>
    		</tr>


    <?php

    if ($jmlhasil < 1) {
    	echo "<tr>";
    	echo "<td colspan='5'>Data yang yang ada cari tidak ada</td>";
    	echo "</tr>";
    }else{

    $id_chart = $posisi +1;

    //tampil nama, email dan pesan,While = pemecah data agar jadi aray
    while($data=mysqli_fetch_array($hasil)){
    	echo "<tr>";
    	echo "<td> $data[nama_barang] </td>";
    	echo "<td> $data[jenis_barang] </td>";
    	echo "<td> $data[harga] </td>" ;
    	echo "<td><a href='deletcart.php?id_chart=$data[id_chart]'>Delete</a>";
    	echo "</tr>";
    	$id_chart++;
    }
    }
    ?>

    </table>


    <?php
    $tampil2 = "SELECT * FROM chart";
    $hasil2 = mysqli_query($konek,$tampil2);
    $jmldata = mysqli_num_rows($hasil2);
    $jmlhalaman = ceil($jmldata / $batas);

    echo "Jumlah data : $jmldata <br>";

    for ($i=1; $i <= $jmlhalaman; $i++){
    	if ($i != $halaman) {
    		echo "<a href=$_SERVER[PHP_SELF]?halaman=$i>$i</a>";
    	}else{
    		echo "<b> $i  | </b>";
    	}

    }
    ?>

  </body>
</html>
