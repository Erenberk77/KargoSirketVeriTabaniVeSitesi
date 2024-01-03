<?php


include("db.php");

if (isset($_POST['register_btn'])) {
 
  $kullaniciAdi = $_POST['kullaniciAdi'];
  $sifre = $_POST['sifre'];
  $adSoyad = $_POST['adSoyad'];

  
  $query = "INSERT INTO tblkullanicilar (kullaniciAdi, sifre, adSoyad) VALUES ('$kullaniciAdi', '$sifre', '$adSoyad')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    $_SESSION['message'] = 'Kullanıcı başarıyla kaydedildi.';
    $_SESSION['message_type'] = 'success';
  } else {
    $_SESSION['message'] = 'Kullanıcı kaydı sırasında bir hata oluştu.';
    $_SESSION['message_type'] = 'danger';
  }

  header('Location: index.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kayıt Ol</title>
  <style>
    body {
      background-image: url('images/bg.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .card {
      width: 40%;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      font-size: 24px;
      text-align: center;
      margin-bottom: 20px;
    }

    .divImg {
      display: flex;
      justify-content: center;
    }

    .loginImg {
      width: 100px;
      height: 100px;
    }

    .form-label {
      font-weight: bold;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .btn {
      background-color: #28a745;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #218838;
    }

    .alert {
      margin-top: 20px;
    }

    .alert-dismissible {
      position: relative;
    }

    .alert-dismissible .btn-danger {
      position: absolute;
      top: 0;
      right: 0;
    }
    </style>
</head>

<body>

 
  <div class="card">
    <div class="card-header">YENİ KULLANICI KAYDI</div>
    <div class="divImg">
      <img class="loginImg" src="images/lgn.png" alt="Card image cap">
    </div>
    <div class="card-body">
      
      <form method="POST">
        <div class="mb-3">
          <label for="kadi" class="form-label">Kullanıcı Adı</label>
          <input type="text" class="form-control" id="kadi" name="kullaniciAdi" placeholder="Kullanıcı Adı" required>
        </div>
        <div class="mb-3">
          <label for="sifre" class="form-label">Şifre</label>
          <input type="password" class="form-control" id="sifre" name="sifre" placeholder="Şifre" required>
        </div>
        <div class="mb-3">
          <label for="adsoyad" class="form-label">Ad Soyad</label>
          <input type="text" class="form-control" id="adsoyad" name="adSoyad" placeholder="Ad Soyad" required>
        </div>
        <div class="mb-3 text-center">
          <button type="submit" name="register_btn" class="btn">KAYIT OL</button>
        </div>
      </form>
    </div>
  </div>

</body>

</html>
