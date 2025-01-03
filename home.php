<?php
session_start();
if ($_SESSION['kirimsection1'] = true) {
  include "connection.php";
  $tampil = mysqli_query($conn, "SELECT * FROM adminhomesection1");
  while ($data = mysqli_fetch_array($tampil))
?>
<?php
}
?>

<?php
if ($_SESSION['kirimsection2'] = true) {
  include "connection.php";
  $tampil = mysqli_query($conn, "SELECT * FROM adminhomesection2");
  while ($data = mysqli_fetch_array($tampil))
?>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/css/style-home.css">
    <title>Beranda</title>
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
      <?php
      include "connection.php";
      $query = "SELECT * FROM adminhomesection1";
      $sql = mysqli_query($conn, $query);
      // $result = mysqli_fetch_assoc($conn, $sql);
      while ($result = mysqli_fetch_assoc($sql)) {
      ?>
      <div class="decor">
      <img src="homesection1/<?php echo $result['foto']; ?>">
      </div>
      <div class="intro">
        <p style="width:40%;">
        <?php echo $result["deskripsi"];?>
        </p>
      </div>
      <br><br><br>
      <?php }
      ?>
        <div class="grid-container">
        <?php
        $no=1;
      $query = "SELECT * FROM adminhomesection2";
      $sql = mysqli_query($conn, $query);
      // $result = mysqli_fetch_assoc($conn, $sql);
      while ($result = mysqli_fetch_assoc($sql)) {
        ?>
        <div class="grid-item">
      <img src="homesection1/<?php echo $result['foto']; ?>">
        <p style="font-size:28px;">
        <b><?php echo $result["deskripsi"];?></b>
        </p>
      </div>
      <?php 
    $no++;
    } ?> 
        </div>
        <br>
    <br>
    <br>
    <hr color="black">
    <br>
    <br>
    <br>
    <section>
      <div class="phone">
        <img src="./image/telepon.png" alt="">
      </div>
      <div class="phone-number">
        <p>
          (+62) 827456178293 <br>
          (+62) 876354103875
        </p>
      </div>
      <div class="email">
        <img src="./image/email.png" alt="">
      </div>
      <div class="email-address">
        <p>
          rusdi69@gmail.com <br>
          carmosutarjo@gmail.com
        </p>
      </div>
      <div class="follow-us">
        <p>
          Follow Us
        </p>
      </div>
      <div class="facebook">
        <img src="./image/_Facebook.png" alt="">
      </div>
      <div class="instagram">
        <img src="./image/_Instagram.png" alt="">
      </div>
      <div class="twitter">
        <img src="./image/_Twitter.png" alt="">
      </div>
      <div class="whatsapp">
        <img src="./image/_WhatsApp.png" alt="">
      </div>
    </section>
  </body>
</html>