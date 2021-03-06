<?php
require 'controller.php';
if(isset($_POST["submit"])){
if(create($_POST) > 0){
    echo "
    <div class='alert alert-success'>
    <strong>Success!</strong> Data successfully has been created.
    </div>
    ";
    header("location:home.php");
}else{
    echo "
    <div class='alert alert-danger'>
    <strong>Success!</strong> Data failed to created.
    </div>
    ";
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand">EAD EVENTS</a>
    <div class="form-inline">
        <a class="nav-link" href="home.php" style="color:white;">Home</a>
        <a class="btn btn-outline-light" href="create_event.php" type="submit">Buat Event</a>
    </div>
</nav>
<!-- form kontainer -->
<div class="container">
    <h4 style="color: dodgerblue;margin-top:20px">Buat Event!</h4>
    <div class="row">
                <div class="col-lg-6">
                    <div class="card" style="height: 100%;">
                        <div class="card-header" style="background-color: firebrick;">
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                            <div class="form-group">
                                <label><b>Name</b></label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label><b>Deskripsi</b></label>
                                <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label><b>Upload Gambar</b></label>
                                <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="inputGroupFile02">
                                    <label class="custom-file-label" for="inputGroupFile02"></label>
                                </div>
                            </div>
                            <div>
                                <label><b>Kategori</b></label>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="radio" name="kategori"  value="Online">
                                <label class="form-check-label" >
                                    Online&emsp;&emsp;&emsp;&emsp;
                                </label>
                                <input class="form-check-input" type="radio" name="kategori" value="Offline">
                                <label class="form-check-label" >
                                    Offline
                                </label>
                            </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header" style="background-color:dodgerblue;">
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label><b>Tanggal</b></label>
                            <input type="date" class="form-control" name="tanggal">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label><b>Jam Mulai</b></label>
                                <input type="time" class="form-control" name="mulai">
                            </div>
                            <div class="col">
                                <label><b>Jam Berakhir</b></label>
                                <input type="time" class="form-control" name="berakhir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><b>Tempat</b></label>
                            <input type="text" class="form-control" name="tempat">
                        </div>
                        <div class="form-group">
                            <label><b>Harga</b></label>
                            <input type="text" class="form-control" name="harga">
                        </div>
                        <div>
                            <label><b>Benefit</b></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Snack" name="benefit[]">
                            <label class="form-check-label">Snack</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Sertifikat" name="benefit[]">
                            <label class="form-check-label">Sertifikat</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Souvenir" name="benefit[]">
                            <label class="form-check-label">Souvenir</label>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary mr-3" name="submit">Submit</button>
                            <button type="reset" class="btn btn-danger float-lg-right">Cancel</button>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
            </div>
</div>
<script>
    $('#inputGroupFile02').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
            })
    </script>
</body>
</html>