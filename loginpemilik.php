<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./dist/css/style-register2.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@700&display=swap" rel="stylesheet">
  <title>Login Page Pemilik</title>
</head>

<body background="./image/bg-login.png">
  <div class="container">
    <div class="logo">
      <img src="./image/logo.png" alt="">
    </div>
    <div class="page">
      <div class="form">
        <form action="" method="POST">
        <div><h2>MASUK</h2></div><br>
          <div class="input-box">
            <input name="email" type="email" placeholder="email"><br>
          </div>
          <div class="input-box">
            <input name="pasword" type="password" placeholder="password"><br>
          </div>
          <div class="submit">
            <input name="login" type="submit" value="MASUK" style="background-color: #557153; color:white">
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['login'])) {
    session_start();
    include "connection.php";
    $email = $_POST['email'];
    $pass = $_POST['pasword'];
    $sql = "SELECT * FROM pemilik_rentcamp WHERE email = '$email' AND pasword = '$pass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
      if ($pass == $row['pasword']) {
        $_SESSION['login'] = true;
        $_SESSION['email'] = $row['email'];
        echo "<meta http-equiv='refresh' content='1;url=homepemilik.html'>";
      }
    } else if ($email == '' or $pass == '') {
      echo "Email or Password cannot be empty";
    } else if ("email" != $email or "password" != $pass) {
      echo "Password atau Email salah";
    } else {
      echo "Login Failed: User not found ";
    }
    $conn->close();
  }

  ?>
</body>

</html>