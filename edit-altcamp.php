<?php
include "connection.php";
$query = "SELECT * FROM alatcamping WHERE idalat='$_GET[id]'";
$sql = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($sql)
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./dist/css/style-kelola.css">
  <title>EDIT ALAT CAMPING</title>
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

<form action="" method="POST" enctype="multipart/form-data">
<div class="page">
<div class="form">
      <form class="form" action="" method="POST" enctype="multipart/form-data">
      <div><h2>EDIT ALAT CAMPING</h2></div><br>
        <div class="input-box">
          <input name="nama" type="text" value="<?php echo $data['nama'];?>"><br>
        </div >
        <div class="input-box">
          <input name="harga" type="int" value="<?php echo $data['harga'];?>"><br>
        </div>
        <div class="text">
          <input type="file" name="foto" value="<?= $data['foto'] ?>"><br>
        </div>
        <div class="input-box">
          <input name="detail" type="text" value="<?php echo $data['detail'];?>"><br>
        </div>
        <input style="background-color: #557153; color:white" name="edit" type="submit" value="KIRIM">
      </form>
      </div>
</div>
  <?php
  include "connection.php";

  if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    $detail = $_POST['detail'];

    $dir = "img/";
    $tmpfile = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmpfile, $dir . $foto);

    mysqli_query($conn, "UPDATE alatcamping SET nama='$nama', harga='$harga', foto='$foto', detail='$detail' WHERE idalat='$_GET[id]'") or die(mysqli_error($conn));

    echo "<h5> Silahkan Tunggu, Data Sedang Diupdate.... </h5>";
    echo "<meta http-equiv='refresh' content='1;url=tampilanalatcampingpemilik.php'>";
  }
  ?>
</body>

</html>