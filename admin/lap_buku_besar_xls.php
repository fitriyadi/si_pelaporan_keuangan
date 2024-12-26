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
$sheet->mergeCells('A1:F1'); // Menggabungkan sel A1 hingga D1
applyCellStyle($sheet,'A1',true,14);

$sheet->setCellValue('A2', $unit);
$sheet->mergeCells('A2:F2'); // Menggabungkan sel A1 hingga D1
applyCellStyle($sheet,'A2',true,12);

$sheet->setCellValue('A3', $usaha);
$sheet->mergeCells('A3:F3'); // Menggabungkan sel A1 hingga D1
applyCellStyle($sheet,'A3',true,12);

$sheet->setCellValue('A4', $periode);
$sheet->mergeCells('A4:F4'); // Menggabungkan sel A1 hingga D1
applyCellStyle($sheet,'A4',true,12);


//Header
$sheet->setCellValue('A' . 6, "No Transaksi");
$sheet->setCellValue('B' . 6, "Tanggal");
$sheet->setCellValue('C' . 6, "Keterangan Transaksi");
$sheet->setCellValue('D' . 6, "Debet");
$sheet->setCellValue('E' . 6, "Kredit");
$sheet->setCellValue('F' . 6, "Saldo");

applyHeaderStyle($sheet,"A6:F6",true);
// Menambahkan data ke spreadsheet
$saldo      = 0;
$debelAll   = 0;
$kreditAll  = 0;
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
        $sheet->setCellValue('C' . $row, $keterangan);
        $sheet->setCellValue('D' . $row, number_format($debet,0));$debelAll+=$debet;
        $sheet->setCellValue('E' . $row, number_format($kredit,0));$kreditAll+=$kredit;
        $sheet->setCellValue('F' . $row, number_format($saldo,0));

        applyDataStyle($sheet, "A$row:F$row", ['D' => 'right', 'E' => 'right', 'F' => 'right']);
        $row++;
    }

        $sheet->setCellValue('A' . $row, "Total");
        $sheet->setCellValue('B' . $row, "-");
        $sheet->setCellValue('C' . $row,"-");
        $sheet->setCellValue('D' . $row, number_format($debelAll,0));$debelAll+=$debet;
        $sheet->setCellValue('E' . $row, number_format($kreditAll,0));$kreditAll+=$kredit;
        $sheet->setCellValue('F' . $row, "-");

        applyDataStyle($sheet, "A$row:F$row", ['D' => 'right', 'E' => 'right'],true);


}

//Mengatur Lebar Kolom
$sheet->getColumnDimension('A')->setWidth(20); 
$sheet->getColumnDimension('B')->setWidth(30); 
$sheet->getColumnDimension('C')->setWidth(50); 
$sheet->getColumnDimension('D')->setWidth(30); 
$sheet->getColumnDimension('E')->setWidth(30); 
$sheet->getColumnDimension('F')->setWidth(30); 

// Menyimpan file Excel
$writer = new Xlsx($spreadsheet);
$filename = 'laporan_buku_besar_unit.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;