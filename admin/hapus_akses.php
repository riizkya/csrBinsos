<?php
include '../config/koneksi.php';
    mysqli_query($kon,"DELETE FROM user where id_user='$_GET[id]'");
    header('location:index.php?menu=akses');
 ?>
