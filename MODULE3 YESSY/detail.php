<?php
require 'controller.php';
$id = $_GET['id'];
//ambil data detail per id dan juga ambil di indexnya
$eventDetail  = read("SELECT * FROM event_table where id = $id")[0];
$benefitEvent = explode(',', $eventDetail['benefit']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand">EAD EVENTS</a>
    <form action="create_event.php" class="form-inline">
        <a class="nav-link" href="home.php" style="color:white;">Home</a>
        <button class="btn btn-outline-light" type="submit">Buat Event</button>
    </form>
</nav>
<div class="container">
    <h3 style="text-align: center; margin-top:20px;color:dodgerblue" >DETAIL EAD EVENTS!</h3>
    <div class="row" style="padding-left:28%">
        <div class="col">
            <div class="card"style="width: 30rem;">
                <img src="assets/image/<?= $eventDetail["gambar"]; ?>" class="card-img-top" width="10" height="200">
                <div class="card-body">
                            <h4><?= $eventDetail["name"]; ?></h4><br>
                            <b>Description</b>
                            <p><?= $eventDetail["deskripsi"]; ?></p>
                            <table style="width: 30rem;">
                                <tr>
                                <th>Event Information</th>
                                <th>Benefit</th>
                                </tr>
                                <tr>
                                <td><i class="fa fa-calendar" style="color:orange;"></i>&nbsp;<?= $eventDetail["tanggal"]; ?></td>
                                <td>
                                    <li><?= $eventDetail["benefit"]; ?></li><br>
                                </td>
                                </tr>
                                <tr>
                                <td><p><i class="fa fa-map-marker" style="color:orange;"></i>&nbsp;<?= $eventDetail["tempat"]; ?></td>
                                </tr>
                                <tr>
                                <td><i class="fa fa-clock-o" style="color:orange;"></i>&nbsp;<?= $eventDetail["mulai"]; ?> - <?= $eventDetail["berakhir"]; ?></td>
                                </tr>
                            </table><br>
                            <p> <b>Category: </b> &emsp; <?= $eventDetail["kategori"]; ?> </p>
                            <p> <b>HTM: Rp. <?= $eventDetail["harga"]; ?> </b></p>
                            
                        </div>
                        <div class="card-footer text-center">
                            <button type="button" href="#" class="btn btn-primary pr-md-5 pl-sm-5 mr-md-3" data-toggle="modal" data-target="#staticBackdrop">Edit</button>
                            <button  class="btn btn-danger"><a href="delete.php?id=<?= $eventDetail["id"]; ?>" style="color:white;">Delete</a></button>
                        </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>