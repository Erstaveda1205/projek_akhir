<?php
include 'koneksi.php';
if (!empty($_GET['id'])) {
    $query = "SELECT * FROM proyek_akhir WHERE id = '$_GET[id]'";
    $eksekusi = mysqli_query($koneksi, $query);
    $proyek_akhir = mysqli_fetch_assoc($eksekusi);
} else {
    header('location:tampil.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="bg-info">
    <div class="container mt-3">
    <?php
    include 'koneksi.php';
    $query_tampil = "SELECT * FROM proyek_akhir WHERE id = '$_GET[id]'";
    $eksekusi_query = mysqli_query($koneksi, $query_tampil);
    $proyek_akhirs = mysqli_fetch_all($eksekusi_query, MYSQLI_ASSOC);
    foreach ($proyek_akhirs as $proyek_akhir) {
    ?>

        <div>
            <h2><?= $proyek_akhir['judul'] ?></h2>
            <p><?php echo $proyek_akhir['deskripsi'] ?></p>
            <p><?= $proyek_akhir['penulis'] ?></p>
            <a href="<?= $proyek_akhir['link'] ?>">link dokumentasi</a>
        </div>
        <div>
            <a href="edit.php?id=<?= $proyek_akhir['id'] ?>">
                <button><i class="fa fa-edit"></i></button>
            </a>
            <a href="?aksi=delete&id=<?= $proyek_akhir['id'] ?>">
                <button><i class="fa fa-trash"></i></button>
            </a>
        </div>
    <?php
    }
    ?>
    </div>
</body>

</html>