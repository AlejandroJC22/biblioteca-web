<?php
require_once(__DIR__ . '/../../../fpdf/fpdf.php');

class PDF extends FPDF
{
    public $title;

    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('./img/logo.jpg', 10, 4, 30);

        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(70);
        // Título
        $this->Cell(50, 10, $this->title, 0, 0, 'C');
        // Salto de línea
        $this->Ln(30);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Imprimir encabezado de tabla
    function EncabezadoTabla($header, $columnWidths)
    {
        $this->SetFont('Arial', 'B', 12);

        foreach ($header as $i => $col) {
            $this->Cell($columnWidths[$i], 10, utf8_decode($col), 1, 0, 'C', 0);
        }
        $this->Ln();
    }

    // Tabla de datos
    function DatosTabla($data, $columnWidths)
    {
        $this->SetFont('Arial', '', 12);

        foreach ($data as $row) {
            foreach ($row as $i => $col) {
                $this->Cell($columnWidths[$i], 10, utf8_decode($col), 1, 0, 'C', 0);
            }
            $this->Ln();
        }
    }
}

$conn = mysqli_connect("localhost:3306", "root", "", "biblioteca");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$sql_libros = "SELECT * FROM libros";
$resultado_libros = mysqli_query($conn, $sql_libros);

if (!$resultado_libros) {
    die("Error en la consulta de libros: " . mysqli_error($conn));
}

$sql_prestamos = "SELECT * FROM prestamos";
$resultado_prestamos = mysqli_query($conn, $sql_prestamos);

if (!$resultado_prestamos) {
    die("Error en la consulta de préstamos: " . mysqli_error($conn));
}

$pdf = new PDF();
$pdf->AliasNbPages();

// Reporte de libros
$pdf->title = "Biblioteca Distrital";
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->title = "Reporte libros";
$pdf->Cell(0, 10, $pdf->title, 0, 1, 'C');
$pdf->Ln(10);

$header_libros = array('Título', 'Autor', 'Cantidad', 'Estado');
$data_libros = array();
$columnWidths_libros = array(65, 55, 30, 40);

while ($row_libros = $resultado_libros->fetch_assoc()) {
    // Obtener el estado del libro desde la tabla "estado"

    $data_libros[] = array(
        $row_libros['titulo'],
        $row_libros['autor'],
        $row_libros['cantidad'],
        $row_libros['estado'],
    );
}

$pdf->EncabezadoTabla($header_libros, $columnWidths_libros);
$pdf->DatosTabla($data_libros, $columnWidths_libros);

// Reporte de préstamos
$pdf->title = "Biblioteca Distrital";
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->title = utf8_decode("Reporte de préstamos");
$pdf->Cell(0, 10, $pdf->title, 0, 1, 'C');
$pdf->Ln(10);

$header_prestamos = array('Estudiante', 'Libro', 'Cant', 'F. Prestamo', 'F. Devolución', 'Estado');
$data_prestamos = array();
$columnWidths_prestamos = array(40, 60, 12, 30, 30, 20);

while ($row_prestamos = $resultado_prestamos->fetch_assoc()) {
    // Obtener el estado del libro desde la tabla "estado"
    $data_prestamos[] = array(
        $row_prestamos['estudiante'],
        $row_prestamos['libro'],
        $row_prestamos['cantidad'],
        $row_prestamos['fechaPrestamo'],
        $row_prestamos['fechaDevolucion'],
        $row_prestamos['estado'],
    );
}

mysqli_close($conn);

$pdf->EncabezadoTabla($header_prestamos, $columnWidths_prestamos);
$pdf->DatosTabla($data_prestamos, $columnWidths_prestamos);

$pdf->Output();
?>
