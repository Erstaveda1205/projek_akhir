<!-- untuk menampilkan data artikel-->
<?php
include 'koneksi.php';
// session_start();
// if (empty($_SESSION['id'])){
// //     header('location:login.php');
// // }
if (!empty($_GET) && $_GET['aksi'] == 'delete') {
    unlink("img/$_GET[foto]");
    $query = "DELETE FROM proyek_akhir WHERE foto = '$_GET[foto]'";
    $eksekusi = mysqli_query($koneksi, $query);

    if ($eksekusi) {
        header('localhost:index.php');
    } else {
        echo "hapus gagal";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kosong</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="bg-secondary">
    <div class="container mt-5">

        <h1 class="text-light bg-dark">Rangkuman Semua Materi Semester 1</h1>
        <div>
            <a href="tambah.php"><button class="btn btn-primary">Tambah Materi</button></a>
        </div>
        <p></p>

        <?php
        include 'koneksi.php';
        $query_tampil = "SELECT * FROM proyek_akhir";
        $eksekusi_query = mysqli_query($koneksi, $query_tampil);
        $proyek_akhirs = mysqli_fetch_all($eksekusi_query, MYSQLI_ASSOC);
        // $json = json_encode($proyek_akhirs);
        // echo  $json;
        if (empty($proyek_akhirs)){
            echo "data kosong";
        }
        foreach ($proyek_akhirs as $proyek_akhir) {
        ?>

            <div class="border border-warning-subtle p-3">
                <h2 class="text-center"><?= $proyek_akhir['judul'] ?></h2>
                <div class="text-center">

                    <img class="w-50 " src="img/<?= $proyek_akhir['foto'] ?>" alt="">
                </div>
                <p><?php echo substr($proyek_akhir['deskripsi'], 0, 5) . '...' ?></p>
                <p><?= $proyek_akhir['penulis'] ?></p>
                <a href="<?= $proyek_akhir['link'] ?>">link dokumentasi</a> <br>
                <a href="detail.php?id=<?= $proyek_akhir['id'] ?>">Read More</a>

            </div>
            <div>
                <a href="edit.php?foto=<?= $proyek_akhir['foto'] ?>">
                    <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
                </a>
                <a href="?aksi=delete&foto=<?= $proyek_akhir['foto'] ?>">
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </a>
                <p></p>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>