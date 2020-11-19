<?php
require 'controller.php';
//get data semua dulu
$event = read("SELECT * FROM event_table");
$id = $_GET["id"];
//kasih alert dan cek apakah submit
if(isset($_POST["submit"])){
    if(edit($_POST)>0){
        echo "
        <div class='alert alert-success'>
        <strong>Success!</strong> Data successfully has been updated.
        </div>
        ";
    }else{
        echo "
        <div class='alert alert-danger'>
        <strong>Success!</strong> Data failed to updated.
        </div>
        ";
    }
}

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand">EAD EVENTS</a>
    <form action="create_event.php" class="form-inline">
        <a class="nav-link" href="home.php" style="color:white;">Home</a>
        <button class="btn btn-outline-light" type="submit">Buat Event</button>
    </form>
</nav>
<!-- card kontainer -->
<div class="container">
    <h3 style="text-align: center; margin-top:20px;color:dodgerblue; margin-bottom:20px" >DETAIL EAD EVENTS!</h3>
    <div class="row" style="padding-left:28%">
        <div class="col">
            <div class="card"style="width: 30rem;">
                <img src="assets/image/<?= $eventDetail["gambar"]; ?>" class="card-img-top" width="10" height="200">
                <div class="card-body">
                            <h4><?= $eventDetail["nama"]; ?></h4><br>
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
                                <td><i class="fa fa-clock-o" style="color:orange;"></i><?= $eventDetail["mulai"]; ?> - <?= $eventDetail["berakhir"]; ?></td>
                                </tr>
                            </table><br>
                            <p> <b>Category: </b> &emsp; <?= $eventDetail["kategori"]; ?> </p>
                            <p> <b>HTM: Rp. <?= $eventDetail["harga"]; ?> </b></p>
                            
                        </div>
                        <div class="card-footer text-center">
                            <button type="button" href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</button>
                            <button  class="btn btn-danger"><a href="delete.php?id=<?= $eventDetail["id"]; ?>" style="color:white;">Delete</a></button>
                        </div>
                        <!-- modal edit -->
                        <div class="modal fade bd-example-modal-xl" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Content Event</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div class="row">
                            <div class="col-lg-6">
                            <div class="card" style="height: 100%;">
                                <div class="card-header" style="background-color: firebrick;">
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $eventDetail["id"]; ?>">
                            <input type="hidden" name="oldGambar" value="<?= $eventDetail["gambar"]; ?>">
                            <div class="card-body">
                                        <div class="form-group">
                                            <label><b>Name</b></label>
                                            <input type="text" class="form-control" name="nama" value="<?= $eventDetail["nama"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label><b>Deskripsi</b></label>
                                            <textarea class="form-control" name="deskripsi" rows="3"><?= $eventDetail["deskripsi"]; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Upload Gambar</b></label>
                                            <div class="custom-file">
                                                <input type="file" name="gambar" class="custom-file-input"  id="inputGroupFile02">
                                                <label class="custom-file-label"  for="inputGroupFile02"><?= $eventDetail["gambar"]; ?></label>
                                            </div>
                                        </div>
                                        <div>
                                            <label><b>Kategori</b></label>
                                        </div>
                                        <div class="form-check mb-5">
                                            <input class="form-check-input" type="radio" name="kategori"  value="Online" 
                                            <?php if($eventDetail['kategori']=='Online') echo 'checked'; ?>>
                                            <label class="form-check-label" >
                                                Online 
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                            </label>
                                            <input class="form-check-input" type="radio" name="kategori" value="Offline"  
                                            <?php if($eventDetail['kategori']=='Offline') echo 'checked'; ?>>
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
                                        <input type="date" class="form-control" name="tanggal" value="<?= $eventDetail["tanggal"]; ?>">
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label><b>Jam Mulai</b></label>
                                            <input type="time" class="form-control" name="mulai" value="<?= $eventDetail["mulai"]; ?>">
                                        </div>
                                        <div class="col">
                                            <label><b>Jam Berakhir</b></label>
                                            <input type="time" class="form-control" name="berakhir" value="<?= $eventDetail["berakhir"]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Tempat</b></label>
                                        <input type="text" class="form-control" name="tempat" value="<?= $eventDetail["tempat"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Harga</b></label>
                                        <input type="text" class="form-control" name="harga" value="<?= $eventDetail["harga"]; ?>">
                                    </div>
                                    <div>
                                        <label><b>Benefit</b></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="benefit[]" value="Snack" 
                                        <?php if (strpos($eventDetail['benefit'], 'Snack') !== false) echo 'checked';?>>
                                        <label class="form-check-label">Snack</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="benefit[]" value="Sertifikat" 
                                        <?php if (strpos($eventDetail['benefit'], 'Sertifikat') !== false) echo 'checked';?>>
                                        <label class="form-check-label">Sertifikat</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-5">
                                        <input class="form-check-input" type="checkbox" name="benefit[]" value="Souvenir" 
                                        <?php if (strpos($eventDetail['benefit'], 'Souvenir') !== false) echo 'checked';?>>
                                        <label class="form-check-label">Souvenir</label>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" name="submit">Save changes</button>
                        </div>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>

    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    })
    </script>
    <script>
    $('#inputGroupFile02').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
    </script>
            </div>
        </div>
    </div>
</div>
</body>
</html>