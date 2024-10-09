<?php
    require 'koneksi.php';
    session_start();
    $id_review = $_GET['id_review'];
    $query = "SELECT * FROM review WHERE id_review = $id_review";
    $result = mysqli_query($conn, $query);
    $review = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $review[] = $row;
    }

    $query = "SELECT * FROM iem";
    $result = mysqli_query($conn, $query);
    $iem = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $iem[] = $row;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/edit.css">
</head>
<body>

<?php require 'navbar.php'; ?>


<main class="edit-main">
    <?php foreach($review as $rev): ?>
        <?php if ($rev['id_review'] == $id_review): ?>
            <div class="edit-container">
                <h1 class="edit-title">
                    EDIT REVIEW
                </h1>
                <!-- tampilkan gambar iem -->
                <?php
                    foreach ($iem as $earphone) {
                        if ($earphone['id_iem'] == $rev['id_iem']) {
                            echo "<img class='edit-image' src='" . $earphone['path'] . "'>";
                        }
                    }
                ?>
                <form id="edit-form" action="edit_review.php?id_review=<?php echo $id_review?>" method="post">
                    <textarea class="edit-text-review" name="review" required><?php echo $rev['review']; ?></textarea><br>
                    
                    <button class="submit" type="submit" style="margin-bottom: 10px">Submit</button>
                </form>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>


    <!-- Update -->
    <?php
        if (isset($_POST['review'])) {
            $review = $_POST['review'];
            $query = "UPDATE review SET review = '$review' WHERE id_review = $id_review";
            $result = mysqli_query($conn, $query);

            if ($result) {
                // Fetch the id_iem associated with the review
                $query_iem = "SELECT id_iem FROM review WHERE id_review = $id_review";
                $result_iem = mysqli_query($conn, $query_iem);
                $row_iem = mysqli_fetch_assoc($result_iem);
                $id_iem = $row_iem['id_iem'];
                echo "
                    <script>
                        alert('Berhasil mengubah review');
                        document.location.href = 'review.php?id_iem=$id_iem';
                    </script>";
            } else {
                echo "
                    <script>
                        alert('Gagal mengubah review');
                        document.location.href = 'edit_review.php?id_review=$id_review';
                    </script>";
            }
        }
    ?>
</main>


<script src="/POSTTEST5/scripts/home.js"></script>
</body>
</html>