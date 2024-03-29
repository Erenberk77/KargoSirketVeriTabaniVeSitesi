<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP CRUD MYSQL</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <?php
    if (isset($_SESSION['adSoyad'])) {
      echo '<a class="navbar-brand" href="index.php">HOŞGELDİN ' . strtoupper($_SESSION['adSoyad']) . '</a>';
    } else {
      echo '<a class="navbar-brand" href="index.php">HOŞGELDİN</a>';
    }
    ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobile">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="mobile" class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="navbar-item">
          <a href="anasayfa.php" class="nav-link active">Anasayfa</a>
        </li>
        <li class="navbar-item">
          <a href="gidenkargo.php" class="nav-link">Gönderdiğim Kargolar</a>
        </li>
        <li class="navbar-item">
          <a href="gelenkargo.php" class="nav-link">Gelen Kargolarım</a>
        </li>
        <li class="navbar-item">
          <a href="yenikargo.php" class="nav-link">Yeni Kargo</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
