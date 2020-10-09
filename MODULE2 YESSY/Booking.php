<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hotel Reservation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-info bg-info align-center">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="Home.php" style="color:darkblue">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Booking.php" style="color:darkblue">Booking</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    <div class="row">
    <div class="col-lg-6">
    <form style="margin-top:20px" action="MyBooking.php" method="POST">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label for="checkdate">Check-in</label>
        <input type="date" class="form-control" name="checkin">
    </div>
    <div class="form-group">
        <label for="duration">Duration</label>
        <input type="number" class="form-control" name="duration" aria-describedby="durationHelp">
        <small id="durationHelp" class="form-text text-muted">Day(s)</small>
    </div>
    <div class="form-group">
        <label for="roomtype">Room Type</label>
        <?php
                    if(isset($_POST['buttonBook1'])){
                        echo '<select class="custom-select mr-sm-2" id="room" disabled>';
                        echo '<option value="standard">Standard</option>';
                        echo '<input type="hidden" name="room" value="standard">';
                        echo '</select>';
                    }else if(isset($_POST['buttonBook2'])){
                        echo '<select class="custom-select mr-sm-2" name="room" id="room" disabled>';
                        echo '<option value="superior">Superior</option>';
                        echo '<input type="hidden" name="room" value="superior">';
                        echo '</select>';
                    }else if(isset($_POST['buttonBook3'])){
                        echo '<select class="custom-select mr-sm-2" name="room" id="room" disabled>';
                        echo '<option value="luxury">Luxury</option>';
                        echo '<input type="hidden" name="room" value="luxury">';
                        echo '</select>';
                    }
                    else{
                        echo '<select class="custom-select mr-sm-2" name="room" id="room>';
                        echo '<option value="standard">Standard</option>';
                        echo '<option value="standard">Standard</option>';
                        echo '<option value="superior">Superior</option>';
                        echo '<option value="luxury">Luxury</option>';
                        echo '</select>';
                    }
                    ?>
    </div>
    <div class="form-group">
        <label for="services">Add Service(s)</label>
        <small id="durationHelp" class="form-text text-muted">$20/Service</small>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" name="service[]" value="Room Services" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
                Room Service
        </label>
        <br>
        <input class="form-check-input" type="checkbox" name="service[]" value="Breakfast" id="defaultCheck2">
        <label class="form-check-label" for="defaultCheck2">
               Breakfast
        </label>
        </div>
    </div>
    <div class="form-group">
        <label for="number">Phone Number</label>
        <input type="text" class="form-control" name="number">
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-primary btn-md btn-block"></input>
    </div>
    </form>
    </div>
    <div class="col-lg-6">
         <?php
            if(isset($_POST['buttonBook1'])){
                echo '<img src="image/hotels.jpg" style="margin-top:50px" width="600px" height="400px">';
                } else if(isset($_POST['buttonBook2'])){
                    echo '<img src="image/hotelsup.jpg" style="margin-top:50px" width="600px" height="400px">';
                } else if(isset($_POST['buttonBook3'])){
                    echo '<img src="image/hotellux.jpg" style="margin-top:50px" width="600px" height="400px">';
                } else{
                    echo '<img src="image/hotel.jpg" style="margin-top:50px" width="600px" height="400px">';
                }
            ?>
    </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>