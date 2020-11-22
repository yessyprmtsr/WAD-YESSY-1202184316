<?php
session_start();
include_once('controller.php');
$database = new database();
//session index
if(!isset($_SESSION['login'])) {
  header('location:login.php');
}
$nama = $_SESSION['nama']; 
$user_id = $_SESSION['user_id'];
if(isset($_SESSION['user_id']) !=""){
    $profile =  mysqli_fetch_array($database->userDisplay($_SESSION['user_id']));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-<?= $_COOKIE['navbarColor']?> text-dark">
        <a class="navbar-brand" href="index.php">WAD Beauty</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li>
                    <a href="cart.php" style="color:black"> <i style="font-size:24px;margin-top:9px"
                            class="fa fa-shopping-cart"></i> </a>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Selamat Datang, <i
                            style="color:dodgerblue"> <?=$nama?> </i></a>
                    <div style="margin-left: 30px;" class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    if(isset($_POST['submit'])){
        $navbarColor = $_POST['navbarColor'];
        $nama = $_POST['nama'];
        $_SESSION['nama'] = $_POST['nama'];
        $email = $_SESSION['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $user_id = $_SESSION['user_id'];
        $cookie_name='navbarColor';
        $cookie_value=$_POST['navbarColor'];
        setcookie($cookie_name,$cookie_value);
        if($password==$confirmPassword){
            $password = password_hash($password, PASSWORD_DEFAULT);
            if($database->updateProfile($nama,$phone,$password,$user_id))
        {
            
            echo "  <div class='alert alert-warning'>
            <strong>Success!</strong> Data successfully has been updated.
            </div>";
            echo "<script>setTimeout(function() {window.location.href='profile.php'}, 1000);</script>";
        }else{

            echo "<div class='alert alert-danger'>
            <strong>Failed!</strong> Data failed updated.
            </div>"; 
        }
        }else{
        echo "<div class='alert alert-danger'>
        <strong>Failed!</strong> Password not same.
        </div>";
        }
        
    }
    ?>
    <div class="container">
        <h3 style="text-align: center;margin-top:40px;margin-bottom:20px">Profile</h3>
        <form action="" method="post" style="margin-top:10px">
        <input type="hidden" name="id">
        <div class="form-group row" style="margin-left:15%">
                <label for="exampleFormControlInput1" style="margin-left:15px">E-mail</label>
                <div class="col-lg-9">
                    <label  style="margin-left:80px" name="email"><?=$profile['email']?></label>
                </div>
            </div>
            <div class="form-group row" style="margin-left:15%">
                <label for="exampleFormControlInput1" style="margin-left:15px">Name</label>
                <div class="col-lg-9">
                <input type="text" class="form-control"  style="margin-left:80px" name="nama" placeholder="Masukkan Nama Lengkap" value="<?=$profile['nama']?>">
                </div>
            </div>
            <div class="form-group row" style="margin-left:15%">
                <label for="exampleFormControlInput1" style="margin-left:15px">No. Handphone</label>
                <div class="col-lg-9">
                    <input type="number" class="form-control"  style="margin-left:10px" name="phone" placeholder="Masukkan Nomor Handphone" value="<?=$profile['no_hp']?>">
                </div>
            </div>
            <hr style="margin-left:16%;width: 830px;">
            <div class="form-group row" style="margin-left:15%">
                <label for="exampleFormControlInput1" style="margin-left:15px">Password</label>
                <div class="col-lg-9">
                    <input type="password" style="margin-left:60px" class="form-control" name="password" placeholder="Buat Kata Sandi">
                    <input type="hidden" value="<?=$profile['password']?>">
                </div>
            </div>
            <div class="form-group row" style="margin-left:15%">
                <label for="exampleFormControlInput1" style="margin-left:15px">Password Confirm</label>
                <div class="col-lg-9">
                    <input type="password" class="form-control" name="confirmPassword"
                        placeholder="Konfirmasi Kata Sandi">
                </div>
            </div>
            <div class="form-group row" style="margin-left:15%">
                <label for="exampleFormControlInput1" style="margin-left:15px">Warna Navbar</label>
                <div class="col-lg-9">
                <select name="navbarColor" value="navbarColor" style="margin-left: 28px;" class="form-control form-control-md">
                                <option  <?php if($_COOKIE['navbarColor']=='light'){echo "selected";}?> value="light">Light</option>
                                <option <?php if($_COOKIE['navbarColor']=='dark'){echo "selected";}?> value="dark">Dark</option>
                            </select>
                </div>
            </div>
            <div class="form-group row row">
                    <button type="submit" name="submit" class="btn btn-primary" style="margin-left:17%;width: 830px;">Submit</button>
                    <a href="index.php" class="btn btn-light" style="margin-left:17%;width: 830px;margin-top:10px">Cancel</a>
            </div>
            <p class="mt-4 mb-3 text-muted text-center">&copy; 2020 Copyright: <a href="#" style="color: primary;">WAD Beauty</a></p>
        </form>

    </div>
</body>

</html>