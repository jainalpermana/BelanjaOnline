<?php
session_start();

//cek user login
if (!isset($_SESSION['userid'])) {
	header("location:index.php");
	
}

//cekleveladmin
if ($_SESSION['level'] != "user") {
	die("ANDA BUKAN USER");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Anda</title>
</head>
<body>
<h1>Selamat Datang User!</h1>

<?php echo $_SESSION['userid']; ?>


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
	$tampil = "SELECT * FROM barang WHERE nama_barang LIKE '%$q%' OR jenis_barang LIKE '%$q%' OR jumlah_barang";
}else{
	//query menampilkan data
	$tampil = "SELECT * FROM barang LIMIT $posisi, $batas";
}


$hasil = mysqli_query($konek,$tampil);

$jmlhasil = mysqli_num_rows($hasil);

    if ($jmlhasil < 1) {
      echo "<tr>";
      echo "<td colspan='5'>Data yang yang ada cari tidak ada</td>";
      echo "</tr>";
    }else{
        $kode_barang = $posisi +1;
     while($data = mysqli_fetch_array($hasil)){
       $foto = $data['foto'];
        echo "<h2>$data[kode_barang].$data[nama_barang]</h2>";
       echo "<a href='' class='image full'><img src='img/$foto' width='200' /></a><br>";
       echo "<a href='detailbarang.php?kode_barang=$data[kode_barang]'>READ MORE</a><br>";
        $kode_barang++;
      }
      }
      $tampil2 = "SELECT * FROM barang";
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

<a href="log.php?op=out">LOG OUT</a>


</body>
</html>