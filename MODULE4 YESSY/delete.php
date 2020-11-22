<?php
include_once('controller.php');
$database = new database();
$id = $_GET["id"];
if($database->delete($id) > 0){
    echo "
    <div class='alert alert-warning'>
    <strong>Success!</strong> Data successfully has been deleted.
    </div>
    <script>
        document.location.href = 'cart.php';
    </script>";
}else{
    echo "
    <div class='alert alert-danger'>
    <strong>Failed!</strong> Data failed deleted.
    </div>
    <script>
        document.location.href = 'cart.php';
    </script>";
}
?>