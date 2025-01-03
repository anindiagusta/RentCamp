<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./dist/css/style-register2.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@700&display=swap" rel="stylesheet"> -->
  <title>Register Page</title>
</head>

<body background="./image/bg-login.png">
  <div class="container">
    <div class="logo">
      <img src="./image/logo.png" alt="">
    </div>
    <div class="page">
      <div class="form">
        <form action="" method="POST">
        <div><h2>REGISTRASI</h2></div><br>
          <input name="iduser" type="hidden">
          <div class="input-box">
            <input name="nama" type="text" placeholder="Nama" required><br>
          </div>
          <div class="input-box">
            <input name="email" type="email" placeholder="Email" required><br>
          </div>
          <div class="input-box">
            <input name="pasword" type="password" placeholder="Password" required><br>
          </div>
          <div class="input-box">
            <input name="verify-pasword" type="password" placeholder="Verify Password" required><br>
          </div>
          <div class="input-box">
            <input name="nohp" type="tel" placeholder="Telepon" required><br>
          </div>
          <input name="profil" type="hidden">
          <div class="submit">
            <input name="register" type="submit" value="DAFTAR" style="background-color: #557153; color:white">
          </div>
          <div class="question"> sudah punya akun? <a href="login.php">Masuk</a></div>
        </form>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['register'])) {
    include "connection.php";
    $iduser = $_POST['iduser'];
    $name = $_POST['nama'];
    $email = $_POST['email'];
    $pass = $_POST['pasword'];
    $phone = $_POST['nohp'];
    $profil = $_POST['profil'];

    $sql = "INSERT INTO user_rentcamp VALUES ('" . $iduser . "','" . $name . "', '" . $email . "', '" . $pass . "','" . $phone . "','" . $profil . "')";
    if ($name == '' or $email == '' or $pass == '' or $phone == '') {
      echo "No data can be empty";
    } else if ($conn->query($sql) === TRUE) {
      echo "<center>Register succesfully</center>";
      echo "<meta http-equiv='refresh' content='1;url=login.php'>";
    } else {
      echo "<center>Failed to Register: </center>" . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }

  ?>
</body>

</html>