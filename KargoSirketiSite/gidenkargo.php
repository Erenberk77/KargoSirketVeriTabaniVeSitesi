
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
      <div class="card" style="width:90%">
        <div class="card-header">GÖNDERDİĞİNİZ KARGOLAR</div>
        <div class="card-body">
        <?php if (isset($_SESSION['kullaniciID'])) { ?>
      <div class="title text-center"><h5>GİDEN KARGOLAR</h5></div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Kargo Konu</th>
            <th>Kargo Durum</th>
            <th>Kargo Ucret</th>
            <th>Kargo Tarih</th>
            <th>Kargo Ağırlık</th>
            <th>Kargo Ebatlar</th>
            <th>Kargo Açıklama</th>
            <th>Alıcı TC No</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM tblgonderiler WHERE gonderenID=".$_SESSION['kullaniciID']."";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['gonderiKonu']; ?></td>
            <td><?php echo $row['gonderiDurum']; ?></td>
            <td><?php echo $row['gonderiUcret']; ?></td>
            <td><?php echo $row['tarih']; ?></td>
            <td><?php echo $row['gonderiAgirlik']; ?></td>
            <td><?php echo $row['gonderiEbatlar']; ?></td>
            <td><?php echo $row['gonderiAciklama']; ?></td>
            <td><?php echo $row['aliciID']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <?php } ?>
        </div>
      </div>

      
    </div>
  </div>
</main>


<?php include('includes/footer.php');?>

