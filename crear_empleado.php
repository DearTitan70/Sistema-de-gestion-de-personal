<?php
include 'conexion.php';

// Function to handle response display with modern styling
function displayResponse($success, $message) {
    $statusClass = $success ? 'success' : 'error';
    $iconType = $success ? 'check-circle' : 'exclamation-circle';
    $buttonColor = $success ? '#4CAF50' : '#f44336';
    
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultado del Formulario</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <style>
            * {
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            body {
                background-color: #f9f3e5;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .response-container {
                background-color: white;
                border-radius: 8px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
                padding: 40px;
                text-align: center;
                max-width: 600px;
                width: 90%;
                animation: fadeIn 0.5s ease-in-out;
            }
            .icon {
                font-size: 60px;
                margin-bottom: 20px;
                color: #879683;
            }
            .message {
                font-size: 18px;
                font-weight: 500;
                margin-bottom: 30px;
                color: #333;
            }
            .button {
                display: inline-block;
                padding: 12px 30px;
                background-color: #879683;
                color: white;
                text-decoration: none;
                border-radius: 30px;
                font-weight: 600;
                transition: all 0.3s ease;
                border: none;
                cursor: pointer;
                font-size: 16px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .button:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }
        </style>
    </head>
    <body>
        <div class="response-container">
            <div class="icon">
                <i class="fas fa-{$iconType}"></i>
            </div>
            <div class="message">{$message}</div>
            <button onclick="window.location.href='index.html'" class="button">Volver al inicio</button>
        </div>
    </body>
    </html>
    HTML;
    
    exit;
}

// Function to sanitize and validate input
function sanitizeInput($value) {
    return htmlspecialchars(trim($value));
}

// Function to format date
function formatDate($dateString) {
    if (empty($dateString)) {
        return null;
    }
    return date('Y-m-d', strtotime($dateString));
}

// Function to process active employee form
function processActiveEmployeeForm($conn) {
    // Define the fields for the active employees table
    $campos = [
        'area', 'presupuesto', 'segundos_y_encargados', 'tipo_documento', 'nacionalidad', 'no_identificacion', 
        'nombre', 'ceco', 'cargo', 'tipo_contrato', 'tipo_vinculacion', 'fecha_ingreso', 'ciudad', 'macroproceso',
        'jefe_inmediato', 'fecha_nacimiento', 'cel', 'direccion', 'correo', 'localidad', 'genero', 'nivel_academico',
        'sap', 'tiendas_pareto', 'horario', 'observaciones', 'carpeta', 'otros_salario', 'expedicion_cedula',
        'ciudad_cedula', 'eps', 'caja_de_compensacion', 'cesantias', 'pensiones', 'beneficiarios', 'contacto_emergencia',
        'parentesco', 'numero_emergencia', 'numero_hijos', 'nombre_y_edad_hijos', 'rh', 'codigo_sap', 'talla_camiseta',
        'talla_pantalon', 'taza_de_riesgo', 'dias_incapacidad_accidente_laboral', 'dias_incapacidades', 'dias_ausencia',
        'observacion_SGSST', 'licencias', 'vacaciones', 'salario', 'valor_prestamo', 'valor_libranza', 'valor_premio',
        'observacion_premio', 'beneficio1', 'beneficio2', 'beneficio3', 'beneficio4', 'fecha_induccion', 'fecha_evaluacion_prueba',
        'fecha_evaluacion_desempeño', 'fecha_requisicion', 'fecha_cierre_vacante', 'no_dias_vacante',
        'seguimiento_vacantes', 'solicitudes_legales', 'motivo_disciplinario', 'fecha_aceptacion', 'fecha_citacion', 'fecha_diligencia',
        'fecha_cierre', 'accion_disciplinaria', 'concepto_final', 'observaciones_adicionales', 'estado', 'responsable', 'codigo_ceco'
    ];

    // Process the form values
    $valores = [];
    foreach ($campos as $campo) {
        $valores[$campo] = isset($_POST[$campo]) && $_POST[$campo] !== '' ? sanitizeInput($_POST[$campo]) : null;
    }

    // Convert data types
    $valores['no_identificacion'] = !empty($valores['no_identificacion']) ? (int) $valores['no_identificacion'] : null;
    $valores['cel'] = !empty($valores['cel']) ? (int) $valores['cel'] : null;
    
    // Format dates
    $dateFields = [
        'fecha_nacimiento', 'fecha_ingreso', 'fecha_induccion', 'fecha_evaluacion_prueba', 
        'fecha_evaluacion_desempeño', 'fecha_requisicion', 'fecha_cierre_vacante', 
        'fecha_aceptacion', 'fecha_citacion', 'fecha_diligencia', 'fecha_cierre'
    ];
    
    foreach ($dateFields as $dateField) {
        $valores[$dateField] = !empty($valores[$dateField]) ? formatDate($valores[$dateField]) : null;
    }

    // Prepare and execute SQL query
    return insertIntoDatabase($conn, 'empleados_activos', $valores);
}

// Function to process retired employee form
function processRetiredEmployeeForm($conn) {
    // Define the fields for retired employees
    $campos = [
        'no_identificacion', 'nombre', 'ceco', 'cargo', 'tipo_contrato', 'tipo_vinculacion', 'fecha_ingreso', 'ciudad', 'macroproceso',
        'jefe_inmediato', 'fecha_nacimiento', 'cel', 'direccion', 'correo', 'genero', 'nivel_academico', 'codigo_ceco', 'sap', 'tiendas_pareto',
        'horario', 'fecha_retiro', 'motivo_retiro', 'observaciones', 'ultima_novedad', 'detalles', 'liquidacion', 'planilla_retiro'
    ];

    // Create values array from the prefixed form fields
    $valores = [];
    foreach ($campos as $campo) {
        $formField = 'r_' . $campo;
        $valores[$campo] = isset($_POST[$formField]) && $_POST[$formField] !== '' ? sanitizeInput($_POST[$formField]) : null;
    }

    // Convert data types
    $valores['no_identificacion'] = !empty($valores['no_identificacion']) ? (int) $valores['no_identificacion'] : null;
    $valores['cel'] = !empty($valores['cel']) ? (int) $valores['cel'] : null;
    
    // Format dates
    $dateFields = ['fecha_nacimiento', 'fecha_ingreso', 'fecha_retiro'];
    foreach ($dateFields as $dateField) {
        $valores[$dateField] = !empty($valores[$dateField]) ? formatDate($valores[$dateField]) : null;
    }

    // Prepare and execute SQL query
    return insertIntoDatabase($conn, 'empleados_retirados', $valores);
}

// Function to insert data into database
function insertIntoDatabase($conn, $tableName, $valores) {
    $columnas = implode(", ", array_keys($valores));
    $placeholders = implode(", ", array_fill(0, count($valores), "?"));
    $sql = "INSERT INTO $tableName ($columnas) VALUES ($placeholders)";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        // Generate types for bind_param - all as strings for simplicity
        $tipos = str_repeat("s", count($valores));
        $valoresArray = array_values($valores);

        // Bind parameters
        $stmt->bind_param($tipos, ...$valoresArray);

        // Execute query
        $result = $stmt->execute();
        $errorMessage = $stmt->error;
        $stmt->close();
        
        if ($result) {
            return [true, "Registro insertado correctamente en la base de datos."];
        } else {
            return [false, "Error al procesar el registro: " . $errorMessage];
        }
    } else {
        return [false, "Error al preparar la consulta: " . $conn->error];
    }
}

// Main process logic
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['estado']) && $_POST['estado'] == "activo") {
            list($success, $message) = processActiveEmployeeForm($conn);
        } elseif (isset($_POST['estado']) && $_POST['estado'] == "retirado") {
            list($success, $message) = processRetiredEmployeeForm($conn);
        } else {
            $success = false;
            $message = "Tipo de formulario no reconocido.";
        }
        
        // Close database connection
        if (isset($conn) && $conn) {
            $conn->close();
        }
        
        // Display response
        displayResponse($success, $message);
    }
} catch (Exception $e) {
    displayResponse(false, "Ha ocurrido un error inesperado: " . $e->getMessage());
}
?>