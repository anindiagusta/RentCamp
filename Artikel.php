<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./dist/css/style-artikel1.css">
        <title>ARTIKEL PAGE</title>
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
    include "connection.php";
    //pagination
    $halaman=6;
    $page=isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai=($page>1) ? ($page * $halaman) - $halaman : 0;

    $query="SELECT * FROM artikel_rentcamp";
    $result=mysqli_query($conn, $query);
    $total=mysqli_num_rows ($result);
    $pages=ceil($total/$halaman);

    $sql="select * from artikel_rentcamp LIMIT $mulai, $halaman";
    $tampil=mysqli_query($conn, $sql);
    // $no=$mulai+1;
    while($result=mysqli_fetch_array ($tampil)){
    ?>
<table>
    <tr>
      <td class=""> 
        <a href="lihatartikel.php?id=<?= $result['idartikel']; ?>"> <img src="img-artikel/<?php echo $result['foto']; ?>"></a>
      </td>
      <td>
      <a href="lihatartikel.php?id=<?= $result['idartikel']; ?>" style="text-decoration: none;">
        <p class="judul"> <b><?php echo $result['judul']; ?></b> <br> </p>
        <p class="tanggal"> <?php echo $result['tanggal']; ?></p>
        <p style="color: black; text-align:justify; "><?php echo substr($result['isi'], 0, 500); ?><p>
      </a>
      </td>
    </tr>
    <?php } ?>
  </table>
  <div style="margin-left:75px">
            Halaman
            <?php
                for ($i=1; $i<=$pages ; $i++){
            ?>
                <button><a href="artikel.php?halaman=<?php echo $i; ?>" style="text-decoration:none; color: white; "><u><?php echo $i; ?></u></a></button>
            <?php
                }
            ?>
  </div>
  <br>
    <br>
    <br>
    <hr color="black">
    <br>
    <br>
    <br>
    <section>
      <div class="phone">
        <img src="./image/telepon.png" alt="">
      </div>
      <div class="phone-number">
        <p>
          (+62) 827456178293 <br>
          (+62) 876354103875
        </p>
      </div>
      <div class="email">
        <img src="./image/email.png" alt="">
      </div>
      <div class="email-address">
        <p>
          rusdi69@gmail.com <br>
          carmosutarjo@gmail.com
        </p>
      </div>
      <div class="follow-us">
        <p>
          Follow Us
        </p>
      </div>
      <div class="facebook">
        <img src="./image/_Facebook.png" alt="">
      </div>
      <div class="instagram">
        <img src="./image/_Instagram.png" alt="">
      </div>
      <div class="twitter">
        <img src="./image/_Twitter.png" alt="">
      </div>
      <div class="whatsapp">
        <img src="./image/_WhatsApp.png" alt="">
      </div>
    </section>
</body>
</html>