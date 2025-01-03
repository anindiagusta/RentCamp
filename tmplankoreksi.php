<?php
session_start();
if ($_SESSION['kirimsection1'] = true) {
  include "connection.php";
  $tampil = mysqli_query($conn, "SELECT * FROM adminhomesection1");
  while ($data = mysqli_fetch_array($tampil))
?>
<?php
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./dist/css/style-table.css">
  <title>TAMPILAN ADMIN KONTEN STATIS</title>
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
    <button class="tambah">
      <a href="koreksi1.php">Tambah</a>
    </button><br><br>
    <table border="1">
      <tr>
        <th>No</th>
        <!-- <th>Nama</th> -->
        <!-- <th>Harga</th> -->
        <th>Foto</th>
        <th>Detail</th>
        <th>Kelola</th>
      </tr>
      <?php
      include "connection.php";
      $no = 1;
      $query = "SELECT * FROM adminhomesection1";
      $sql = mysqli_query($conn, $query);
      // $result = mysqli_fetch_assoc($conn, $sql);
      while ($result = mysqli_fetch_assoc($sql)) {
      ?>
      <tr>
        <td> <?php echo $no++; ?> </td>
        <td> <img src="homesection1/<?php echo $result['foto']; ?>" style="width: 200px;"> </td>
        <td> <?php echo $result['deskripsi']; ?> </td>
        <td>
          <!--<a href=#>Edit</a>-->
          <center><button> <a href="koreksi1.php?id=<?php echo $result['idsection1']; ?>">Edit</a> </button>
        </td></button></center>
      </tr>
      <?php } ?>

    </table>
</body>

</html>