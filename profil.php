<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./dist/css/style-profil.css">
  <title>PROFIL PAGE</title>
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
    <br><br><br><br>
    <div>
      <?php
      session_start();
      include "connection.php";
      $sql = "SELECT * FROM user_rentcamp where iduser='$_SESSION[iduser]'";
      $result = mysqli_query($con, $sql);
      ?>
      <div class="page">
        <div class="form">
          <form action="" method="POST" enctype="multipart/form-data">
          <center><h2>PROFIL</h2><br>
            <div class="foto">
            <?php
            while ($rows = mysqli_fetch_assoc($result)) {
              if ($rows['profil'] == '') {
                echo '<img style="width: 150px; height:150px; border-radius: 1000px;" src="./image/profil.png" alt="">';
                echo '<br><br>';
              } else {
                echo '<div class="userprofile"><img style="width: 150px; height:150px; border-radius: 1000px;" src="userprofile/' . $rows['profil'] . '"></div>';
                echo '<br>';
              }
            ?>
            </div></center>
            <div class="input-box">
              <p>Nama : <?php echo $rows['nama']; ?></p>
            </div>
            <div class="input-box">
              <p>Email : <?php echo $rows['email']; ?></p>
            </div>
            <div class="input-box">
              <p>No HP : <?php echo $rows['nohp']; ?></p>
            </div>
          </form>
          <br>
          <button class="profil"><a href="editprofil.php" id="st-btn">Edit Profil</a></button>
          <button class="profil"><a href="hapusakun.php" id="st-btn">Hapus Akun</a></button>
          <button class="keluar"><a class="hitam" href="logout.php" id="st-btn">Keluar</a></button>
          <button class="membership"><a class="hitam" href="membership.php" id="st-btn">membership</a></button>
          <?php
            }
        ?>
        </div>
      </div>
      <br>
    </div>