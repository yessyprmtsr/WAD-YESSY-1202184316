<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hotel Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <?php
    //for post
    $name = $_POST['name'];
    $checkin = $_POST['checkin'];
    $roomtype = $_POST['roomtype'];
    $number = $_POST['number'];
    $duration = $_POST['duration'];
    $checkout = date('Y-m-d', strtotime('+'.$duration.'day', strtotime($checkin)));
  
    //for total
    if($roomtype == 'standard'){
      $totalPrice = $duration*90;
    } else if($roomtype == 'superior'){
      $totalPrice = $duration*150;
    } else if($roomtype == 'luxury'){
      $totalPrice = $duration*200;
    }
    //for services
      if(isset($_POST['service'])){
        $service = $_POST['service'];
        $totalFinalPrice = $totalPrice+(20*count($service));
      } else {
        $totalFinalPrice = $totalPrice;
      }
    ?>
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
        <table class="table" style="margin-top:40px">
  <thead>
    <tr>
      <th scope="col">Booking Number</th>
      <th scope="col">Name</th>
      <th scope="col">Check-in</th>
      <th scope="col">Check-out</th>
      <th scope="col">Room Type</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Service</th>
      <th scope="col">Total Price</th>
    </tr>
  </thead>
    <tbody>
    <tr>
      <!-- random -->
      <th scope="row">
        <?php
          echo(rand());
        ?>
      </th>
      <td><?= $name?> </td>
      <td><?= $checkin?></td>
      <td><?= $checkout?></td>
      <td><?= $roomtype?></td>
      <td><?= $number?></td>
      <td>
        <!-- for checkbox -->
        <?php
              if(!empty($_POST['service'])){
                  echo "<ul>";
                  foreach($_POST['service'] as $services){
                      echo "<li> $services </li>";
                  }
                  echo "</ul>";
              } else {
                echo "No-Service";
              }
        ?>
      </td>
      <td>$<?= $totalFinalPrice?></td>
    </tr>
    </tbody>
    </table>
    </div>
    </div>
</body>
</html>