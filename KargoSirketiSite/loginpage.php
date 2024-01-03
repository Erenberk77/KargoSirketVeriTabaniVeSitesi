<?php
session_start();
include('db.php');

if (isset($_POST['login_btn'])) {
  $kullaniciAdi = $_POST['kullaniciAdi'];
  $sifre = $_POST['sifre'];
  $query = "SELECT * FROM  tblkullanicilar WHERE kullaniciAdi='".$kullaniciAdi."' AND sifre='".$sifre."'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) 
  {
    $row = mysqli_fetch_array($result);
    $_SESSION['adSoyad'] =$row['adSoyad'];
    $_SESSION['kullaniciID'] = $row['kullaniciID'];
    header('Location: anasayfa.php');
  }
  else
  {
    $_SESSION['message'] = 'Hatalı Kullanıcı Adı veya şifre';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');
  }
}

?>
