<?php
session_start();
include "connection.php";
$id = $_SESSION['email'];
$ambildata = mysqli_query($conn, "DELETE FROM user_rentcamp WHERE email='$id'");
echo "<meta http-equiv='refresh' content='1;url=register.php'>";
echo "<h5>Data sedang dihapus...<h5>";

?>