<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Tiket Konser</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include('class/Database.php');
include('class/Tiket.php');
?>
<h1>Aplikasi Tiket Konser</h1>
<hr/>
<nav>
    <ul>
<li><a href="index.php">Home</a>
<li><a href="index.php?file=tiket&aksi=tampil">Data Tiket</a>
<li><a href="index.php?file=tiket&aksi=tambah">Tambah Data Tiket</a>
</ul>
</nav>
<hr/>
<?php
if(isset($_GET['file'])){
include($_GET['file'].'.php');
} else {
echo '<h1 align="center">Selamat Datang</h1>';
}
?>
</body>
</html>