<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./dist/css/style-profil.css">
        <title>Detail page</title>
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
      </div> <br><br>
  <?php
        session_start();
        include "connection.php";
        $sql="SELECT * FROM user_rentcamp WHERE iduser='$_SESSION[iduser]'";
        $result=mysqli_query($con,$sql);
        ?>
        <?php
        while($rows=mysqli_fetch_array($result)){
        ?>
      <div class="page">
      <form class="form" action="" method="POST" enctype="multipart/form-data">
      <div><h2>Bukti Pembayaran</h2></div><br>
        <div class="input-box">
            <input name="nama" type="text" value="<?php echo $rows['nama']; ?>" style="border: none;"><br>
          </div>
          <div class="input-box">
            <input name="email" type="text" value="<?php echo $rows['email']; ?>" style="border: none;"><br>
          </div>
          <div class="input-box">
            <input name="foto" type="file" placeholder="kirim bukti bayar"><br>
          </div>
          <div class="submit">
          <!-- <input style="background-color: #557153; color:white" name="kirim" type="submit" value="KIRIM"> -->
          <button style="width:100%; height:50px;"><input style="background-color: #557153; color:white; border:none" name="kirim" type="submit" value="DAFTAR"></button> 
          </div>
        </form>
    </div>
    <?php
        }
    ?>
  <?php
  if (isset($_POST['kirim'])) {
    include "connection.php";
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $foto = $_FILES['foto']['name'];

    $dir = "img/";
    $tmpfile = $_FILES['foto']['tmp_name'];
    
    move_uploaded_file($tmpfile, $dir . $foto);

    $sql = "INSERT INTO buktibayar VALUES ('" . $nama . "', '" . $email . "', '" . $foto . "')";
    if ($conn->query($sql) === TRUE) {
      echo "File Terkirim <br> Tunggu Admin Memverifikasi ";
      header('location: profil.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
  ?>
</body>

</html>
