<?php
include 'conexion.php';

$data = [
    "areas" => [],
    "conteos" => [],
    "tiempo_promedio" => null,
    "tasa_rotacion" => null
];

// Consulta para obtener la distribución de empleados por área
$sql_areas = "SELECT area, COUNT(*) as conteo 
              FROM empleados_activos 
              GROUP BY area 
              ORDER BY conteo DESC";

$result_areas = $conn->query($sql_areas);

if ($result_areas === FALSE) {
    throw new Exception("Error en la consulta: " . $conn->error);
}

if ($result_areas->num_rows > 0) {
    while ($row = $result_areas->fetch_assoc()) {
        $data["areas"][] = $row["area"];
        $data["conteos"][] = (int)$row["conteo"];
    }
}

// Consulta para calcular el tiempo promedio de permanencia
$sql_permanencia = "SELECT AVG(DATEDIFF(fecha_retiro, fecha_ingreso)) as promedio_dias 
                    FROM vista_permanencia 
                    WHERE fecha_retiro IS NOT NULL";

$result_permanencia = $conn->query($sql_permanencia);

if ($result_permanencia === FALSE) {
    throw new Exception("Error en la consulta de permanencia: " . $conn->error);
}

if ($row = $result_permanencia->fetch_assoc()) {
    $data["tiempo_promedio"] = round($row["promedio_dias"], 2);
}

// Consulta para calcular la tasa de rotación
$sql_retirados = "SELECT COUNT(*) as total_retirados FROM empleados_retirados";
$sql_activos = "SELECT COUNT(*) as total_activos FROM empleados_activos";

$result_retirados = $conn->query($sql_retirados);
$result_activos = $conn->query($sql_activos);

if ($result_retirados === FALSE || $result_activos === FALSE) {
    throw new Exception("Error en la consulta de rotación: " . $conn->error);
}

$row_retirados = $result_retirados->fetch_assoc();
$row_activos = $result_activos->fetch_assoc();

$total_retirados = (int)$row_retirados["total_retirados"];
$total_activos = (int)$row_activos["total_activos"];

// Evitar división por cero
if ($total_activos > 0) {
    $data["tasa_rotacion"] = round(($total_retirados / $total_activos) * 100, 2);
}

// Cerrar conexión
$conn->close();

// Devolver datos como JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
