<?php
include 'conexion.php';

$sql = "SELECT id, no_identificacion, nombre, cargo, ceco, cel, direccion, fecha_ingreso, estado, nivel_academico FROM vista_empleados_general";
$result = $conn->query($sql);

$empleados = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $empleados[] = [
            "id" => $row["id"], 
            "no_identificacion" => $row["no_identificacion"],
            "nombre" => $row["nombre"],
            "cargo" => $row["cargo"],
            "ceco" => $row["ceco"],
            "cel" => $row["cel"],
            "direccion" => $row["direccion"],
            "fecha_ingreso" => $row["fecha_ingreso"],
            "estado" => $row["estado"],
            "nivel_academico" => $row["nivel_academico"]
        ];
    }
}

echo json_encode($empleados);
$conn->close();
?>
