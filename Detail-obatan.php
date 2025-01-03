<?php
    if (isset($_GET['id'])){
    $id=$_GET['id'];
    include 'connection.php';
    $sql= "select * from obatan where idobatan='$id'";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($query);
    ?>
    <?php
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./dist/css/style-detail.css">
        <title>DETAIL OBATAN PAGE</title>
    </head>
    <body>
    <section class="navbar">
      <div class="container">
        <div class="box-navbar">
          <div class="logo">
            <img src="./image/logo.png" alt="">
          </div>
          <div class="box">
            <ul>
            <li><a href=home.php>BERANDA</a></li>
              <li><a href="alatcamping.php">ALAT - ALAT CAMPING</a></li>
              <li><a href="obatan.php">OBAT - OBATAN</a></li>
              <li><a href=artikel.php>ARTIKEL</a></li>
            <li><a href=profil.php>PROFIL</a></li>
            </ul>
          </div>
        </div>
      </div>
      <br><br>
      <table>
      <?php
        include "connection.php";
        $no=1;
        $query = "SELECT * FROM obatan where idobatan='$id'";
        $sql = mysqli_query($conn, $query);
        // $data = mysqli_fetch_assoc($conn, $sql);
        while ($data = mysqli_fetch_assoc($sql)) {
        ?>
      <td>
        <img src="img/<?php echo $data['foto']; ?>" style="width: 570px; height: 500px;">
        </td>
        <td>
        <p class="nama" style="font-size: 40px;"><b><?php echo $data['nama']; ?></b> <p> <br>
        <p class="harga" style="font-size: 64px; color: #557153;"><b> Rp. <?php echo number_format($data["harga"],0,',','.');?> </b><p> <br>
        <p class="detail"> <b>Deskripsi Barang</b> <br><br> <?php echo $data['detail']; ?> <p> <br>
        <button><p><a href="tambah-obatan.php?id=<?php echo $data['idobatan'];?>">Tambah</a></p></button>
        </td>
      </table>
    <?php 
    } ?>