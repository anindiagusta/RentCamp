<?php
session_start();
if ($_SESSION['kirimobat'] = true) {
    include "connection.php";
        $tampil = mysqli_query($conn, "SELECT * FROM obatan");
        while ($data = mysqli_fetch_array($tampil))
        $halaman = 10;
        $page    =isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        $mulai   =($page>1) ? ($page * $halaman) - $halaman : 0;
        $query = "SELECT * FROM alatcamping";
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
        <title>OBATAN PAGE</title>
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
      </div>
      <br><br>
      <div class="search">
            <form action="#">
                <input type="text"
                    placeholder=" Cari..."
                    name="search">
                <!-- <button>
                    <i class="fa fa-search"
                        style="font-size: 18px;">
                    </i>
                </button> -->
            </form>
        </div>
        <a href="cart.php"><img src="./image/keranjang 1.png" alt="" style="margin-left:75px"></a>
        <!-- <img src="./image/search.png" alt="" style="margin-left: 15px;"> -->
        <!-- <img src="./image/sortby.png" alt="" style="margin-right: 75px; margin-left: 220px;"> -->

        <div class="dropdown">
          <div class="select">
            <span class="selected">Terpopuler</span>
            <div class="caret"></div>
          </div>
          <ul class="menu2">
            <li class="active">Terpopuler</li>
            <li>Terlaris</li>
            <li>Termahal</li>
            <li>Termurah</li>
          </ul>
        </div>

    <div class="grid-container">
    <?php
        include "connection.php";
        $no=1;
        $sql = "select * from obatan LIMIT $mulai, $halaman";
        $tampil =mysqli_query($conn, $sql);
        $no    =$mulai+1;
        while($result = mysqli_fetch_array ($tampil)){
        ?>
      <div class="grid-item">
        <a href="Detail-obatan.php?id=<?php echo $result["idobatan"];?>" style="text-decoration: none; color: black;">
        <p style="margin-left: 6px;"><img src="img/<?php echo $result['foto']; ?>"></p>
        <p class="nama" style="margin-left: 20px;"><b><?php echo $result['nama']; ?></b> </p>
        <p class="harga" style="margin-left: 20px;"> Rp. <?php echo number_format($result["harga"],0,',','.');?> </p>
        <!-- <p class="detail"> <?php echo $result['detail']; ?> <p> --> <br>
        <center><button style="margin-bottom: 15px;"><p><a href="tambah-obatan.php?id=<?php echo $result["idobatan"];?>">Tambah</a></p></button></center>
        </a>
      </div>
    <?php 
    $no++;
    } ?>
    </div>
      <br>
  <div style="margin-left:75px">
            Halaman
            <?php
                for ($i=1; $i<=$pages ; $i++){
            ?>
                <button><a href="obatan.php?halaman=<?php echo $i; ?>" style="text-decoration:none"><u><?php echo $i; ?></u></a></button>
            <?php
                }
            ?>
  </div>
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
<script src="./dist/js/filters.js"></script>
</html>