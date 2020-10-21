<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark">Laporan Arus Kas [<?=caridata($mysqli,"select nama_unit from tb_unit where id_unit='".$_SESSION['id']."'")?>]</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title primary"> Informasi Arus Kas</h3>
          <div class="card-tools">
          </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <?php
          $id_unit=$_SESSION['id'];
          if(isset($_POST['par1'])){
            $par1=$_POST['par1'];
          }else{
            $par1="";
            $where="where id_unit='$id_unit'";
          }
          ?>
          <form role="form" id="quickForm" action="?hal=lap_arus_kas" method="post">
            <div class="form-group row">
              <label  for="nama" class="col-2 m-2">Periode Tahun</label>

              <select class="form-control select2 col-2" name="par1">
                <?php
                $tahunawal=2020;
                $tahunnow=date('Y');
                for ($i=$tahunawal;$i<=$tahunnow; $i++) { 
                  ?>
                  <option value="<?=$tahunawal?>"><?=$tahunnow?></option>
                  <?php
                }
                ?>
              </select>
              <div class="col-4">
                <input type="submit" name="proses" class="btn btn-primary" style="float: right" value="Proses">
              </div>
            </div>
          </form>

          <hr>

          <?php if(isset($_POST['par1'])){
            $query      = "SELECT * from tb_index";
            $result     = $mysqli->query($query);
            $num_result = $result->num_rows;
            if ($num_result > 0) {
              while ($data = mysqli_fetch_assoc($result)) {
                extract($data);
                ?>
                <table id="" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="40%"><?=$keterangan?></th>
                      <th width="20%">Debet</th>
                      <th width="20%">Kredit</th>
                      <th width="20%">#</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $debetall=0;
                    $kreditall=0;
                    $queryz      = "SELECT * from tb_transaksi where id_index ='$id_index' and id_unit='$id_unit' and year(tanggal)='$par1'";
                    $resultz     = $mysqli->query($queryz);
                    $num_resultz = $result->num_rows;
                    if ($num_result > 0) {
                      while ($dataz = mysqli_fetch_assoc($resultz)) {
                        $debetall+=$dataz['debet'];
                        $kreditall+=$dataz['kredit'];
                        ?>
                        <tr>
                          <td><?php echo $dataz['keterangan']; ?></td>
                          <td><?php echo number_format($dataz['debet'],0); ?></td>
                          <td><?php echo number_format($dataz['kredit'],0); ?></td>
                        </tr>
                      <?php }} ?>
                      <th colspan="3"></th>
                      <th><?=number_format(($kreditall-$debetall),0)?></th>
                    </tbody>
                  </table>
                <?php } } } ?>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

