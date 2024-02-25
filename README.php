# Website-Dokumentasi-Foto-
<?php
$id = $_GET['id'];

// Koneksi ke database
$host = 'localhost';
$user = 'username';
$password = 'password';
$dbname = 'database';

$conn = mysqli_connect($host, $user, $password $dbname);

// Ambil data foto berdasarkan id
$query = "SELECT f.*, K.name AS Kategori FROM dokumen_foto f JOIN dokumen_kategori K ON f.id_kategori = k.id_kategori WHERE f.id = $id";
$result = mysqli_
