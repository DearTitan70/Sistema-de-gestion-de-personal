<?php
include 'conexion.php';

$sql = "SELECT id, nombre, fecha_ingreso, fecha_retiro, permanencia_años, permanencia_meses, permanencia_dias FROM vista_permanencia";
$result = $conn->query($sql);

$empleados_permanencia = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $empleados_permanencia[] = [
            "id" => $row["id"], 
            "nombre" => $row["nombre"],
            "fecha_ingreso" => $row["fecha_ingreso"],
            "fecha_retiro" => $row["fecha_retiro"],
            "permanencia_años" => $row["permanencia_años"],
            "permanencia_meses" => $row["permanencia_meses"],
            "permanencia_dias" => $row["permanencia_dias"]
        ];
    }
}

echo json_encode($empleados_permanencia);
$conn->close();
?>