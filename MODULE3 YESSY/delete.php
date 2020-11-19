<?php
require 'controler.php';
$id = $_GET["id"];
if(delete($id) > 0){
    echo "
    <div class='alert alert-success'>
    <strong>Success!</strong> Data successfully has been deleted.
    </div>
    <script>
        document.location.href = 'home.php';
    </script>";
}else{
    echo "
    <div class='alert alert-danger'>
    <strong>Failed!</strong> Data failed deleted.
    </div>
    <script>
        document.location.href = 'home.php';
    </script>";
}
?>