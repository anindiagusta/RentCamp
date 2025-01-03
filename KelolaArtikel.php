<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/css/style-kelola.css">
    <title>Kelola Artikel</title>
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
      <form class="form" action="" method="POST" enctype="multipart/form-data">
      <div><h2>Kelola Artikel</h2></div><br>
      <input type="hidden" name="idartikel">
        <div class="input-box">
          <input name="judul" type="text" placeholder="Judul"><br>
        </div >
        <div class="input-box">
          <input name="foto" type="file" placeholder="Foto"><br>
        </div>
        <div class="text">
          <textarea name="isi" rows="4" cols="38"> Isi Artikel</textarea><br>
        </div>
        <div class="input-box">
          <input name="tanggal" type="date" placeholder="tanggal terbit"><br>
        </div>
        <input style="background-color: #557153; color:white" name="kirimartikel" type="submit" value="KIRIM">
      </form>
      </div>

      <?php
      if(isset($_POST['kirimartikel'])){
			$pecahenter=explode("\r\n",htmlspecialchars($_POST['isi']));
			$txtout="";
			for($i=0;$i<=count($pecahenter)-1;$i++){
				$pchpart=str_replace($pecahenter[$i],"<br>".$pecahenter[$i],$pecahenter[$i]);
				$txtout .= $pchpart;
			}
			echo $txtout;
		}
    ?>

      <?php
      if (isset($_POST['kirimartikel'])) {
        include "connection.php";
        $id = $_POST['idartikel'];
        $judul = $_POST['judul'];
        $tanggal = $_POST['tanggal'];
        $foto = $_FILES['foto']['name'];
        $isi = $_POST['isi'];

        $dir = "img-artikel/";
        $tmpfile = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmpfile, $dir . $foto);

        // die();

        $sql = "INSERT INTO artikel_rentcamp VALUE ('" . $id . "','" . $judul . "', '" . $isi . "', '" . $tanggal . "','" . $foto . "')";
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
          echo "<meta http-equiv='refresh' content='1;url=tampilanartikelpemilik.php'>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
      }
      ?>
    
</body>
</html>