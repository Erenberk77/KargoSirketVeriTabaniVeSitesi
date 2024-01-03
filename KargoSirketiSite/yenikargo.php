
<style>
.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
        width:40%;
}
</style>
<?php include("db.php"); ?>

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
        <div class="card-header">YENİ GÖNDERİ OLUŞTUR</div>
        <div class="card-body">
        <form action="kargogonder.php" method="POST">
          <div class="form-group mb-3">
            <input type="text" name="GonderiKonu" class="form-control" placeholder="Kargo Konu" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="GonderiIcerik" class="form-control" placeholder="Kargo İçeriğini Yazınız" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="GonderiAgirlik" class="form-control" placeholder="Kargo Ağırlık" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="GonderiEbatlar" class="form-control" placeholder="Kargo Ebatlar" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="AliciID" class="form-control" placeholder="Alıcı TC No" autofocus>
          </div>
          <div class="form-group mb-3">
            <textarea name="GonderiAciklama" rows="2" class="form-control" placeholder="Kargo Açıklama"></textarea>
          </div>
          <input type="submit" name="kargoGonder" class="btn btn-success btn-block" value="Kargoyu Oluştur">
        </form>
        </div>
      </div>

      
    </div>
  </div>
</main>


<?php include('includes/footer.php');?>

