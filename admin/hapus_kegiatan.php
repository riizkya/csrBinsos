<?php
include '../config/koneksi.php';
    mysqli_query($kon,"DELETE FROM kegiatan where kd_kegiatan='$_GET[id]'");
    header('location:index.php?menu=kegiatan&dns='.$_GET[dns].'&kt='.$_GET[kt]);
 ?>
