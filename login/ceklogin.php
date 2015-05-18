<?php
error_reporting(0);
include_once("../database/koneksi.php");


function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

function madSafety($string) {
$string = stripslashes($string);
$string = strip_tags($string);
$string = mysql_real_escape_string($string);
return $string;
} 

$username= $_POST["kode_pengguna"];
$pass= $_POST["password"];

$login=mysql_query("SELECT * FROM pengguna WHERE email='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);


if ($ketemu > 0){
  session_start();
  


  $_SESSION["kode_pengguna"]     = $r["kode_pengguna"];
  $_SESSION["nama_pengguna"]  = $r["nama_pengguna"];
  $_SESSION["level"]     = $r["level"];

  header('location:../beranda.php');
  

}
else{
echo"<script>alert('Login Gagal Silahkan Ulangi Lagi');window.location='../index.php'</script>";

}





?>
