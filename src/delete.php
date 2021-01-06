<?php

if(isset($_GET['NIK']) && $_GET['NIK'] <> '' ) {

    $stmt = $conn->prepare("DELETE from karyawan where NIK = ?");
    $stmt->bind_param('s',  $_GET['NIK']);
    $stmt->execute();

    $_SESSION['message'] = '<div class="alert alert-success" role="alert">
                <strong>Success !</strong> Data Deleted !
              </div>';
} else {
    $_SESSION['message'] = '<div class="alert alert-danger" role="alert">
                <strong>Error !</strong> NIK not found !
              </div>';
}

header('location:index.php?act=showdata');
?>