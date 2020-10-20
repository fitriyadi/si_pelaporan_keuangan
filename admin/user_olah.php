<?php
$username="";
if (isset($_GET['id'])){
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"tb_user","id_user='$kode'"));
}
?>

<!-- Main content -->
<section class="content" style="margin-top: 10px;">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Olah Data User Unit Usaha</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="user_proses.php" method="post">

            <div class="card-body">

              <input type="hidden" name="id_user" value="<?=$id_user;?>">

              <div class="form-group">
                <label for="nama">Unit Usaha</label>
                <select class="form-control select2" name="id_unit">
                  <?php
                  $query="SELECT * from tb_unit";
                  $result=$mysqli->query($query);
                  $num_result=$result->num_rows;
                  if ($num_result > 0 ) { 
                    $no=0;
                    while ($data=mysqli_fetch_assoc($result)) { ?>
                      <option value="<?=$data['id_unit']?>" <?=isselect($data['id_unit'],$id_unit)?>><?=$data['nama_unit']?></option>
                    <?php }
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="nama">Nama User</label>
                <input type="text" name="nama_user" class="form-control" value="<?=@$nama_user?>" placeholder="Inputkan Nama user" required="">
              </div>

              <div class="form-group">
                <label for="nama">Nama Lengkap User</label>
                <input type="text" name="nama_lengkap_user" class="form-control" value="<?=@$nama_lengkap_user?>" placeholder="Inputkan Nama Lengkap user" required="">
              </div>

              <div class="form-group">
                <label for="nama">Username</label>
                <input type="text" name="username" class="form-control" value="<?=@$username?>" placeholder="Inputkan Username" required="">
              </div>

              <div class="form-group">
                <label for="nama">Password</label>
                <input type="text" name="password" class="form-control" value="<?=@$password?>" placeholder="Inputkan Password" required="">
              </div>


            </div>

            <!-- /.card-body -->
            <div class="card-footer">
              <input type="submit" name="<?=isset($_GET['id'])?'ubah':'tambah';?>" 
              class="btn btn-primary" value="Simpan">
              <a href="?hal=user" class="btn btn-default">
                Batal
              </a>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
                      <!-- /.content -->