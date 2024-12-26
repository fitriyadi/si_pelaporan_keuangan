<?php
session_start();
// include autoloader
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';
require_once '../setting/helper_excel.php';

require_once '../PhpSpreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//Get Data
$judul=$_SESSION['laporan']['judul'];
$periode=$_SESSION['laporan']['periode'];
$unit=$_SESSION['laporan']['unit'];
$usaha=$_SESSION['laporan']['usaha'];
$sql=$_SESSION['laporan']['sql'];

// Membuat Spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();


//Judul
$sheet->setCellValue('A1', $judul);
$sheet->mergeCells('A1:I1'); // Menggabungkan sel A1 hingga D1
applyCellStyle($sheet,'A1',true,14);

$sheet->setCellValue('A2', $unit);
$sheet->mergeCells('A2:I2'); // Menggabungkan sel A1 hingga D1
applyCellStyle($sheet,'A2',true,12);

$sheet->setCellValue('A3', $usaha);
$sheet->mergeCells('A3:I3'); // Menggabungkan sel A1 hingga D1
applyCellStyle($sheet,'A3',true,12);

$sheet->setCellValue('A4', $periode);
$sheet->mergeCells('A4:I4'); // Menggabungkan sel A1 hingga D1
applyCellStyle($sheet,'A4',true,12);


//Header
$sheet->setCellValue('A' . 6, "No Transaksi");
$sheet->setCellValue('B' . 6, "Tanggal");
$sheet->setCellValue('C' . 6, "Usaha");
$sheet->setCellValue('D' . 6, "Keterangan");
$sheet->setCellValue('E' . 6, "Kode Akun");
$sheet->setCellValue('F' . 6, "Index");
$sheet->setCellValue('G' . 6, "Debet");
$sheet->setCellValue('H' . 6, "Kredit");
$sheet->setCellValue('I' . 6, "Saldo");

applyHeaderStyle($sheet,"A6:I6",true);
// Menambahkan data ke spreadsheet
$saldo      =0;
$debelAll   =0;
$kreditAll  =0;
$row        = 7;
$query      = $sql;
$result     = $mysqli->query($query);
$num_result = $result->num_rows;
if ($num_result > 0) {

    while ($data = mysqli_fetch_assoc($result)) {
        extract($data);
        $saldo+=$debet;
        $saldo-=$kredit;

        $sheet->setCellValue('A' . $row, $id_transaksi);
        $sheet->setCellValue('B' . $row, tgl_indo($tanggal));
        $sheet->setCellValue('C' . $row, $nama_kegiatan);
        $sheet->setCellValue('D' . $row, $keterangan);
        $sheet->setCellValue('E' . $row, $kode_akun);
        $sheet->setCellValue('F' . $row, $id_index);
        $sheet->setCellValue('G' . $row, number_format($debet,0));$debelAll+=$debet;
        $sheet->setCellValue('H' . $row, number_format($kredit,0));$kreditAll+=$kredit;
        $sheet->setCellValue('I' . $row, number_format($saldo,0));

        applyDataStyle($sheet, "A$row:I$row", ['G' => 'right', 'H' => 'right', 'I' => 'right'],false);
        $row++;
    }

        $sheet->setCellValue('A' . $row, "Total");
        $sheet->setCellValue('B' . $row, "-");
        $sheet->setCellValue('C' . $row, "-");
        $sheet->setCellValue('D' . $row, "-");
        $sheet->setCellValue('E' . $row, "-");
        $sheet->setCellValue('F' . $row, "-");
        $sheet->setCellValue('G' . $row, number_format($debelAll,0));
        $sheet->setCellValue('H' . $row, number_format($kreditAll,0));
        $sheet->setCellValue('I' . $row, "-");

        applyDataStyle($sheet, "A$row:I$row", ['G' => 'right', 'H' => 'right'],true);


}

//Mengatur Lebar Kolom
$sheet->getColumnDimension('A')->setWidth(20); 
$sheet->getColumnDimension('B')->setWidth(30); 
$sheet->getColumnDimension('C')->setWidth(30); 
$sheet->getColumnDimension('D')->setWidth(30); 
$sheet->getColumnDimension('E')->setWidth(10); 
$sheet->getColumnDimension('F')->setWidth(10); 
$sheet->getColumnDimension('G')->setWidth(30); 
$sheet->getColumnDimension('H')->setWidth(30); 
$sheet->getColumnDimension('I')->setWidth(30); 

// Menyimpan file Excel
$writer = new Xlsx($spreadsheet);
$filename = 'laporan_jurnal_umum_unit.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;