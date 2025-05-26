<?php
include 'conexion.php';

// Definir el período (último año, por ejemplo)
$fechaInicio = date('Y-m-d', strtotime('-4 year'));
$fechaFin = date('Y-m-d');

// Contar empleados que salieron en el período
$sqlSalidas = "SELECT COUNT(*) as salidas FROM empleados_retirados WHERE fecha_retiro BETWEEN '$fechaInicio' AND '$fechaFin'";
$resultSalidas = $conn->query($sqlSalidas);
$rowSalidas = $resultSalidas->fetch_assoc();
$salidas = (int) $rowSalidas['salidas'];

// Obtener número de empleados al inicio y al final del período
$sqlInicio = "SELECT COUNT(*) as total FROM empleados_activos WHERE fecha_ingreso <= '$fechaInicio'";
$sqlFin = "SELECT COUNT(*) as total FROM empleados_activos WHERE fecha_ingreso <= '$fechaFin'";

$resultInicio = $conn->query($sqlInicio);
$resultFin = $conn->query($sqlFin);

$rowInicio = $resultInicio->fetch_assoc();
$rowFin = $resultFin->fetch_assoc();

$empleadosInicio = (int) $rowInicio['total'];
$empleadosFin = (int) $rowFin['total'];

// Calcular el promedio de empleados en el período
$promedioEmpleados = ($empleadosInicio + $empleadosFin) / 2;

// Calcular la tasa de rotación
$tasaRotacion = ($salidas / $promedioEmpleados) * 100;

// Devolver el resultado como JSON
header('Content-Type: application/json');
echo json_encode(["tasa_rotacion" => round($tasaRotacion, 2)]);
?>
