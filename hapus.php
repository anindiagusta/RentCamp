<?php
    session_start();
    include "connection.php";
    $id = $_GET["id"];
    unset($_SESSION["cart"][$id]);
    header("location:cart.php");
?>