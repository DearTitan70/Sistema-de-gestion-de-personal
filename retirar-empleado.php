<?php
include 'conexion.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: No se proporcionó un ID válido.");
}

$id = intval($_GET['id']); // Asegura que el ID sea un número entero

$sql = "SELECT * FROM empleados_activos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$empleado = $result->fetch_assoc();

if (!$empleado) {
    die("Error: El empleado ya se encuentra retirado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $no_identificacion = $_POST['no_identificacion'];
    $nombre = $_POST['nombre'];
    $ceco = $_POST['ceco'];
    $cargo = $_POST['cargo'];
    $tipo_contrato = $_POST['tipo_contrato'];
    $tipo_vinculacion = $_POST['tipo_vinculacion'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $ciudad = $_POST['ciudad'];
    $macroproceso = $_POST['macroproceso'];
    $jefe_inmediato = $_POST['jefe_inmediato'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $cel = $_POST['cel'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $genero = $_POST['genero'];
    $nivel_academico = $_POST['nivel_academico'];
    $codigo_ceco = $_POST['codigo_ceco'];
    $sap = $_POST['sap'];
    $tiendas_pareto = $_POST['tiendas_pareto'];
    $horario = $_POST['horario'];
    $fecha_retiro = $_POST['fecha_retiro'];
    $motivo_retiro = $_POST['motivo_retiro'];
    $observaciones = $_POST['observaciones'];
    $ultima_novedad = $_POST['ultima_novedad'];
    $detalles = $_POST['detalles'];
    $liquidacion = $_POST['liquidacion'];
    $planilla_retiro = $_POST['planilla_retiro'];

$insert_sql = "INSERT INTO empleados_retirados ( 
    no_identificacion, nombre, ceco, cargo, tipo_contrato, tipo_vinculacion, fecha_ingreso,
    ciudad, macroproceso, jefe_inmediato, fecha_nacimiento, cel, direccion, correo, genero,
    nivel_academico, codigo_ceco, sap, tiendas_pareto, horario, fecha_retiro, motivo_retiro, 
    observaciones, ultima_novedad, detalles, liquidacion, planilla_retiro) VALUES ( ?, ?, ?,
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = $conn->prepare($insert_sql);

$stmt->bind_param(
    "sssssssssssssssssssssssssss", 
    $no_identificacion, $nombre, $ceco, $cargo, $tipo_contrato, $tipo_vinculacion, 
    $fecha_ingreso, $ciudad, $macroproceso, $jefe_inmediato, $fecha_nacimiento, 
    $cel, $direccion, $correo, $genero, $nivel_academico, $codigo_ceco, $sap, 
    $tiendas_pareto, $horario, $fecha_retiro, $motivo_retiro, $observaciones, 
    $ultima_novedad, $detalles, $liquidacion, $planilla_retiro
);  

if ($stmt->execute()) {
    $delete_sql = "DELETE FROM empleados_activos WHERE no_identificacion = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("s", $no_identificacion);

    if ($delete_stmt->execute()) {
        header("Location: resultado_retiro.php?mensaje=exito");
    } else {
        header("Location: resultado_retiro.php?mensaje=error&detalle=eliminacion_fallida&" . urlencode($delete_stmt->error));
    }
    $delete_stmt->close();
} else {
    header("Location: resultado_retiro.php?mensaje=error&detalle=" . urlencode($stmt->error));
}

$stmt->close();
$conn->close();
};
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3a6ea5;
            --secondary-color: #34a853;
            --accent-color: #ea4335;
            --light-gray: #f5f5f5;
            --dark-gray: #333;
            --text-color: #424242;
            --border-radius: 8px;
            --box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f0f2f5;
            color: var(--text-color);
            line-height: 1.6;
        }
        
        .page-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .header {
            background-color: white;
            padding: 1rem 2rem;
            box-shadow: var(--box-shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header h1 {
            color: var(--primary-color);
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
            flex: 1;
        }
        
        .card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            padding: 1.5rem;
            font-size: 1.2rem;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .form-section {
            margin-bottom: 2rem;
            border-bottom: 1px solid #eee;
            padding-bottom: 1rem;
        }
        
        .form-section-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary-color);
            display: flex;
            align-items: center;
        }
        
        .form-section-title i {
            margin-right: 0.5rem;
        }
        
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        .grid-item {
            margin-bottom: 1rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark-gray);
        }
        
        input, select, textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 0.95rem;
            transition: var(--transition);
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(66, 133, 244, 0.2);
        }
        
        textarea {
            min-height: 80px;
            resize: vertical;
        }
        
        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            font-size: 0.95rem;
            text-align: center;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #3367d6;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .btn-secondary {
            background-color: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }
        
        .btn-secondary:hover {
            background-color: #f0f8ff;
        }
        
        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .input-group {
            display: flex;
            align-items: center;
        }
        
        .input-group input {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        
        .input-group-addon {
            padding: 0.8rem;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-left: none;
            border-top-right-radius: var(--border-radius);
            border-bottom-right-radius: var(--border-radius);
        }
        
        /* Tabs para organizar secciones */
        .tabs {
            display: flex;
            background: #f5f7fa;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 2rem;
            overflow-x: auto;
        }
        
        .tab {
            padding: 1rem 1.5rem;
            cursor: pointer;
            transition: var(--transition);
            border-bottom: 2px solid transparent;
            white-space: nowrap;
        }
        
        .tab.active {
            border-bottom-color: var(--primary-color);
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .tab:hover:not(.active) {
            background-color: #e9ecef;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: 1fr;
            }
            
            .actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }
        
        /* Estilos para calendario */
        input[type="date"] {
            position: relative;
            padding-right: 40px;
        }
        
        /* Estilo para inputs obligatorios */
        .required::after {
            content: '*';
            color: var(--accent-color);
            margin-left: 4px;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 1.5rem;
            background-color: white;
            border-top: 1px solid #eee;
            margin-top: auto;
        }
        
        /* Animaciones */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .fade-in {
            animation: fadeIn 0.3s ease;
        }
        
        /* Tooltip */
        .tooltip {
            position: relative;
            display: inline-block;
            margin-left: 5px;
        }
        
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 200px;
            background-color: var(--dark-gray);
            color: white;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 0.8rem;
        }
        
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <header class="header">
            <h1><i class="fas fa-users"></i> Sistema de Gestión de Personal</h1>
            <a href="index.html" class="btn btn-secondary">
                <i class="fas fa-home"></i> Inicio
            </a>
        </header>
        
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <span>Retirar empleado</span>
                    <small>ID: <?= $id ?></small>
                </div>
                
                <div class="tabs">
                    <div class="tab active" data-tab="info-personal">
                        <i class="fas fa-user"></i> Información Personal
                    </div>
                    <div class="tab" data-tab="info-laboral">
                        <i class="fas fa-briefcase"></i> Información Laboral
                    </div>
                    <div class="tab" data-tab="logistica">
                        <i class="fas fa-heartbeat"></i> Informacion Logistica
                    </div>
                    <div class="tab" data-tab="retiro">
                        <i class="fas fa-money-bill-wave"></i> Retiro
                    </div>
                    <div class="tab" data-tab="post_retiro">
                        <i class="fas fa-chart-line"></i> Informacion Admin. Post-Retiro
                    </div>
                </div>
                
                <div class="card-body">
                    <form method="post" id="editar-empleado-form">
                        <!-- TAB: Información Personal -->
                        <div class="tab-content active" id="info-personal">
                            <div class="form-section">
                                <div class="grid-container">
                                    <div class="grid-item">
                                            <label class="required">No. Identificación:</label>
                                            <input type="text" name="no_identificacion" value="<?= htmlspecialchars($empleado['no_identificacion']) ?>" required>
                                    </div>

                                    <div class="grid-item">
                                        <label class="required">Nombre Completo:</label>
                                        <input type="text" name="nombre" value="<?= htmlspecialchars($empleado['nombre']) ?>" required>
                                    </div>
                                    <div class="grid-item">
                                        <label>Fecha de nacimiento:</label>
                                        <input type="date" name="fecha_nacimiento" value="<?= ($empleado['fecha_nacimiento'] !== '0000-00-00') ? htmlspecialchars($empleado['fecha_nacimiento']) : '' ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Género:</label>
                                        <select name="genero">
                                            <option value="Masculino" <?= $empleado['genero'] == 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                                            <option value="Femenino" <?= $empleado['genero'] == 'Femenino' ? 'selected' : '' ?>>Femenino</option>
                                            <option value="Otro" <?= $empleado['genero'] == 'Otro' ? 'selected' : '' ?>>Otro</option>
                                        </select>
                                    </div>
                                    <div class="grid-item">
                                        <label class="required">Teléfono celular:</label>
                                        <div class="input-group">
                                            <input type="tel" name="cel" value="<?= htmlspecialchars($empleado['cel']) ?>" required>
                                            <span class="input-group-addon"><i class="fas fa-mobile-alt"></i></span>
                                        </div>
                                    </div>
                                    <div class="grid-item">
                                        <label>Dirección:</label>
                                        <input type="text" name="direccion" value="<?= htmlspecialchars($empleado['direccion']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label class="required">Correo electrónico:</label>
                                        <div class="input-group">
                                            <input type="email" name="correo" value="<?= htmlspecialchars($empleado['correo']) ?>" required>
                                            <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                        </div>
                                    </div>
                                    <div class="grid-item">
                                        <label>Nivel académico:</label>
                                        <input type="text" name="nivel_academico" value="<?= htmlspecialchars($empleado['nivel_academico']) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- TAB: Información Laboral -->
                        <div class="tab-content" id="info-laboral">
                            <div class="form-section">
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label class="required">Cargo:</label>
                                        <input type="text" name="cargo" value="<?= htmlspecialchars($empleado['cargo']) ?>" required>
                                    </div>
                                    <div class="grid-item">
                                        <label>CECO:</label>
                                        <input type="text" name="ceco" value="<?= htmlspecialchars($empleado['ceco']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Código CECO:</label>
                                        <input type="text" name="codigo_ceco" value="<?= htmlspecialchars($empleado['codigo_ceco']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Tipo de contrato:</label>
                                        <select name="tipo_contrato">
                                            <option value= "Obra O Labor" <?= $empleado['tipo_contrato'] == 'Obra O Labor' ? 'selected' : '' ?>>Obra o labor</option>
                                            <option value= "Fijo" <?= $empleado['tipo_contrato'] == 'Fijo' ? 'selected' : '' ?>>Fijo</option>
                                            <option value= "Indefinido" <?= $empleado['tipo_contrato'] == 'Indefinido' ? 'selected' : '' ?>>Indefinido</option>
                                            <option value= "Prestacion de servicios" <?= $empleado['tipo_contrato'] == 'Prestacion de servicios' ? 'selected' : '' ?>>Prestacion de servicios</option>
                                        </select>
                                    </div>
                                    <div class="grid-item">
                                        <label>Tipo de vinculacion:</label>
                                        <select name="tipo_vinculacion">
                                            <option value= "Directo" <?= $empleado['tipo_vinculacion'] == 'Directo' ? 'selected' : '' ?>>Directo</option>
                                            <option value= "Indirecto" <?= $empleado['tipo_vinculacion'] == 'Indirecto' ? 'selected' : '' ?>>Indirecto</option>
                                        </select>
                                    </div>
                                    <div class="grid-item">
                                        <label>Fecha de ingreso:</label>
                                        <input type="date" name="fecha_ingreso" value="<?= htmlspecialchars($empleado['fecha_ingreso']) ?>" >
                                    </div>
                                    <div class="grid-item">
                                        <label>Jefe inmediato:</label>
                                        <input type="text" name="jefe_inmediato" value="<?= htmlspecialchars($empleado['jefe_inmediato']) ?>" >
                                        </div>
                                    <div class="grid-item">
                                        <label>Macroproceso:</label>
                                        <input type="text" name="macroproceso" value="<?= htmlspecialchars($empleado['macroproceso']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>SAP:</label>
                                        <input type="text" name="area" value="<?= htmlspecialchars($empleado['sap']) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-content" id="logistica">
                            <div class="form-section">
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label>Ciudad:</label>
                                        <input type="text" name="ciudad" value="<?= htmlspecialchars($empleado['ciudad']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Tiendas Pareto:</label>
                                        <input type="text" name="tiendas_pareto" value="<?= htmlspecialchars($empleado['tiendas_pareto']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Horario:</label>
                                        <input type="text" name="horario" value="<?= htmlspecialchars($empleado['horario']) ?>">
                                    </div>    
                                </div>
                            </div>
                        </div>   
                        
                        <!-- TAB: Compensación -->
                        <div class="tab-content" id="retiro">
                            <div class="form-section">
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label>Fecha de retiro:</label>
                                        <input type="date" name="fecha_retiro">
                                    </div>
                                    <div class="grid-item">
                                        <label>Motivo de retiro:</label>
                                        <textarea name="motivo_retiro"></textarea>
                                    </div>
                                    <div class="grid-item">
                                        <label>Observaciones:</label>
                                        <textarea name="observaciones"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>    
                            
                        <div class="tab-content" id="post_retiro">
                            <div class="form-section">
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label>Ultima novedad:</label>
                                        <textarea name="ultima_novedad"></textarea>
                                    </div>
                                    <div class="grid-item">
                                        <label>Detalles:</label>
                                        <textarea name="detalles"></textarea>
                                    </div>
                                    <div class="grid-item">
                                        <label>Liquidacion:</label>
                                        <input type="text" name="liquidacion">
                                    </div>
                                    <div class="grid-item">
                                        <label>Planilla de retiro:</label>
                                        <textarea name="planilla_retiro"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <a href="index.html" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Retirar Empleado
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>      
    </div>
    
    <!-- Scripts -->
    <script>
        // Funcionalidad para las pestañas
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remover la clase active de todas las pestañas y contenidos
                    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                    document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                    
                    // Añadir la clase active a la pestaña actual
                    this.classList.add('active');
                    
                    // Activar el contenido correspondiente
                    const tabId = this.getAttribute('data-tab');
                    const tabContent = document.getElementById(tabId);
                    if (tabContent) {
                        tabContent.classList.add('active');
                    } else {
                        console.error(`Tab content with ID "${tabId}" not found`);
                    }
                });
            });

            // Validación del formulario antes de enviar
            const form = document.getElementById('editar-empleado-form');
            form.addEventListener('submit', function(event) {
                const requiredInputs = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredInputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.style.borderColor = 'var(--accent-color)';
                    } else {
                        input.style.borderColor = '';
                    }
                });
                
                if (!isValid) {
                    event.preventDefault();
                    alert('Por favor complete todos los campos obligatorios.');
                }
            });
            
            // Restaurar color de borde original al cambiar valor
            const inputs = document.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    this.style.borderColor = '';
                });
            });
        });
    </script>
</body>
</html>