
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/css/style-kelola.css">
    <title>KELOLA HOME</title>
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
      <?php
include "connection.php";
$ambildata = mysqli_query($conn, "SELECT * FROM adminhomesection1 WHERE idsection1='$_GET[id]'");
$data = mysqli_fetch_array($ambildata);
?>
    <div class="page">
      <form class="form" action="" method="POST" enctype="multipart/form-data">
      <div><h2>KELOLA HOME</h2></div><br>
      <input type="hidden" name="idsection1">
        <div class="input-box">
        <textarea name="deskripsi" rows="4" cols="38"><?php echo $data['deskripsi'];?>"</textarea><br>
        </div >
        <div class="input-box">
          <input name="foto" type="file" placeholder="Foto"><br>
        </div>
        <input style="background-color: #557153; color:white" name="kirimsection1" type="submit" value="KIRIM">
      </form>
      </div>


      <?php
      if (isset($_POST['kirimsection1'])) {
        include "connection.php";
        $id = $_POST['idsection1'];
        $deskripsi = $_POST['deskripsi'];
        $foto = $_FILES['foto']['name'];

        $dir = "homesection1/";
        $tmpfile = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmpfile, $dir . $foto);

        // die();
      
          mysqli_query($conn, "UPDATE adminhomesection1 SET idsection1='$id', deskripsi='$deskripsi', foto='$foto'") or die(mysqli_error($conn));
          echo "<meta http-equiv='refresh' content='1;url=tmplankoreksi.php'>";

      }
      ?>
    
</body>
</html>