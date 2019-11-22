<?php
ob_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'paragon';

$koneksi = mysqli_connect($host, $user, $pass, $database);
?>