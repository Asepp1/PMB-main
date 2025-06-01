<?php
session_start();

$dbserver   = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbdatabase = 'pmb';

$conn = mysqli_connect($dbserver, $dbusername, $dbpassword, $dbdatabase) or die('Koneksi gagal' . mysqli_connect_error());