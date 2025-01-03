<?php
session_start();
if ($_SESSION['kirimobat'] = true) {
    include "connection.php";
        $tampil = mysqli_query($conn, "SELECT * FROM obatan");
        while ($data = mysqli_fetch_array($tampil))
        $halaman = 3;
        $page    =isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        $mulai   =($page>1) ? ($page * $halaman) - $halaman : 0;
        $query = "SELECT * FROM obatan";
        $result = mysqli_query($conn, $query);
        $total = mysqli_num_rows ($result);
        $pages = ceil($total/$halaman);
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
        <link rel="stylesheet" href="./dist/css/style-tampilan.css">
        <title>TAMPILAN ADMIN OBATAN</title>
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
        <a href="kelola_obat.php">Tambah Obatan</a>
      </button><br><br>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Detail</th>
            <th>Kelola</th>
        </tr>
        <?php
        include "connection.php";
    $no = 1;
    $sql = "select * from obatan LIMIT $mulai, $halaman";
    $tampil =mysqli_query($conn, $sql);
    $no    =$mulai+1;
    while($result = mysqli_fetch_array ($tampil)){
    ?>
    <tr>
        <td> <?php echo $no++;?> </td>
        <?php $result['idobatan'];?>
      <td> <?php echo $result['nama']; ?> </td>
      <td> <?php echo $result['harga']; ?> </td>
      <td> <img src="img/<?php echo $result['foto']; ?>" style="width: 200px;"> </td>
      <td> <?php echo $result['detail']; ?> </td>
      <td>
         <!--<a href=#>Edit</a>-->
         <center><button> <a href="edit-obatan.php?id=<?php echo $result['idobatan']; ?>">Edit</a> </button>
         <button><a href="delete-obatan.php?namabrg=<?php echo $result['idobatan']; ?>">Hapus</a></td></button></center>
    </tr>
    <?php } ?>
  </table>
  <br>
  <div style="margin-left:75px">
            Halaman
            <?php
                for ($i=1; $i<=$pages ; $i++){
            ?>
                <button><a href="TampilanObatanPemilik.php?halaman=<?php echo $i; ?>" style="text-decoration:none"><u><?php echo $i; ?></u></a></button>
            <?php
                }
            ?>
  </div>
</body>
</html>