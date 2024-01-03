<?php
include('db.php');

if (isset($_POST['kargoGonder'])) {
  $GonderenID = (int)$_SESSION['kullaniciID'];
  $AliciID = $_POST['AliciID'];
  $GonderiKonu = $_POST['GonderiKonu'];
  $GonderiIcerik = $_POST['GonderiIcerik'];
  $GonderiAgirlik = $_POST['GonderiAgirlik'];
  $GonderiEbatlar = $_POST['GonderiEbatlar'];
  $GonderiAciklama = $_POST['GonderiAciklama'];
  $GonderiDurum = "Gönderi Oluşturuldu";
  $Tarih = date("d-m-Y h:i");

  // Kargo ücretini hesaplamak için kullanıcı tanımlı fonksiyonu çağır
  $queryGetCost = "SELECT fn_CalculateShippingCost('$GonderiAgirlik', '$GonderiEbatlar') AS GonderiUcret";
  $resultGetCost = mysqli_query($conn, $queryGetCost);

  if (!$resultGetCost) {
    die("Sorgu Başarısız.");
  }

  $row = mysqli_fetch_assoc($resultGetCost);
  $GonderiUcret = $row['GonderiUcret'];

  // Gönderi bilgilerini veritabanına ekle
  $queryInsert = "INSERT INTO tblGonderiler(GonderenID, AliciID, GonderiKonu, GonderiIcerik, GonderiAgirlik, GonderiEbatlar, GonderiAciklama, GonderiDurum, Tarih, GonderiUcret) 
                  VALUES ('$GonderenID', '$AliciID', '$GonderiKonu', '$GonderiIcerik', '$GonderiAgirlik', '$GonderiEbatlar', '$GonderiAciklama', '$GonderiDurum', '$Tarih', '$GonderiUcret')";
  $resultInsert = mysqli_query($conn, $queryInsert);

  if (!$resultInsert) {
    die("Sorgu Başarısız.");
  }

  $_SESSION['message'] = 'Gönderi Başarıyla oluşturuldu';
  $_SESSION['message_type'] = 'success';
  header('Location: anasayfa.php');
}
?>
