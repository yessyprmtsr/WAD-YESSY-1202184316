<?php
  include_once('controller.php');
  $database = new database();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <title>Register WAD Beauty Store</title>
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

if (isset($_POST['submit'])) {
            
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $confirmPassword = $_POST['confirmPassword'];
  
  if ($database->register($nama,$email,$phone,$password)) {
      echo 
      "<div class='alert alert-warning'>
      <strong>Success!</strong> Berhasil Register.
      </div>";
      echo "<script>setTimeout(function() {window.location.href='login.php'}, 500);</script>";
  } else {
      echo "<div class='alert alert-danger'>
      <strong>Failed!</strong> Gagal Registrasi.
      </div>";
    }
  }
?>
  <div class="container">
    <div class="card shadow-lg" style="width: 30rem;height: 40rem;;margin-left:30%; margin-top:5%">
      <div class="card-body">
        <h5 class="card-title" style="text-align:center;font-size:20pt">Register</h5>
        <hr>
        <form action="" method="post" style="margin-top:40px">
          <div class="form-group" style="margin-left:40px">
            <label for="exampleFormControlInput1" style="margin-left:15px">Name</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap">
            </div>
          </div>
          <div class="form-group" style="margin-left:40px">
            <label for="exampleFormControlInput1" style="margin-left:15px">E-mail</label>
            <div class="col-lg-9">
              <input type="email" class="form-control" name="email" placeholder="Masukkan Alamat E-Mail">
            </div>
          </div>
          <div class="form-group" style="margin-left:40px">
            <label for="exampleFormControlInput1" style="margin-left:15px">No. Handphone</label>
            <div class="col-lg-9">
              <input type="number" class="form-control" name="phone" placeholder="Masukkan Nomor Handphone">
            </div>
          </div>
          <div class="form-group" style="margin-left:40px">
            <label for="exampleFormControlInput1" style="margin-left:15px">Kata Sandi</label>
            <div class="col-lg-9">
              <input type="password" class="form-control" name="password" placeholder="Buat Kata Sandi">
            </div>
          </div>
          <div class="form-group" style="margin-left:40px">
            <label for="exampleFormControlInput1" style="margin-left:15px">Konfirmasi Kata Sandi</label>
            <div class="col-lg-9">
              <input type="password" class="form-control" name="confirmPassword" placeholder="Konfirmasi Kata Sandi">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-9">
              <button type="submit" name="submit" class="btn btn-primary" style="margin-left:50%">Sign in</button>
            </div>
          </div>
          <p style="margin-left:25%">Sudah punya akun? <a href="login.php">Login</a></p>
        </form>
      </div>
    </div>

  </div>
</body>

</html>