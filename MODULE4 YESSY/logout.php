<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <title>Login WAD Beauty Store</title>
</head>
<body style="background-color:#bbdefb">
  <nav class="navbar navbar-light bg-<?= $_COOKIE['navbarColor']?>">
    <a class="navbar-brand" style="color:gray;">WAD Beauty</a>
    <form action="" class="form-inline">
      <a class="nav-link" href="login.php" style="color:gray;">Login</a>
      <a class="nav-link" href="register.php" style="color:gray;">Register</a>
    </form>
  </nav>
  <?php
        session_start();
        $_SESSION = [];
        session_unset();
        session_desroy();
        //hapus cookie
        setcookie('email','',0,'/');
        setcookie('nama','',0,'/');
        echo 
        "<div class='alert alert-warning'>
        <strong>Success!</strong> Berhasil Logout.
        </div>";
        echo "<script>setTimeout(function() {window.location.href='login.php'}, 500);</script>";
        ?>
</body>
</html>