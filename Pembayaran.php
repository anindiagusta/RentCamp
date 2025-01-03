<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./dist/css/style-profile.css">
        <title>PEMBAYARAN PAGE</title>
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
if(isset($_POST['submit'])){
session_start();
$pembayaran = $_POST['pembayaran'];
$_SESSION ['pembayaran']= $pembayaran;
echo "<div class='page'>";
echo "<div class='form'>";
echo "<div><h2>Kode Bayar</h2></div><br>";
if ($_SESSION['pembayaran']=="BCA"){
      echo "<div class='tampilan'> Kode Bayar : 6701210081</div>";
      echo "<button style='width:100%; height:50px;'><a style='color:white; text-decoration:none;' href=buktipembayaran.php>Bukti Pembayaran</a></button>";
    } if ($_SESSION['pembayaran']=="BRI"){
      echo "<div class='tampilan'> Kode Bayar : 6706701210081</div>";
      echo "<button style='width:100%; height:50px;'><a style='color:white; text-decoration:none;' href=buktipembayaran.php>Bukti Pembayaran</a></button>";
    } if ($_SESSION['pembayaran']=="DANA"){
      echo "<div class='tampilan'> Kode Bayar : 6701211210081</div>";
      echo "<button style='width:100%; height:50px;'><a style='color:white; text-decoration:none;' href=buktipembayaran.php>Bukti Pembayaran</a></button>";
    } if ($_SESSION['pembayaran']=="GOPAY"){
      echo "<div class='tampilan'> Kode Bayar : 67012100810081</div>";
      echo "<button style='width:100%; height:50px;'><a style='color:white; text-decoration:none;' href=buktipembayaran.php>Bukti Pembayaran</a></button>";
    }
} 
else{
?>
<div class="page">
<form class="form" action="" method="POST">
<div><h2>Pembayaran</h2></div><br>
<p style="font-size:small; text-align: justify;" >Dengan melakukan pembayaran, Penyewa telah menyetujui Syarat dan Ketentuan dari RentCamp</p>
<p style="text-align:right;"><a href="Syarat-Ketentuan.html" style="font-size:small; color:#557153;">Baca Syarat dan Ketentuan</a></p><br>
<div class="tampilan"><label for="pembayaran">Pilih Pembayaran:</label>
            <select name="pembayaran" id="pembayaran">
                <option value="BCA">BCA</option>
                <option value="BRI">BRI</option>
                <option value="DANA">DANA</option>
                <option value="GOPAY">GOPAY</option>
            </select></div>
            <button style="width:100%; height:50px;"><input style="background-color: #557153; color:white; border:none" name="submit" type="submit" value="KIRIM"></button> 
          <!-- <div class="question"> sudah bergabung? <a href="masukmembership.php">Masuk</a></div> -->
        </form>
        </div>

<?php
}
?>

</body>
</html>
