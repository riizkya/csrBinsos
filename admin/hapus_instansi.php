<?php
include '../config/koneksi.php';
    mysqli_query($kon,"UPDATE instansi SET stts = '0' WHERE kd_dinas = $_GET[id];");
    header('location:index.php?menu=instansi');
 ?>
