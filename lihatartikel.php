<?php
include "connection.php";
$ambildata = mysqli_query($conn, "SELECT * FROM artikel_rentcamp WHERE idartikel='$_GET[id]'");
$data = mysqli_fetch_array($ambildata);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./dist/css/style-lihatartikel.css">
        <title>ARTIKEL PAGE</title>
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
        <?php
    include "connection.php";
    session_start();
    $tampil = mysqli_query($conn, "SELECT * FROM artikel_rentcamp WHERE idartikel='$_GET[id]'");
    while ($data = mysqli_fetch_array($tampil)) {
    ?>
    <div class="image-artikel"><img src="img-artikel/<?php echo $data['foto']; ?>"></div>
    <p class="judul"> <b><?php echo $data['judul']; ?></b> <br> </p>
        <p class="tanggal"> <?php echo $data['tanggal']; ?></p>
        <p style="color: black; text-align:justify; "><?php echo $data['isi']; ?></p>
        <?php } ?>
        
    <br>
    <br>
    <img src="./image/kontak.png" alt="" style="width: 100%;">
    <br>
</body>

</html>