
<style>
.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
        width:40%;
}
</style>
<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tblgonderiler WHERE gonderiID=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $GonderiKonu =$row['gonderiKonu'];
    $GonderiIcerik =$row['gonderiIcerik'];
    $GonderiAgirlik =$row['gonderiAgirlik'];
    $GonderiEbatlar =$row['gonderiEbatlar'];
    $GonderiAciklama =$row['gonderiAciklama'];
    $GonderiDurum =$row['gonderiDurum'];
  
  }
}

if (isset($_POST['duzenle'])) {
  $gonderiID = $_GET['id'];
  $GonderiKonu = $_POST['GonderiKonu'];
  $GonderiIcerik = $_POST['GonderiIcerik'];
  $GonderiAgirlik = $_POST['GonderiAgirlik'];
  $GonderiEbatlar = $_POST['GonderiEbatlar'];
  $GonderiAciklama = $_POST['GonderiAciklama'];
  $GonderiDurum = $_POST['GonderiDurum'];

  $query = "UPDATE tblgonderiler SET GonderiKonu  = '$GonderiKonu ', GonderiIcerik  = '$GonderiIcerik',  GonderiAgirlik='$GonderiAgirlik', GonderiEbatlar=' $GonderiEbatlar', GonderiAciklama= '$GonderiAciklama' ,GonderiDurum=' $GonderiDurum' WHERE gonderiID=$gonderiID";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Gonderi başarıyla güncellendi';
  $_SESSION['message_type'] = 'warning';
  header('Location: anasayfa.php');
}

?>

<?php include('includes/header.php'); ?>

<main class="container p-4 md-3">
  <div class="text-center">
    <div>
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php  $_SESSION['message']=null; } ?>

      <!-- ADD TASK FORM -->
      <div class="card" style="width:50rem;">
        <div class="card-header">GONDERİ DÜZENLE</div>
        <div class="card-body">
        <form action="gonderiduzenle.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group mb-3">
          <label for="GonderiKonu" class="form-label">Konu</label>
            <input type="text" name="GonderiKonu" class="form-control" placeholder="Kargo Konu" value="<?php echo $GonderiKonu; ?>" >
          </div>
          <div class="form-group mb-3">
          <label for="GonderiIcerik" class="form-label">Kargo İçeriği</label>
            <input type="text" name="GonderiIcerik" class="form-control" placeholder="Kargo İçeriğini Yazınız" value="<?php echo $GonderiIcerik; ?>" >
          </div>
          <div class="form-group mb-3">
          <label for="GonderiAgirlik" class="form-label">Kargo Ağırlığı</label>
            <input type="text" name="GonderiAgirlik" class="form-control" placeholder="Kargo Ağırlık" value="<?php echo $GonderiAgirlik; ?>" >
          </div>
          <div class="form-group mb-3">
          <label for="GonderiEbatlar" class="form-label">Kargo Ebatları</label>
            <input type="text" name="GonderiEbatlar" class="form-control" placeholder="Kargo Ebatlar" value="<?php echo $GonderiEbatlar; ?>" >
          </div>
          <div class="form-group mb-3">
          <label for="GonderiDurum" class="form-label">Kargo Durumu</label>
            <input type="text" name="GonderiDurum" class="form-control" placeholder="Kargo Durum" value="<?php echo $GonderiDurum; ?>" >
          </div>
          <div class="form-group mb-3">
          <label for="GonderiAciklama" class="form-label">Açıklama</label>
            <textarea name="GonderiAciklama" rows="2" class="form-control" placeholder="Kargo Açıklama"><?php echo $GonderiAciklama; ?> </textarea>
          </div>
          <button class="btn-success" name="duzenle">
          Kargoyu Güncelle
</button>
        </form>
        </div>
      </div>

      
    </div>
  </div>
</main>


<?php include('includes/footer.php');?>

