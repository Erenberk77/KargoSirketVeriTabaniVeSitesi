<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM tblgonderiler WHERE gonderiID = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Başarısız işlem.");
  }

  $_SESSION['message'] = 'Kayıt Başarıyla silindi.';
  $_SESSION['message_type'] = 'danger';
  header('Location: anasayfa.php');
}

?>
