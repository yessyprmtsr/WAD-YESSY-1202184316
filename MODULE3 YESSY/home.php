<?php
require 'controller.php';
$eventHome = read("SELECT * FROM event_table");
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
    <h3 style="text-align: center; margin-top:20px;color:dodgerblue" >WELCOME TO EAD EVENTS!</h3>
    <?php 
        if($eventHome < [0] ){
            echo "No Event Found";
        }
    ?>
    <div class="row">
    <?php
            foreach($eventHome as $data):
        ?>
        <div class="col-lg-4">
            <div class="card"style="width: 18rem;">
                <img src="assets/image/<?= $data["gambar"]; ?>" class="card-img-top" width="50" height="200">
                <div class="card-body">
                    <h4><?= $data["nama"]; ?></h4><br>
                    <p><i class="fa fa-calendar" aria-hidden="true" style="color: orange;"></i>&nbsp;<?= $data["tanggal"]; ?> </p>
                    <p><i class="fa fa-map-marker" aria-hidden="true" style="color: orange;"></i>&nbsp;<?= $data["tempat"]; ?></p>
                    <p> Kategori : <?= $data["kategori"]; ?></p>
                </div>
                <div class="card-footer">
                <button type="button" class="btn btn-primary float-right"><a href="detail.php?id=<?= $data["id"]; ?>" style="color:white;">Detail</a></button>
                </div>
                
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>
</body>
</html>