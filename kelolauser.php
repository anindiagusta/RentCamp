<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/css/style-table.css">
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
    <br><br>
    
    <center>
    <h2>KELOLA USER</h2> 
    <br><br>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Detail</th>
            <th>Kelola</th>
        </tr>
    <?php
    include "connection.php";
    $no = 1;
    $query = "SELECT * FROM user_rentcamp";
    $sql = mysqli_query($conn, $query);
    // $result = mysqli_fetch_assoc($conn, $sql);
    while ($result = mysqli_fetch_assoc($sql)) {
    ?>
    <tr>
        <td> <?php echo $no++; ?> </td>
      <td style="width: 300px;"> <?php echo $result['nama']; ?> </td>
      <td style="width: 300px;"> <?php echo $result['email']; ?> </td>
      <td style="width: 300px;"> <?php echo $result['nohp']; ?> </td>
      <td style="width: 300px;"> </td>
      <td style="width: 300px;">
         <!-- <a href=#>Edit</a> -->
         <center><button style="margin-top: 5px;"><a href="hapusakun.php" id="st-btn">Hapus Akun</a></button> </center>
      </td>
    </tr>
    <?php } ?>

  </table> </center>
  </section>
</body>

</html>