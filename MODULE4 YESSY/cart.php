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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Beauty</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                    <div style="margin-left: 100px;" class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" align="center">
        <div class="row">
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="" method="POST">
                    <?php 
                    $no = 1;
                    $totalCart = 0;
                    $items = $database->cartItems($user_id);
                    foreach($items as $row)
                    {
                        echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$row['nama_barang']."</td>";
                        echo "<td>".$row['harga']."</td>";
                        $totalCart += $row['harga'];
                        echo "<td><a class='btn btn-danger' href='delete.php?id=".$row['id']."'>Hapus</a></td>";
                        echo "</tr>";
                        $no++;
                    }
                    echo "<tr>";
                    echo "<td colspan='2'>".'<b>Total</b>'."</td>";
                    echo "<td>".'<b>'.$totalCart.'</b>'."</td>";
                    echo "<td>".''."</td>";
                    echo "</tr>";
                    ?>
                   
                    </form>
                </tbody>
            </table>
        </div>
        <p class="mt-4 mb-3 text-muted text-center">&copy; 2020 Copyright: <a href="#" style="color: primary;">WAD Beauty</a></p>
    </div>
</body>

</html>