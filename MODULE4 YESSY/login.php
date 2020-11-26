<?php
session_start();
include_once('controler.php');
$database = new database();
//for session in login
if(isset($_SESSION['login'])) {
  header('location:index.php');
}
if(isset($_COOKIE['email'])) { 
  $database->relogin($_COOKIE['email']);
  header('location:index.php');
}
?>
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
    if(isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      if(isset($_POST['remember'])) {
            $remember = TRUE;
      } else {
            $remember = FALSE;
      }
      if($database->login($email,$password,$remember)) {
        echo 
        "<div class='alert alert-warning'>
        <strong>Success!</strong> Berhasil Login.
        </div>";
      echo "<script>setTimeout(function() {window.location.href='index.php'}, 500);</script>";
      } else {
        echo "<div class='alert alert-danger'>
        <strong>Failed!</strong> Gagal Login.
        </div>";
        echo "<script>setTimeout(function() {window.location.href='index.php'}, 2500);</script>";
                }
            }
        ?>
  <div class="container">
    <div class="card shadow-lg" style="width: 30rem;height: 30rem;;margin-left:30%; margin-top:5%">
      <div class="card-body">
        <h5 class="card-title" style="text-align:center;font-size:20pt">Login</h5>
        <hr>
        <form action="" method="post" style="margin-top:40px">
          <div class="form-group" style="margin-left:40px">
            <label for="exampleFormControlInput1" style="margin-left:15px">E-mail</label>
            <div class="col-lg-9">
              <input type="email" class="form-control" name="email">
            </div>
          </div>
          <div class="form-group" style="margin-left:40px">
            <label for="exampleFormControlInput1" style="margin-left:15px">Kata Sandi</label>
            <div class="col-lg-9">
              <input type="password" class="form-control" name="password">
            </div>
          </div>
          <div class="form-check" style="margin-left:55px">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
              Remember Me
            </label>
          </div>
          <div class="form-group row">
            <div class="col-lg-9">
              <button type="submit" name="submit" class="btn btn-primary" style="margin-left:50%;margin-top:20px">Sign
                in</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
  
</body>

</html>