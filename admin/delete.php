<?php
require ('functions.php');
$npm = $_GET["npm"];
if(deleted($npm)>0) {
    echo "
    <script>
    alert('Data Berhasil Dihapus');
    document.location.href='index.php';
    </script>
    ";
}else{
    echo "
    <script>
    alert('Data Gagal Dihapus');
    document.location.href='index.php';
    </script>
    ";
    echo mysqli_error($conn);
}
?>