<?php
  require 'koneksi.php';
  $id_iem = $_GET['id_iem'];
  $query = "SELECT * FROM account";
  $result = mysqli_query($conn, $query);
  $account = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $account[] = $row;
  }
  
  $query = "SELECT * FROM iem WHERE id_iem = $id_iem"; ;
  $result = mysqli_query($conn, $query);
  $iem = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $iem[] = $row;
  }
  
  $query = "SELECT * FROM review";
  $result = mysqli_query($conn, $query);
  $review = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $review[] = $row;
  }
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/review.css">
    
  </head>
  <body>
    <?php require 'navbar.php';
    session_start();
    $id_user = $_SESSION['id_akun'];
    ?>
  <!-- Review Section -->
   <main class="review-section">
    <?php foreach ($iem as $earphone): ?>
      <?php if ($earphone['id_iem'] == $id_iem): ?>
        <h1 class="review-iem-title"> <?php echo $earphone['nama_iem']?> </h1>
        <img class="review-image" src=<?php echo $earphone['path']?>>
        <h3 class='review-subtitle'>REVIEW</h3>
        
        <!-- Kumpulan Review -->
          <div class="review-content">
            <?php foreach($review as $rev): ?>
              <?php if($rev['id_iem'] == $id_iem): ?>
                <div class="review-row">
                <?php foreach($account as $akun): ?>
                  <?php if($akun['id_account'] == $rev['id_akun']): ?>
                      <div class="review-author">
                        <?php 
                          echo $akun['username'];
                          if ($id_user == $rev['id_akun']){
                            echo " (You)";
                          }
                        ?>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>

                  <div class="review-text">
                    <div><?php echo $rev['review']?></div>
                      <?php if ($id_user == $rev['id_akun']): ?>
                        <div class="review-action">
                          <a href="edit_review.php?id_review=<?php echo $rev['id_review']?>">
                            <button>Edit</button>
                          </a>
                          <a href="delete_review.php?id_review=<?php echo $rev['id_review']?>" onclick="return confirm('Apakah anda yakin?')">
                            <button>Delete</button>
                          </a>
                        </div>
                      <?php endif; ?>
                </div>
              </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
      <?php endif;?>
    <?php endforeach; ?> 
  </main>

  <!-- Create Review -->
  <main class="add-review-container">
    <div class="review-create">
      <h3 class="review-subtitle">ADD REVIEW</h3>
      <form id="review-form" action="review.php?id_iem=<?php echo $id_iem?>" method="post">
        <textarea class="review-textarea" name="review" required></textarea><br>
        <button class="review-submit" type="submit">Submit</button>
      </form>
    </div>
  </main>

  <!-- Add review to SQL -->
  <?php 
    if(isset ($_POST['review'])){
      $input_user = $_SESSION['id_akun'];
      $review = $_POST['review'];
      $query = "INSERT INTO review VALUES ('',$id_iem, $input_user, '$review')";
      $result = mysqli_query($conn, $query);
      if($result){
        echo "<script>
          alert('Review berhasil ditambahkan');
          document.location.href = 'review.php?id_iem=$id_iem';
        </script>";
      } else {
        echo "<script>
          alert('Review gagal ditambahkan');
          document.location.href = 'review.php?id_iem=$id_iem';
        </script>";
      }
    }
  ?>


  <script src="/POSTTEST5/scripts/home.js"></script>
</body>
</html>
