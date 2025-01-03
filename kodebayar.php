<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./dist/css/style-profil.css">
        <title>Pembayaran page</title>
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
    </section>
      <div>
        <?php
        session_start();
  if (isset($_POST['kirim'])) {
    $pembayaran = $_POST['pembayaran'];
    $_SESSION ['pembayaran']= $pembayaran;

    if ($_SESSION['pembayaran']=="BCA"){
      echo "Kode Bayar : 6701210081";
    } if ($_SESSION['pembayaran']=="BRI"){
      echo "Kode Bayar : 67012100810081";
    } if ($_SESSION['pembayaran']=="DANA"){
      echo "Kode Bayar : 67012100818181";
    } if ($_SESSION['pembayaran']=="GOPAY"){
      echo "Kode Bayar : 67012100816701210081";
    }}
  ?>
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