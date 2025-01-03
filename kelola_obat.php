<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/css/style-kelola.css">
    <title>Alat Camping Rentcamp</title>
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
  <div class="page">
    <div class="form">
      <form class="login-form" method="POST" action="" enctype="multipart/form-data">
        <div class="input-box">
          <h2>Kelola Alat Camping</h2>
        </div><br>
        <input name="idobatan" type="hidden">
        <div class="input-box">
          <input name="nama" type="text" placeholder="Nama"><br>
        </div>
        <div class="input-box">
          <input name="harga" type="int" placeholder="Harga"><br>
        </div>
        <div class="input-box">
          <input name="foto" type="file" placeholder="Upload Foto" required><br>
        </div>
        <div class="input-box">
          <input name="detail" type="text" placeholder="Detail Barang"><br>
        </div>
          <input style="background-color: #557153; color:white" name="kirimobat" type="submit" value="KIRIM">
      </form>
      <?php
      if (isset($_POST['kirimobat'])) {
        include "connection.php";
        $idobatan = $_POST['idobatan']; 
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $foto = $_FILES['foto']['name'];
        $detail = $_POST['detail'];

        $dir = "img/";
        $tmpfile = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmpfile, $dir . $foto);

        // die();

        $sql = "INSERT INTO obatan VALUE ('" . $idobatan . "','" . $nama . "', '" . $harga . "', '" . $foto . "','" . $detail . "')";
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
          header('location: TampilanObatanPemilik.php');
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
      }
      ?>
</body>

</html>