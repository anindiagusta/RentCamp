<?php
    session_start();
    include "connection.php";
    $id = $_GET["id"];
    $sql = "SELECT * FROM obatan WHERE idobatan='$id'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
    $nm = $data["nama"];
    $hg = $data["harga"];
    $_SESSION["cart"][$id] = [
        "nama" => $nm,
        "harga" => $hg,
        "jumlah" => 1
    ];
    header("location: cart.php");
?>