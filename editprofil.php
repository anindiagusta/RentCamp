<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./dist/css/style-kelola.css">
  <title>EDIT PROFIL</title>
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
      include "connection.php";
      session_start();
      $sql = "SELECT * FROM user_rentcamp where  iduser='$_SESSION[iduser]'";
      $result = mysqli_query($conn, $sql);
      ?>
      <div class="page">
        <div class="form">
          <form method="POST" enctype="multipart/form-data">
            <h2>EDIT PROFIL</h2><br>
            <?php
            while ($rows = mysqli_fetch_assoc($result)) {
              echo '<img style="margin:auto; width: 150px; height:150px; border-radius: 1000px;" src="userprofile/' . $rows['profil'] . '">';
            ?>
            <div>
            </div> <br>
            <div class="input-box">
              <p>
                <input type="text" name="nama" value="<?php echo $rows['nama']; ?>">
              </p>
            </div>
            <div class="input-box">
              <p>
                <input type="email" name="email" value="<?php echo $rows['email']; ?>">
              </p>
            </div>
            <div class="input-box">
              <p>
                <input type="tel" name="nohp" value="<?php echo $rows['nohp']; ?>">
              </p>
            </div>
            <div class="input-box">
              <input required name="profil" type="file" accept="image/*" placeholder="Upload Foto"
                value="<?php echo $rows['profil'];?>"><br>
            </div>
            <br>
            <div class="submit">
              <input style="background-color: #557153; color:white" name="editprofil" type="submit" value="KIRIM">
            </div>
          </form>

          <?php
              if (isset($_POST['editprofil'])) {
                include "connection.php";
                // var_dump($_FILES);
                // echo $_FILES['foto']['name'];
                // die();
                $currentTime = time();
                $_FILES["profil"]["name"] = $currentTime;

                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $nohp = $_POST['nohp'];
                $profil = $_FILES['profil']['name'];

                $dir = "userprofile/";
                $tmpfile = $_FILES['profil']['tmp_name'];
                // var_dump($_FILES);
                // var_dump($tmpfile);
                // die();

                move_uploaded_file($tmpfile, $dir . $profil);
                // replace
                // if ($_FILES['profil']['name'] != "") {
                //   $profil = $_FILES['profil']['name'];
                //   unlink("userprofile/" . $result['profil']);
                //   move_uploaded_file($_FILES['profil']['tmp_name'], 'userprofile/' . $_FILES['profil']['name']);
                // }

                mysqli_query($conn, "UPDATE user_rentcamp SET nama='$nama', email='$email', nohp='$nohp', profil='$profil' WHERE email='$email'") or die(mysqli_error($conn));

                echo "<h5> Silahkan Tunggu, Data Sedang Diupdate.... </h5>";
                echo "<meta http-equiv='refresh' content='1;url=Profil.php'>";
                // mysqli_query($conn, "UPDATE artikel_rentcamp SET judul='$judul', foto='$foto', isi='$isi', tanggal='$tanggal' WHERE judul='$_GET[id]'") or die(mysqli_error($conn));
              } ?>

          <?php
            }
        ?>
        </div>
      </div>
      <br>
    </div>