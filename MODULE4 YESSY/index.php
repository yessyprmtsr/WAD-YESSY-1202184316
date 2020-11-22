<?php
session_start();
//session index
if(!isset($_SESSION['login'])) {
  header('location:login.php');
}
$nama = $_SESSION['nama']; 
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>WAD Beauty Home Store</title>
</head>

<body>
    <!-- Navbar -->
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
                    <div style="margin-left: 100px;" class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    include_once('controller.php');
    $database = new database();
    if(isset($_GET['id'])){
    $id = $_GET['id'];;
    if($id == "1"){
        $nama_barang    = "YUJA NIACIN 30 DAYS BLEMISH CARE SERUM";
        $harga = 169000;
    } elseif ($id == "2") {
        $nama_barang = "SOMEBYMI Snail Truecica Miracle Repair Cream";
        $harga = 180000;
    } else {
        $nama_barang = "30 DAYS MIRACLE TONER";
        $harga = 108000;
    }
        if($database->addCart($user_id,$nama_barang,$harga)) {
            echo 
            "<div class='alert alert-warning'>
            <strong>Success!</strong> Berhasil Ditambahkan ke Cart.
            </div>";
          echo "<script>setTimeout(function() {window.location.href='cart.php'}, 1000);</script>";
        } else {
            echo "<div class='alert alert-danger'>
            <strong>Failed!</strong> Gagal Ditambahkan ke Cart.
            </div>";
            echo "<script>setTimeout(function() {window.location.href='index.php'}, 1000);</script>";
        }
    }
    ?>
    <!-- Container -->
    <div class="container" align="center">
        <div class="col-md-12 mt-3 mb-3" align="left">
            <div class="card-group">
                <div class="card" style="background-image: linear-gradient(to right, #00e5ff , #1de9b6, #ffeb3b);">
                    <div class="card-body" align="center">
                        <h1>WAD Beauty</h1>
                        <p><b>Tersedia Skin Care dengan harga murah tapi bukan murahan dan berkualitas</b></p>
                    </div>
                </div>
            </div>
            <div class="card-group">
                <div class="card">
                    <img class="card-img-top img-fluid" src="images/yuja.jpg" alt="Card image cap">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h5 class="card-title">YUJA NIACIN 30 DAYS BLEMISH CARE SERUM</h5>
                                <p class="card-text">Produk terbaru dari somebymi yang memiliki manfaat untuk Whitening
                                    + blemish care + Anti-wrinkle, sangat recomended untuk masalah kulit kusam, kulit
                                    kering dan bekas jerawat atau FLEK hitam.</p>
                            </li>
                            <li class="list-group-item">
                                <p>Rp169.000</p>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="index.php?id=1" class="btn btn-primary col-md-12">Tambahkan ke Keranjang</a>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top img-fluid" src="images/snail.jpg" alt="Card image cap">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h5 class="card-title">SOMEBYMI Snail Truecica Miracle Repair Cream</h5>
                                <p class="card-text">Sebagai pelembab, krim ini mampu memberikan kelembapan yang
                                    menyeluruh dan tahan lama bagi kulit, sehingga terasa halus, lembap dan kenyal.
                                    Mencerahkan, menghambat penuaan seperti keriput dan garis halus, juga menenangkan
                                    kulit yang iritasi, dengan kandungan 420.000ppm Snail Truecica.</p>
                            </li>
                            <li class="list-group-item">
                                <p>Rp180.000</p>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="index.php?id=2" class="btn btn-primary col-md-12">Tambahkan ke Keranjang</a>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top img-fluid" src="images/some.jpg" alt="Card image cap">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h5 class="card-title">30 DAYS MIRACLE TONER</h5>
                                <p class="card-text">Dengan kandungan AHA, BHA dan PHA bekerja secara efektif untuk
                                    membuat kulit lebih bersih dan lebih bersinar, mengandung 10.000ppm ekstrak pohon
                                    teh alami yang secara efektif meningkatkan elastisitas dan menutrisi kulit Anda
                                    tanpa efek iritasi karena tidak mengandung 20 bahan 500 dan pewarna berbahaya.</p>
                            </li>
                            <li class="list-group-item">
                                <p>Rp108.000</p>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="index.php?id=3" class="btn btn-primary col-md-12">Tambahkan ke Keranjang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>