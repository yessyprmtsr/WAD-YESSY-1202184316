<?php
require 'controller.php';
$id = $_GET['id'];
//untuk hapus
if(delete($id) > 0){
    echo "<script>
        alert('Data telah dihapus!');
        document.location.href = 'home.php';
    </script>
";
}else{
    echo "
    <script>
        alert('Data belum dihapus!');
        document.location.href = 'Home.php';
    </script>
";
}

?>