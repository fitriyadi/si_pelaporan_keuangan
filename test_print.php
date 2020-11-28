 <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
 
<?php
// include autoloader


require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$data='
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data akun</h1>
      </div><!-- /.col -->
      <div class="col-sm-5">
      </div>
      <div class="col-sm-1">
        <a href="?hal=akun_olah" style="float: right;" class="btn btn-block bg-gradient-primary btn-sm">Tambah</a>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
';

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($data);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>