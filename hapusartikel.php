<?php
include "connection.php";
$id = $_GET['id'];

$query = "SELECT * FROM artikel_rentcamp WHERE idartikel='$id'";
$sql = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($sql);

// var_dump($data);
unlink("img-artikel/" . $data['foto']);

// die();

$ambildata = mysqli_query($conn, "DELETE FROM artikel_rentcamp WHERE judul='$id'") or die();
echo "<meta http-equiv='refresh' content='1;url=TampilanArtikelPemilik.php'>";
echo "<h5>Data sedang dihapus...<h5>";