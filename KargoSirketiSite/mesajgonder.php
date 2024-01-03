<?php

include('db.php');

if (isset($_POST['mesaj_gonder'])) {
  $baslik = $_POST['baslik'];
  $mesaj = $_POST['mesaj'];
  $query = "INSERT INTO tblmesajlar(baslik, mesaj) VALUES ('$baslik', '$mesaj')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Sorgu Başarısız.");
  }

  $_SESSION['message'] = 'Mesaj Başarıyla gönderildi.';
  $_SESSION['message_type'] = 'success';
  header('Location: anasayfa.php');

}

?>
