<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php  $_SESSION['message']=null;  } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body text-center">
        <form action="mesajgonder.php" method="POST">
          <div class="form-group mb-3">
            <input type="text" name="baslik" class="form-control" placeholder="Mesaj Başlık" autofocus>
          </div>
          <div class="form-group mb-3">
            <textarea name="mesaj" rows="2" class="form-control" placeholder="Mesaj İçerik"></textarea>
          </div>
          <input type="submit" name="mesaj_gonder" class="btn btn-success btn-block" value="Mesaj Gönder">
        </form>
      </div>
    </div>
    <div class="col-md-8">
          <?php if (isset($_SESSION['kullaniciID'])) { ?>
      <div class="title text-center"><h5>GÖNDERDİĞİNİZ KARGOLAR</h5></div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Kargo Konu</th>
            <th>Kargo Durum</th>
            <th>Kargo Ucret</th>
            <th>Kargo Tarih</th>
            <th>İşlem</th>
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
            <td>
              <a href="gonderiduzenle.php?id=<?php echo $row['gonderiID']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="gonderisil.php?id=<?php echo $row['gonderiID']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <?php } ?>
  </div>
</main>

<?php include('includes/footer.php'); ?>
