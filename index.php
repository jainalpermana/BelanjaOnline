<!DOCTYPE html>
  <html>
    <head>
      <!--Import matefile:///E:/Tubes/index.php#test3rialize.css-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <link type="text/css" rel="stylesheet" href="css/materialize.min.css" >
       <link rel="stylesheet" type="text/css" href="css/style2.css">
       <link href="css/iconmaterialize.css" rel="stylesheet">
      <link rel="shortcut icon" href="img/belanja.png" />
      <title>Supermarket</title>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>

      <nav>
    <div class="nav-wrapper red darken-2">
      <a href="#" class="brand-logo"><img src="img/belanja.png" width="60px;"></a>
    </div>
  </nav>
<div>
  <img src="img/11.jpg" width="100%">
</div>


<h3>Supermarket Online</h3>
Apabila Berminat Membeli Barang Silahkan-->
<a href="login.php">Login</a>
<br>
Apabila Belum Punya Akun Silahkan-->
<a href="Register.php">Register</a>

<hr>
      <div id="test2" class="col s12">
  <form action="index.php" method="GET">
    <div class="container">
    <div class="row">
      <div class="col s12">
          <div class="input-field col s12">
          <div class="search">
          <div class="row">
            <div class="col 6">
            <i class="material-icons prefix">search</i>
            <input id="icon_prefix" type="text" class="validate" name="s" placeholder="search">
            </div>
            <div class="col s4">
            <input type="submit" class="btn red darken-2" value="Cari" name="cari">
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
  </form><!--end form-->

<hr>
<p>Kami Menyediakan Semua Barang Yang Anda Inginkan dan Bisa di Beli Dengan Cara Yang Mudah!</p>
<table border="1">

 <?php
 error_reporting(E_ALL ^ (E_NOTICE));
$batas = 5;
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
	$tampil = "SELECT * FROM barang WHERE nama_barang LIKE '%$q%' OR jenis_barang LIKE '%$q%' OR jumlah_barang LIKE '%$q%' ORDER BY nama_barang LIMIT $posisi, $batas";
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

</body>
</html>