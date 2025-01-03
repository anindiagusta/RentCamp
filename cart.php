
<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./dist/css/style-tampilan.css">
        <title>KERANJANG BELANJA PAGE</title>
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
        if(empty($_SESSION["cart"])){
            echo "<br> <button style='margin-left:75px;'><a href='alatcamping.php'>Belanja Sekarang</a></button>";
        } else {
            ?>
            <center>
                <h2>Keranjang Belanja</h2> <br><br>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        $grandtotal = 0;
                        foreach ($_SESSION["cart"] as $cart => $data) {
                            $subtotal = $data["harga"] * $data["jumlah"];
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td style="width: 300px;"><?php echo $data["nama"]; ?></td>
                                <td style="width: 300px;"><?php echo number_format($data["harga"],0,',','.');?></td>
                                <td style="width: 100px;"><?php echo $data["jumlah"]; ?></td>
                                <td style="width: 100px;"><?php echo $subtotal; ?></td>
                                <td style="width: 300px;">
                                    <center><button style="margin-top: 5px;"><a href="hapus.php?id=<?php echo $cart?>">Hapus</a></button></center>
                                </td> 
                            </tr>
                            <?php
                            $grandtotal+=$subtotal;
                        }
                    ?>
                </tbody>
            </table> </center> 
            <br><br>
            <h3 style="margin-left:200px;">Total Bayar : <?php echo number_format($grandtotal,0,',','.');?> </h3> <br>
            <button style="margin-left:200px;"><a href="pembayaran.php">Bayar Sekarang</a></button>
            <?php 
        }
    ?>
</body>
</html>