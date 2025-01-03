<?php
include "connection.php";
$id = $_GET['namabrg'];

$query = "SELECT * FROM obatan WHERE nama='$id'";
$sql = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($sql);
// var_dump($result);
unlink("img/" . $result['foto']);
// die();
$ambildata = mysqli_query($conn, "DELETE FROM obatan WHERE nama='$id'");
echo "<meta http-equiv='refresh' content='1;url=Tampilanobatanpemilik.php'>";
echo "<h5>Data sedang dihapus...<h5>";