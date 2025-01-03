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
  <link rel="stylesheet" href="./dist/css/style-kelola.css">
  <title>EDIT ARTIKEL</title>
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
              <li><a href=home.html>BERANDA</a></li>
              <li><a href="alatcamping.php">ALAT - ALAT CAMPING</a></li>
              <li><a href="Obatan.php">OBAT - OBATAN</a></li>
              <li><a href=artikel.php>ARTIKEL</a></li>
              <li><a href=profil.php><img src="./image/profile-icon.png" alt=""></a></li>
            </ul>
          </div>
        </div>
      </div>
</section>

<form action="" method="POST" enctype="multipart/form-data">
<div class="page">
<div class="form">
      <form class="form" action="" method="POST" enctype="multipart/form-data">
      <div><h2>EDIT ARTIKEL</h2></div><br>
        <div class="input-box">
          <input name="judul" type="text" value="<?php echo $data['judul'];?>"><br>
        </div >
        <div class="input-box">
          <input name="foto" type="file" value="<?php echo $data['foto'];?>"><br>
        </div>
        <div class="text">
          <textarea name="isi" rows="4" cols="38"><?php echo $data['isi'];?>"</textarea><br>
        </div>
        <div class="input-box">
          <input name="tanggal" type="date" value="<?php echo $data['tanggal'];?>"><br>
        </div>
        <input style="background-color: #557153; color:white" name="edit" type="submit" value="KIRIM">
      </form>
      </div>
</div>

  <?php
  include "connection.php";
  if (isset($_POST['edit'])) {
    $judul = $_POST['judul'];
    $foto = $_FILES['foto'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];

    $dir = "img-artikel/";
    $tmpfile = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmpfile, $dir . $foto);
    
    mysqli_query($conn, "UPDATE artikel_rentcamp SET judul='$judul', foto='$foto', isi='$isi', tanggal='$tanggal' WHERE idartikel='$_GET[id]'") or die(mysqli_error($conn));

    echo "<h5> Silahkan Tunggu, Data Sedang Diupdate.... </h5>";
    echo "<meta http-equiv='refresh' content='1;url=tampilanartikelpemilik.php'>";
  }
  ?>
</body>
</html>

