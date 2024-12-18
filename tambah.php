<!-- berisi tampilan seluruh data dari database-->
<?php
if (!empty($_POST)) {
    $namaFile = date('YmdHis').'.jpg';
    $namaSementara = $_FILES['foto']['tmp_name'];
    $dirUpload = "img/";
    move_uploaded_file($namaSementara, $dirUpload.$namaFile);

    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $penulis = $_POST['penulis'];
    $link = $_POST['link'];
    include 'koneksi.php';
    $query = "INSERT INTO proyek_akhir VALUES ('$id','$judul','$deskripsi','$penulis','$link','$namaFile')";
    $eksekusi = mysqli_query($koneksi, $query);
    if ($eksekusi) {
        header('location: index.php');
    }
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
        <h1 class="text-light bg-dark">Tambah Materi</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formFile" class="form-label">Judul materi</label>
                <input class="form-control" type="text" name="judul" placeholder="Masukkan judul Materi" id="formFile">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Deskripsi</label>
                <input class="form-control" type="text" name="deskripsi" placeholder="Masukkan deskripsi" id="formFile">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Penulis</label>
                <input class="form-control" type="text" name="penulis" placeholder="Masukkan nama penulis" id="formFile">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Link dokumentasi</label>
                <input class="form-control" type="text" name="link" placeholder="Masukkan link dokumentasi" id="formFile">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">foto</label>
                <input class="form-control" type="file" name="foto" id="formFile">
            </div>
            <input class="btn btn-primary" type="submit" value="tambah">
        </form>
    </div>
</body>

</html>