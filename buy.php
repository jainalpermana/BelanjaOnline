<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BUY</title>
  </head>
  <body>
    <?php 
    $kode_barang =$_GET['kode_barang'];

    $konek = mysqli_connect("localhost", "root", "", "supermarket");

    $perintah = "SELECT * FROM barang WHERE kode_barang = '$kode_barang'";

    $hasil =  mysqli_query($konek,$perintah);

    $data = mysqli_fetch_array($hasil);

    $foto = $data['foto'];
    ?>
    <table border="1">
      <tr>
        <td rowspan="5" ><img src="img/<?php echo $foto; ?>" alt="" width="200" /></td>
      </tr>
    <tr>
      <td>Nama Barang</td>
      <td><?php echo $data['nama_barang']; ?></td>
    </tr>
      <tr>
        <td>Jenis Barang</td>
        <td><?php echo $data['jenis_barang']; ?></td>
      </tr>
     <tr> 
      <td>Jumlah Barang</td>
      <td><?php echo $data['jumlah_barang']; ?></td>
    </tr>
    <tr>
      <td>Harga</td>
      <td><?php echo $data['harga']; ?></td>
    </tr>
    
    </table>
    <form class="" action="prosesbuy.php" method="POST">
      <?php echo "<p>nama barang : $data[nama_barang]</p>";?><br>
      <input type="hidden" name="barang" value="<?php echo $data['nama_barang']; ?><">
      tanggal pembelian :<br>
      <input type="text" name="tgl_pem" value=""><br>
      penerima :<br>
      <input type="text" name="penerima_pem" value=""><br>
      alamat<br>
      <textarea name="alamat" rows="5" COLS="30"></textarea><br>
      kode post<br>
      <input type="text" name="kp" value=""><br>
      kota<br>
      <input type="text" name="kota" value=""><br>
      telephone<br>
      <input type="text" name="tlp" value=""><br>
      nama rekening
      <input type="text" name="nmrek" value=""><br>
      no rekening
      <input type="text" name="norek" value=""><br>
      Nama Bank
      <select name="bank">
      <option></option>
      <option value="Mandiri">Mandiri</option>
      <option value="BNI">BNI</option>
      <option value="BCA">BCA</option>
      <option value="Bank Jabar">Bank Jabar</option>
      <option value="Danamon">Danamon</option>
      <option value="BRI">BRI</option>S
    </select><br>
    total pembelian : <?php echo "<p>$data[harga]</p>";  ?><br>
    <input type="hidden" name="harga" value="<?php echo $data['harga']; ?><">
    <input type="submit" name="" value="beli">
    </form>
  </body>
</html>
