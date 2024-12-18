<?php
include 'koneksi.php';
if (!empty($_POST['edit-materi'])) { 
    $namaFile = date('YmdHis') . '.jpg';
    $namaSementara = $_FILES['foto']['tmp_name'];
    $dirUpload = "img/";
    $uploadGambar = move_uploaded_file($namaSementara, $dirUpload . $namaFile);
    if ($uploadGambar) {
        $fotolama = $_POST['fotolama'];
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $penulis = $_POST['penulis'];
        $link = $_POST['link'];

        $query = "UPDATE proyek_akhir 
        SET 
            judul = '$judul',
            deskripsi = '$deskripsi', 
            penulis = '$penulis', 
            link = '$link', 
            foto = '$namaFile' 
        WHERE foto = '$fotolama'";

        $eksekusi = mysqli_query($koneksi, $query);

        if ($eksekusi) {
            unlink($dirUpload. $fotolama);
            header('location:index.php');
        } else {
            echo "ada data yang salah";
        }
    } else {
        echo "gagal upload gambar";
    }
}
if (!empty($_GET['foto'])) {
    $query = "SELECT * FROM proyek_akhir WHERE foto = '$_GET[foto]'";
    $eksekusi = mysqli_query($koneksi, $query);
    $proyek_akhir = mysqli_fetch_assoc($eksekusi);
} else {
    header('location:index.php');
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

<body class="bg-secondary">
    <div class="container mt-3">
        <h1 class="text-light bg-dark">Edit Materi</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="fotolama" value="<?= $_GET['foto'] ?>">
            <input type="hidden" name="edit-materi" value="true">
            <label>judul Materi</label>
            <br>
            <input type="text" name="judul" placeholder="Masukkan judul Materi" value="<?= $proyek_akhir['judul'] ?>">
            <br>
            <label>Deskripsi</label>
            <br>
            <textarea name="deskripsi" cols="50" rows="16"><?= $proyek_akhir['deskripsi'] ?></textarea>
            <br>
            <label>Penulis</label>
            <br>
            <input type="text" name="penulis" placeholder="Masukkan nama Penulis" value="<?= $proyek_akhir['penulis'] ?>">
            <br>
            <label>link</label>
            <br>
            <input type="text" name="link" placeholder="Masukkan link dokumentasi" value="<?= $proyek_akhir['link'] ?>">
            <br>
            <div class="mb-3">
                <div class="text-center">
                    <img class="w-50 " src="img/<?= $proyek_akhir['foto'] ?>" alt="">
                </div>
                <label for="formFile" class="form-label">foto</label>
                <input class="form-control" type="file" name="foto" placeholder="Masukkan link dokumentasi" id="formFile">
            </div>
            <button class="btn btn-success" type="submit" name="aksi" value="Tambah">Edit</button>
        </form>
    </div>
</body>

</html>