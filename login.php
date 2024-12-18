<?php
include ("koneksi.php");
if (!empty($_POST)){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM user WHERE username = '$username'";
    $eksekusi = mysqli_query($koneksi, $query);
    $user = mysqli_fetch_assoc($eksekusi);

    if($password == $user["password"] && $username == $user["username"]) {
        session_start();
        $_SESSION['username'] = $user['username'];
        header("location: index.php");
    } else {
        echo "gagal login";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <label for="">username</label> <br>
        <input type="text" name ="username"> <br>
        <label for="">password</label> <br>
        <input type="password" name = "password"> <br>
        <input type="submit" name ="btn_login" value="login">
    </form>
</body>
</html>