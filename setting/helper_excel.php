<?php
function applyCellStyle($sheet, $cellRange, $bold = false, $fontSize = 12, $alignment = 'center') {
    $horizontalAlignment = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
    
    if ($alignment === 'left') {
        $horizontalAlignment = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT;
    
    } elseif ($alignment === 'right') {
        $horizontalAlignment = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT;
    }

    $sheet->getStyle($cellRange)->applyFromArray([
        'font' => [
            'bold' => $bold,
            'size' => $fontSize,
        ],
        'alignment' => [
            'horizontal' => $horizontalAlignment,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);
}

function applyHeaderStyle($sheet, $range, $bold=false) {
    $headerStyle = [
        'font' => [
            'bold' => $bold, // Membuat teks bold
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Rata tengah
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // Rata tengah vertikal
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, // Garis tipis
                'color' => ['argb' => 'FF000000'], // Warna garis hitam
            ],
        ],
        'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, // Latar belakang solid
            'startColor' => [
                'argb' => 'FFCCCCCC', // Warna abu-abu
            ],
        ],
    ];

    $sheet->getStyle($range)->applyFromArray($headerStyle);
    
}

function applyDataStyle($sheet, $range, $columnAlignment = [], $bold=false) {
    // Gaya dasar untuk isi data
    $dataStyle = [
        'font' => [
            'bold' => $bold, // Tidak bold
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, // Garis tipis
                'color' => ['argb' => 'FF000000'], // Warna garis hitam
            ],
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // Rata tengah vertikal
        ],
    ];

    $sheet->getStyle($range)->applyFromArray($dataStyle);

    // Atur alignment khusus untuk kolom tertentu
    foreach ($columnAlignment as $column => $alignment) {
        $horizontalAlignment = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT; // Default rata kiri
        if ($alignment === 'center') {
            $horizontalAlignment = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
        } elseif ($alignment === 'right') {
            $horizontalAlignment = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT;
        }
        $sheet->getStyle("$column" . substr($range, 1))->getAlignment()->setHorizontal($horizontalAlignment);
    }
}
?>