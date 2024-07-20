<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/sg_veterinarias/config/global.php");
require_once(ROOT_DIR . "/model/VeterinariaModel.php");
include(ROOT_CORE . "/fpdf/fpdf.php");

class PDF extends FPDF
{
    function convertxt($p_txt)
    {
        return !is_null($p_txt) ? iconv('UTF-8', 'iso-8859-1', $p_txt) : '';
    }
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, "Reporte Veterinaria", 0, 1, 'C');
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, $this->convertxt("Página ") . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$rpt = new VeterinariaModel();
$records = $rpt->findAll();
$records = $records['DATA'];

$pdf = new PDF('L','mm','A3');
$pdf->AliasNbPages();
$pdf->AddPage('L');

// Cabecera
$pdf->SetFont('Arial', 'B', 12);
$header = array($pdf->convertxt("No."), $pdf->convertxt("Dueño"), $pdf->convertxt("Nombre"), $pdf->convertxt("Mascota"), $pdf->convertxt("Raza"), $pdf->convertxt("Tratamientos"), $pdf->convertxt("Costo"), $pdf->convertxt("Fecha"));
$widths = array(10, 40, 40, 40, 40, 40, 40, 40);
for ($i = 0; $i < count($header); $i++) {
    $pdf->Cell($widths[$i], 7, $header[$i], 1);
}
$pdf->Ln();

// Cuerpo
$pdf->SetFont('Arial', '', 10);
foreach ($records as $row) {
    $pdf->Cell($widths[0], 6, $pdf->convertxt($row['id']), 1);
    $pdf->Cell($widths[1], 6, $pdf->convertxt($row['dueno']), 1);
    $pdf->Cell($widths[2], 6, $pdf->convertxt($row['nombre']), 1);
    $pdf->Cell($widths[3], 6, $pdf->convertxt($row['mascota']), 1);
    $pdf->Cell($widths[4], 6, $pdf->convertxt($row['raza']), 1);
    $pdf->Cell($widths[5], 6, $pdf->convertxt($row['tratamientos']), 1);
    $pdf->Cell($widths[6], 6, $pdf->convertxt($row['costo']), 1);
    $pdf->Cell($widths[7], 6, $pdf->convertxt($row['fecha']), 1);
    $pdf->Ln();
}

$pdf->Output();
?>
