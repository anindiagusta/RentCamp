<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./dist/css/style-profil.css">
        <title>Profil page</title>
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
            <li><a href="homepemilik.html">BERANDA</a></li>
            <li><a href="TampilanalatcampingPemilik.php">ALAT - ALAT CAMPING</a></li>
            <li><a href="TampilanObatanPemilik.php">OBAT - OBATAN</a></li>
            <li><a href="TampilanArtikelPemilik.php">ARTIKEL</a></li>
            <li><a href="Profilpemilik.php"><img src="./image/profile-admin.png" alt=""></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class=profil>
        <?php
        session_start();
        include "connection.php";
        $sql="SELECT * FROM pemilik_rentcamp where  email='$_SESSION[email]'";
        $result=mysqli_query($con,$sql);
        ?>
        <?php
        while($rows=mysqli_fetch_array($result)){
        ?>
        <div class="page">
      <div class="form">
      <div><h2>PROFIL</h2></div><br>
      <a href="editfoto.php?id=<?php echo $rows['email']; ?>">
              <img src="./image/rentcamplogo.png" alt="">
            </a> <br><br>
                    <div class="input-box">Nama		: <?php echo $rows['nama']; ?> </div>
                    <div class="input-box">Email		: <?php echo $rows['email']; ?></div>
                    <div class="input-box">Telepon	: <?php echo $rows['nohp']; ?></div>
        <button style="background-color: #CA0000;"><a style="text-decoration:none; color:white" href="logout.php" id="st-btn">Keluar</a></button>
        <button><a href="kelolauser.php" style="text-decoration:none; color:white">Kelola User</a></button>
        <button><a href="tmplankoreksi.php" style="text-decoration:none; color:white">Kelola Konten 1</a></button>
        <button><a href="tmplankoreksi2.php" style="text-decoration:none; color:white">Kelola Konten 2</a></button>
        </form>
        </div>
        <?php 
        }
        ?>
        </div>
    </body>
</html>