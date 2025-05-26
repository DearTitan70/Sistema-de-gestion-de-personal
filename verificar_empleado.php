<?php
// Configuración de la conexión a la base de datos
include 'conexion.php';

// Prevenir problemas con caracteres especiales
header('Content-Type: application/json; charset=utf-8');

// Obtener el ID enviado por la petición
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Array para la respuesta
$response = ['existe' => false];

try {
    // Preparar la consulta (usando prepared statements para mayor seguridad)
    $stmt = $conn->prepare("SELECT id FROM empleados_activos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Verificar si se encontró el empleado
    if ($result->num_rows > 0) {
        $response['existe'] = true;
    }
    
    // Cerrar la conexión
    $stmt->close();
    $conn->close();
    
} catch (Exception $e) {
    // En caso de error, agregar mensaje al array de respuesta
    $response['error'] = $e->getMessage();
}

// Devolver la respuesta como JSON
echo json_encode($response);
?>