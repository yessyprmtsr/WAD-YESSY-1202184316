<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <title>MODULE 4</title>
</head>
<body style="background-color:#bbdefb">
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" style="color:gray;">WAD Beauty</a>
    <form action="" class="form-inline">
        <a class="nav-link" href="login.php" style="color:gray;">Login</a>
        <a class="nav-link" href="register.php" style="color:gray;">Register</a>
    </form>
</nav>
<?php

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
      <button type="submit" class="btn btn-primary" style="margin-left:50%;margin-top:20px">Sign in</button>
    </div>
  </div>
</form>
</div>
</div>

</div>
</body>
</html>