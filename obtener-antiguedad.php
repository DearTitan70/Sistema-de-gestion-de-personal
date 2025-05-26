<?php
include 'conexion.php';

$sql = "SELECT id, nombre, fecha_ingreso, antiguedad_años, antiguedad_meses, antiguedad_dias FROM vista_antiguedad";
$result = $conn->query($sql);

$empleados_antiguedad = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $empleados_antiguedad[] = [
            "id" => $row["id"], 
            "nombre" => $row["nombre"],
            "fecha_ingreso" => $row["fecha_ingreso"],
            "antiguedad_años" => $row["antiguedad_años"],
            "antiguedad_meses" => $row["antiguedad_meses"],
            "antiguedad_dias" => $row["antiguedad_dias"]
        ];
    }
}

echo json_encode($empleados_antiguedad);
$conn->close();
?>