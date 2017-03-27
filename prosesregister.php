<?php
$konek = mysqli_connect("localhost", "root", "", "supermarket");

$userid = $_GET['userid'];
$psw = $_GET['psw'];
$level = $_GET['level'];

$input = "INSERT INTO tabeluser(userid,password,level)
VALUES ('$userid','$psw','$level')";
$hasil = mysqli_query($konek,$input);

if ($hasil) {
	header("location:login.php");
}else{
	echo"Astagfirullah";
}

?>
