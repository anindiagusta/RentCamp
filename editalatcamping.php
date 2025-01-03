<?php
session_start();
include "connection.php";
$ambildata = mysqli_query($conn, "SELECT * FROM alatcamping WHERE nama='$_SESSION[nama]'");
$data = mysqli_fetch_array($ambildata);
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./dist/css/style-kelola.css">
  <title>Edit Data</title>
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
</section>

<form action="" method="POST">
    <table>
      <tr>
        <td>Nama</td>
        <td><input type="text" name="nama"></td>
      </tr>
      <tr>
        <td>Foto</td>
        <td><input type="file" name="foto"></td>
      </tr>
      <tr>
        <td>harga</td>
        <td><input name="isi" type="int"></td>
      </tr>
      <tr>
        <td>detail</td>
        <td><input name="tanggal" type="text"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="edit" value="edit"></td>
      </tr>
    </table>
  </form>
  <?php
  include "connection.php";
  if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $foto = $_POST['foto'];
    $detail = $_POST['detail'];

    mysqli_query($conn, "UPDATE artikel_rentcamp SET nama='$nama', harga='$harga', foto='$foto', detail='$detail' WHERE nama='$_SESSION[nama]'") or die(mysqli_error($conn));

    echo "<h5> Silahkan Tunggu, Data Sedang Diupdate.... </h5>";
    echo "<meta http-equiv='refresh' content='1;url=profil.php'>";
  }
  ?>
</body>
</html>