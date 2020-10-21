<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark">Laporan Neraca [<?=caridata($mysqli,"select nama_unit from tb_unit where id_unit='".$_SESSION['id']."'")?>]</h1>
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
          <h3 class="card-title primary"> Informasi Laporan Neraca</h3>
          <div class="card-tools">
          </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <?php
          $id_unit=$_SESSION['id'];
          if(isset($_POST['par1'])){
           $par1=$_POST['par1'];
           $par2=$_POST['par2'];

         }else{
          $par1="";
          $par2="";
        }
        ?>
        <form role="form" id="quickForm" action="?hal=lap_neraca" method="post">
          <div class="form-group row">
            <label  for="nama" class="col-2 m-2">Periode Tanggal</label>

            <input type="date" name="par1" class="form-control col-2" value="<?=@$par1?>" required="">
            <input type="date" name="par2" class="form-control col-2" value="<?=@$par2?>" required="">
            <div class="col-4">
              <input type="submit" name="proses" class="btn btn-primary" style="float: right" value="Proses">
            </div>
          </div>
        </form>

        <hr>

        <?php if(isset($_POST['par1'])){ ?>
          <h3>Aktifa</h3>
          <table class="table table-bordered table-hover">
           <tr>
            <th colspan="4">Aktifa Lancar</th>
          </tr>
          <?php
          $kreditall=0;
          $queryz      = "SELECT * from tb_transaksi join tb_akun using(kode_akun) where tb_akun.kode_akun like '1-1%' and id_unit='$id_unit' and (tanggal between '$par1' and '$par2')";

          $resultz     = $mysqli->query($queryz);
          $num_resultz = $resultz->num_rows;
          if ($num_resultz > 0) {

            while ($dataz = mysqli_fetch_assoc($resultz)) {
              $kreditall+=$dataz['kredit'];
              ?>
              <tr>
               <td width="10%"><?php echo $dataz['kode_akun']; ?></td>
               <td width="50%"><?php echo $dataz['nama_akun']; ?></td>
               <td width="20%"><?php echo number_format($dataz['kredit'],0); ?></td>
             </tr>
           <?php }} ?>
           <tr>
            <th colspan="4">Aktifa Tetap</th>
          </tr>
          <?php
          $queryz      = "SELECT * from tb_transaksi join tb_akun using(kode_akun) where tb_akun.kode_akun like '1-2%' and id_unit='$id_unit' and (tanggal between '$par1' and '$par2')";
          $resultz     = $mysqli->query($queryz);
          $num_resultz = $resultz->num_rows;
          if ($num_resultz > 0) {

            while ($dataz = mysqli_fetch_assoc($resultz)) {
              $kreditall+=$dataz['kredit'];
              ?>
              <tr>
               <td width="10%"><?php echo $dataz['kode_akun']; ?></td>
               <td width="50%"><?php echo $dataz['nama_akun']; ?></td>
               <td width="20%"><?php echo number_format($dataz['kredit'],0); ?></td>
             </tr>
           <?php }} ?>
           <tr>
             <th colspan="3">Total Aktifa</th>
             <th><?=number_format(($kreditall),0)?></th>
           </tr>
         </tbody>
       </table>

       <h3>Pasiva</h3>
       <table class="table table-bordered table-hover">
        <?php
        $debetall=0;
        $queryz      = "SELECT * from tb_transaksi join tb_akun using(kode_akun) where tb_akun.kode_akun like '2%' and id_unit='$id_unit' and (tanggal between '$par1' and '$par2')";
        $resultz     = $mysqli->query($queryz);
        $num_resultz = $resultz->num_rows;
        if ($num_resultz > 0) {

          while ($dataz = mysqli_fetch_assoc($resultz)) {
            $debetall+=$dataz['kredit'];
            ?>
            <tr>
             <td width="10%"><?php echo $dataz['kode_akun']; ?></td>
             <td width="50%"><?php echo $dataz['nama_akun']; ?></td>
             <td width="20%"><?php echo number_format($dataz['kredit'],0); ?></td>
           </tr>
         <?php }} ?>
         <tr>
           <th colspan="3">Total Pasifa</th>
           <th><?=number_format(($debetall),0)?></th>
         </tr>
       </tbody>
     </table>


   <?php } ?>

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

