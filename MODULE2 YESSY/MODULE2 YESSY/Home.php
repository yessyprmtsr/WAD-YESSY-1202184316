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
<div class="container" style="padding-top: 10px;">
    <h2 style="text-align: center;">EAD Hotel</h2>
    <h4 style="text-align: center;">Welcome To 5 Star Hotel</h4>
    <form action="Booking.php" method="post">
    <div class="justify-center row" style="padding-top: 40px;">
    <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card" style="width: 18rem;">
        <img src="image/hotels.jpg" class="card-img-top" alt="..." height="100%">
        <div class="card-body">
            <h4 style="text-align: center;">Standard</h4>
            <h5 style="text-align: center; color:steelblue">$90/Day</h5>
            <div class="card-header" style="text-align: center; margin-top: 40px;">
                Facilities
            </div>
            <ul class="list-group list-group-flush" style="text-align: center;">
                <li class="list-group-item">1 Single Bed</li>
                <li class="list-group-item">1 Bathroom</li>
            </ul>
            <div class="card-footer" style="text-align: center;">
            <button name="buttonBook1" class="btn btn-primary">Book Now</button>
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card" style="width: 18rem;">
        <img src="image/hotelsup.jpg" class="card-img-top" alt="..." height="190px">
        <div class="card-body">
            <h4 style="text-align: center;">Superior</h4>
            <h5 style="text-align: center; color:steelblue">$150/Day</h5>
            <div class="card-header" style="text-align: center; margin-top: 40px;">
                Facilities
            </div>
            <ul class="list-group list-group-flush" style="text-align: center;">
                <li class="list-group-item">1 Double Bed</li>
                <li class="list-group-item">1 Television and Wi-Fi</li>
                <li class="list-group-item">1 Bathroom with hot water</li>
            </ul>
            <div class="card-footer" style="text-align: center;">
            <button name="buttonBook2" class="btn btn-primary">Book Now</button>
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card" style="width: 18rem;">
        <img src="image/hotellux.jpg" class="card-img-top" alt="..." height="190px">
        <div class="card-body">
            <h4 style="text-align: center;">Luxury</h4>
            <h5 style="text-align: center; color:steelblue">$200/Day</h5>
            <div class="card-header" style="text-align: center; margin-top: 40px;">
                Facilities
            </div>
            <ul class="list-group list-group-flush" style="text-align: center;">
                <li class="list-group-item">2 Double Bed</li>
                <li class="list-group-item">2 Bathroom with hot water</li>
                <li class="list-group-item">1 Kitchen</li>
                <li class="list-group-item">1 Television and Wi-Fi</li>
                <li class="list-group-item">1 Workroom</li>
            </ul>
            <div class="card-footer" style="text-align: center;">
            <button name="buttonBook3" class="btn btn-primary">Book Now</button>
            </div>
        </div>
        </div>
    </div>
    </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>