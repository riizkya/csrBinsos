<?php $dns=$_GET['dns']; $kt=$_GET['kt'];
   include '../config/koneksi.php';
   $subsql1=mysqli_query($kon,"SELECT * FROM dinas where kd_dinas='$_GET[dns]'");
   $subsql2=mysqli_query($kon,"SELECT * FROM kota where kd_kota='$_GET[kt]'");
  // $subsql3=mysql_query("SELECT * FROM bidang");

       $subbc1=mysqli_fetch_row($subsql1);
       $subbc2=mysqli_fetch_row($subsql2);
      // $subbc3=mysql_fetch_row($subsql3);
?>
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
    <h1 class="box-title" style="font-size:150%;">Data Kegiatan <?php echo $subbc1['1']." ".$subbc2['1'];  ?> </h1>
</div>
<!-- Main content -->
<section class="content">
  <div class="row">

          <a href="excel.php?dns=<?php echo $dns;?>&kt=<?php echo $kt;?>" style="color:#595757;float:right;">
          <div class="tab-pane" id="glyphicons">
            <ul class="bs-glyphicons">
              <li>
                    <span class="glyphicon glyphicon-edit"></span>
                    <span class="glyphicon-class">Excel</span>
              </li>
            </ul>
          </div><!-- /#ion-icons -->
          </a>


          <a href="?menu=input_kegiatan&dns=<?php echo $dns;?>&kt=<?php echo $kt;?>" style="color:#595757;float:right;">
          <div class="tab-pane" id="glyphicons">
            <ul class="bs-glyphicons">
              <li>
                    <span class="glyphicon glyphicon-edit"></span>
                    <span class="glyphicon-class">Tambah</span>
              </li>
            </ul>
          </div><!-- /#ion-icons -->
          </a>
          <?php //if (!$note==NULL) {
          ?><div class="alert alert-info alert-dismissable" style="float:right;width:34%;margin:2px -30px 0 0;padding:0 30px 0 0;overflow:hidden">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="position:relative;padding-top:7px;font-size:25px">&times;</button>
              <h4 style="padding:7px 0 0 10px"><i class="icon fa fa-info"></i><?php //echo $note;?></h4>
            </div><?php
          //}?>
          <div style="width:28%;margin:5px 15px 0 5px ;padding:0 30px 0 0;overflow:hidden">
            <font size="4px" style="float:left;padding:10px;"></font>
          </div>
    <div class="col-xs-12">
      <div class="box box-primary" style="padding-top:5px;">
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped" style="font-size:100%">
            <thead>
              <tr>
                <th width="2%">No</th>
                <th>Nama Dinas</th>
                <th>Kota/Kabupaten</th>
                <th>Kegiatan</th>
                <th>Volume</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th width="16%">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $a=1;
                include'../config/koneksi.php';
                $dns=$_GET['dns']; $kt=$_GET['kt'];
                $sql=mysqli_query($kon,"SELECT * FROM Kegiatan where dinas='$_GET[dns]' and kota='$_GET[kt]'");
                while($bc=mysqli_fetch_row($sql)){
                    if (empty($bc)) {
                      echo "data kosong";
                    }else{
                  $subsql1=mysqli_query($kon,"SELECT * FROM dinas where kd_dinas='$bc[1]'");
                  $subsql2=mysqli_query($kon,"SELECT * FROM kota where kd_kota='$bc[3]'");
                  $subsql3=mysqli_query($kon,"SELECT * FROM bidang where kd_bidang='$bc[2]'");

                      $subbc1=mysqli_fetch_row($subsql1);
                      $subbc2=mysqli_fetch_row($subsql2);
                      $subbc3=mysqli_fetch_row($subsql3);
              ?><tr>
                  <td><?php echo $a; $a++;?></td>
                  <td><?php echo $subbc1['1'];?></td>
                  <td><?php echo $subbc2['1']."(".$subbc3['1'].")";?></td>
                  <td><?php echo $bc['4']; //Kegiatan?></td>
                  <td><?php echo $bc['5']; //volume?></td>
                  <td><?php echo $bc['6']; //jumlah?></td>
                  <td><?php echo $bc['7']; //keterangan?></td>
                  <td align="center">
                      <a class="action" href="?menu=edit_kegiatan&kd=<?php echo $bc[0];?>&dns=<?php echo $dns;?>&kt=<?php echo $kt;?>" style="padding:2.3px 4px 2.3px 8px;" >
                        <i class="fa fa-edit" style="color:green;"> </i>Ubah
                      </a>
                      <a class="action" href="hapus_kegiatan.php?id=<?php echo $bc[0];?>&dns=<?php echo $dns;?>&kt=<?php echo $kt;?>">
                        <i class="fa fa-close" style="color:red"> </i>Hapus
                      </a>
                  </td>
                </tr>
              <?php
              }
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
