<?php
    session_start();
    include "connection.php";
    $id = $_GET["id"];
    $sql = "SELECT * FROM alatcamping WHERE idalat='$id'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
    $nm = $data["nama"];
    $hg = $data["harga"];
    $jumlah = 1;
    $_SESSION["cart"][$id] = [
        "nama" => $nm,
        "harga" => $hg,
        "jumlah" => $jumlah,
    ];
    header("location: cart.php");
?>