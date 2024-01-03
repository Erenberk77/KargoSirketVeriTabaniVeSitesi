
<style>
body {
  background-image: url('images/bg.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
        width:40%;
}
.loginImg{
 width:100px;
 height: 100px;
}
.divImg{
  display: flex;
  justify-content: center;
}
</style>
<?php include("db.php"); ?>
<?php $_SESSION['kullaniciAdi']=""?>
<?php include('includes/headerindex.php'); ?>

<main class="container p-4">
 
      <div class="card">
        <div class="card-header text-center">KULLANICI GİRİŞİ</div>
        <div class="divImg">
        <img class="loginImg" src="images/lgn.png" alt="Card image cap">
      </div>
  <div class="card-body">
  <form action="loginpage.php" method="POST">
          <div class="mb-3">
          <label for="kadi" class="form-label">Kullanıcı Adı</label>
          <input type="text" class="form-control" id="kadi" name="kullaniciAdi" placeholder="Kullanıcı Adı">
        </div>
        <div class="mb-3">
          <label for="sifre" class="form-label">Şifre</label>
          <input type="password" class="form-control" id="sifre" name="sifre" placeholder="Şifre">
        </div>
        <div class="mb-3 text-center">
        <button type="submit" name="login_btn" class="btn btn-warning">GİRİŞ YAP</button>
        </div>
      </form>
  </div>
</div> 
      <!-- MESSAGES -->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show card" role="alert">
      <div class="card-body text-center">
        <?= $_SESSION['message']?>
        <div class="text-center"><button type="button" class="btn btn-danger" data-dismiss="alert" aria-label="Close">Tamam
        </button></div>
        <?php $_SESSION['message']=null; } ?>
      </div>
      </div>  
</main>

<?php include('includes/footer.php'); ?>
