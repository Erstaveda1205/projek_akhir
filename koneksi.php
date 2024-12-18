<?php
// mengkoneksikan ke database
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'portal';

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi) {
    die('koneksi gagal'.mysqli_connect_error());
}
?>