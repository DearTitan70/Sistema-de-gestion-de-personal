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
    echo "El empleado no existe o está retirado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $area = $_POST['area'];
    $presupuesto = $_POST['presupuesto'];
    $segundos_y_encargados = $_POST['segundos_y_encargados'];
    $tipo_documento = $_POST['tipo_documento'];
    $nacionalidad = $_POST['nacionalidad'];
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
    $localidad = $_POST['localidad'];
    $genero = $_POST['genero'];
    $nivel_academico = $_POST['nivel_academico'];
    $sap = $_POST['sap'];
    $tiendas_pareto = $_POST['tiendas_pareto'];
    $horario = $_POST['horario'];
    $observaciones = $_POST['observaciones'];
    $carpeta = $_POST['carpeta'];
    $otros_salario = $_POST['otros_salario'];
    $expedicion_cedula = $_POST['expedicion_cedula'];
    $ciudad_cedula = $_POST['ciudad_cedula'];
    $eps = $_POST['eps'];
    $caja_de_compensacion = $_POST['caja_de_compensacion'];
    $cesantias = $_POST['cesantias'];
    $pensiones = $_POST['pensiones'];
    $beneficiarios = $_POST['beneficiarios'];
    $contacto_emergencia = $_POST['contacto_emergencia'];
    $parentesco = $_POST['parentesco'];
    $numero_emergencia = $_POST['numero_emergencia'];
    $numero_hijos = $_POST['numero_hijos'];
    $nombre_y_edad_hijos = $_POST['nombre_y_edad_hijos'];
    $rh = $_POST['rh'];
    $codigo_sap = $_POST['codigo_sap'];
    $talla_camiseta = $_POST['talla_camiseta'];
    $talla_pantalon = $_POST['talla_pantalon'];
    $taza_de_riesgo = $_POST['taza_de_riesgo'];
    $dias_incapacidad_accidente_laboral = $_POST['dias_incapacidad_accidente_laboral'];
    $dias_incapacidades = $_POST['dias_incapacidades'];
    $dias_ausencia = $_POST['dias_ausencia'];
    $observacion_SGSST = $_POST['observacion_SGSST'];
    $licencias = $_POST['licencias'];
    $vacaciones = $_POST['vacaciones'];
    $salario = $_POST['salario'];
    $valor_prestamo = $_POST['valor_prestamo'];
    $valor_libranza = $_POST['valor_libranza'];
    $valor_premio = $_POST['valor_premio'];
    $observacion_premio = $_POST['observacion_premio'];
    $beneficio1 = $_POST['beneficio1'];
    $beneficio2 = $_POST['beneficio2'];
    $beneficio3 = $_POST['beneficio3'];
    $beneficio4 = $_POST['beneficio4'];
    $fecha_induccion = $_POST['fecha_induccion'];
    $fecha_evaluacion_prueba = $_POST['fecha_evaluacion_prueba'];
    $fecha_evaluacion_desempeño = $_POST['fecha_evaluacion_desempeño'];
    $responsable_vacante = $_POST['responsable_vacante'];
    $fecha_requisicion = $_POST['fecha_requisicion'];
    $fecha_cierre_vacante = $_POST['fecha_cierre_vacante'];
    $no_dias_vacante = $_POST['no_dias_vacante'];
    $seguimiento_vacantes = $_POST['seguimiento_vacantes'];
    $solicitudes_legales = $_POST['solicitudes_legales'];
    $motivo_disciplinario = $_POST['motivo_disciplinario'];
    $fecha_aceptacion = $_POST['fecha_aceptacion'];
    $fecha_citacion = $_POST['fecha_citacion'];
    $fecha_diligencia = $_POST['fecha_diligencia'];
    $fecha_cierre = $_POST['fecha_cierre'];
    $accion_disciplinaria = $_POST['accion_disciplinaria'];
    $concepto_final = $_POST['concepto_final'];
    $observaciones_adicionales = $_POST['observaciones_adicionales'];
    $estado = $_POST['estado'];
    $responsable = $_POST['responsable'];
    $codigo_ceco = $_POST['codigo_ceco'];

$update_sql = "UPDATE empleados_activos SET 
    area=?, presupuesto=?, segundos_y_encargados=?, tipo_documento=?, nacionalidad=?, 
    no_identificacion=?, nombre=?, ceco=?, cargo=?, tipo_contrato=?, tipo_vinculacion=?, 
    fecha_ingreso=?, ciudad=?, macroproceso=?, jefe_inmediato=?, fecha_nacimiento=?, 
    cel=?, direccion=?, correo=?, localidad=?, genero=?, nivel_academico=?, sap=?, 
    tiendas_pareto=?, horario=?, observaciones=?, carpeta=?, otros_salario=?, 
    expedicion_cedula=?, ciudad_cedula=?, eps=?, caja_de_compensacion=?, cesantias=?, 
    pensiones=?, beneficiarios=?, contacto_emergencia=?, parentesco=?, numero_emergencia=?, 
    numero_hijos=?, nombre_y_edad_hijos=?, rh=?, codigo_sap=?, talla_camiseta=?, 
    talla_pantalon=?, taza_de_riesgo=?, dias_incapacidad_accidente_laboral=?, 
    dias_incapacidades=?, dias_ausencia=?, observacion_SGSST=?, licencias=?, vacaciones=?, 
    salario=?, valor_prestamo=?, valor_libranza=?, valor_premio=?, observacion_premio=?, 
    beneficio1=?, beneficio2=?, beneficio3=?, beneficio4=?, fecha_induccion=?, 
    fecha_evaluacion_prueba=?, fecha_evaluacion_desempeño=?, responsable_vacante=?, 
    fecha_requisicion=?, fecha_cierre_vacante=?, no_dias_vacante=?, seguimiento_vacantes=?, 
    solicitudes_legales=?, motivo_disciplinario=?, fecha_aceptacion=?, fecha_citacion=?, 
    fecha_diligencia=?, fecha_cierre=?, accion_disciplinaria=?, concepto_final=?, 
    observaciones_adicionales=?, estado=?, responsable=?, codigo_ceco=? 
    WHERE id=?";

$stmt = $conn->prepare($update_sql);

$stmt->bind_param(
    "sissssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssi", 
    $area, $presupuesto, $segundos_y_encargados, $tipo_documento, $nacionalidad, 
    $no_identificacion, $nombre, $ceco, $cargo, $tipo_contrato, $tipo_vinculacion, 
    $fecha_ingreso, $ciudad, $macroproceso, $jefe_inmediato, $fecha_nacimiento, 
    $cel, $direccion, $correo, $localidad, $genero, $nivel_academico, $sap, 
    $tiendas_pareto, $horario, $observaciones, $carpeta, $otros_salario, 
    $expedicion_cedula, $ciudad_cedula, $eps, $caja_de_compensacion, $cesantias, 
    $pensiones, $beneficiarios, $contacto_emergencia, $parentesco, $numero_emergencia, 
    $numero_hijos, $nombre_y_edad_hijos, $rh, $codigo_sap, $talla_camiseta, 
    $talla_pantalon, $taza_de_riesgo, $dias_incapacidad_accidente_laboral, 
    $dias_incapacidades, $dias_ausencia, $observacion_SGSST, $licencias, $vacaciones, 
    $salario, $valor_prestamo, $valor_libranza, $valor_premio, $observacion_premio, 
    $beneficio1, $beneficio2, $beneficio3, $beneficio4, $fecha_induccion, 
    $fecha_evaluacion_prueba, $fecha_evaluacion_desempeño, $responsable_vacante, 
    $fecha_requisicion, $fecha_cierre_vacante, $no_dias_vacante, $seguimiento_vacantes, 
    $solicitudes_legales, $motivo_disciplinario, $fecha_aceptacion, $fecha_citacion, 
    $fecha_diligencia, $fecha_cierre, $accion_disciplinaria, $concepto_final, 
    $observaciones_adicionales, $estado, $responsable, $codigo_ceco, $id
);  

if ($stmt->execute()) {
    header("Location: resultado.php?mensaje=exito");
    exit;
} else {
    header("Location: resultado.php?mensaje=error&detalle=" . urlencode($stmt->error));
    exit;
}

$stmt->close();
$conn->close();
}
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
            --primary-color: #879683;
            --secondary-color: #f9f3e5;
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
            background-color: #f9f3e5;
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
            background-color: #f9f3e5;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #879683;
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
                    <span>Editar Información del Empleado</span>
                    <small>ID: <?= $id ?></small>
                </div>
                
                <div class="tabs">
                    <div class="tab active" data-tab="info-personal">
                        <i class="fas fa-user"></i> Información Personal
                    </div>
                    <div class="tab" data-tab="info-laboral">
                        <i class="fas fa-briefcase"></i> Información Laboral
                    </div>
                    <div class="tab" data-tab="salud-bienestar">
                        <i class="fas fa-heartbeat"></i> Salud y Bienestar
                    </div>
                    <div class="tab" data-tab="compensacion">
                        <i class="fas fa-money-bill-wave"></i> Compensación
                    </div>
                    <div class="tab" data-tab="desarrollo">
                        <i class="fas fa-chart-line"></i> Desarrollo y Capacitación
                    </div>
                    <div class="tab" data-tab="disciplina">
                        <i class="fas fa-gavel"></i> Procesos Disciplinarios
                    </div>
                </div>
                
                <div class="card-body">
                    <form method="post" id="editar-empleado-form">
                        <!-- TAB: Información Personal -->
                        <div class="tab-content active" id="info-personal">
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <i class="fas fa-id-card"></i> Datos de Identificación
                                </h3>
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label class="required">Nombre Completo:</label>
                                        <input type="text" name="nombre" value="<?= htmlspecialchars($empleado['nombre']) ?>" required>
                                    </div>
                                    <div class="grid-item">
                                        <label class="required">Tipo de documento:</label>
                                        <select name="tipo_documento" required>
                                            <option value="">Seleccione una opcion</option>
                                            <option value="CC" <?= $empleado['tipo_documento'] == 'CC' ? 'selected' : '' ?>>Cédula de Ciudadanía</option>
                                            <option value="CE" <?= $empleado['tipo_documento'] == 'CE' ? 'selected' : '' ?>>Cédula de Extranjería</option>
                                            <option value="TI" <?= $empleado['tipo_documento'] == 'TI' ? 'selected' : '' ?>>Tarjeta de Identidad</option>
                                            <option value="Pasaporte" <?= $empleado['tipo_documento'] == 'Pasaporte' ? 'selected' : '' ?>>Pasaporte</option>
                                        </select>
                                    </div>
                                    <div class="grid-item">
                                        <label class="required">No. Identificación:</label>
                                        <input type="text" name="no_identificacion" value="<?= htmlspecialchars($empleado['no_identificacion']) ?>" required>
                                    </div>
                                    <div class="grid-item">
                                        <label>Fecha de expedición:</label>
                                        <input type="date" name="expedicion_cedula" value="<?= ($empleado['expedicion_cedula'] !== '0000-00-00') ? htmlspecialchars($empleado['expedicion_cedula']) : '' ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Ciudad de expedición:</label>
                                        <select id="ciudad_expedicion" name="ciudad_expedicion">
                                            <option value="">Selecciona una opcion</option>
                                            <option value="Arauca">Arauca</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Barranquilla">Barranquilla</option>
                                            <option value="Bogotá">Bogotá</option>
                                            <option value="Bucaramanga">Bucaramanga</option>
                                            <option value="Cali">Cali</option>
                                            <option value="Cartagena">Cartagena</option>
                                            <option value="Cúcuta">Cúcuta</option>
                                            <option value="Florencia">Florencia</option>
                                            <option value="Ibagué">Ibagué</option>
                                            <option value="Leticia">Leticia</option>
                                            <option value="Manizales">Manizales</option>
                                            <option value="Medellín">Medellín</option>
                                            <option value="Mitú">Mitú</option>
                                            <option value="Mocoa">Mocoa</option>
                                            <option value="Montería">Montería</option>
                                            <option value="Neiva">Neiva</option>
                                            <option value="Pasto">Pasto</option>
                                            <option value="Pereira">Pereira</option>
                                            <option value="Popayán">Popayán</option>
                                            <option value="Puerto Carreño">Puerto Carreño</option>
                                            <option value="Puerto Inírida">Puerto Inírida</option>
                                            <option value="Quibdó">Quibdó</option>
                                            <option value="Riohacha">Riohacha</option>
                                            <option value="San Andrés">San Andrés</option>
                                            <option value="San José del Guaviare">San José del Guaviare</option>
                                            <option value="Santa Marta">Santa Marta</option>
                                            <option value="Sincelejo">Sincelejo</option>
                                            <option value="Tunja">Tunja</option>
                                            <option value="Valledupar">Valledupar</option>
                                            <option value="Villavicencio">Villavicencio</option>
                                            <option value="Yopal">Yopal</option>
                                        </select>
                                    </div>
                                    <div class="grid-item">
                                        <label for="nacionalidad">Nacionalidad:</label>
                                        <select id="nacionalidad" name="nacionalidad">
                                        <option value="">Seleccione una opcion</option>
                                        <option value="colombiana">Colombiana</option>
                                        <option value="venezolana">Venezolana</option>
                                        <option value="ecuatoriana">Ecuatoriana</option>
                                        <option value="argentina">Argentina</option>
                                        <option value="brasilena">Brasileña</option>
                                        <option value="chilena">Chilena</option>
                                        <option value="peruana">Peruana</option>
                                        <option value="mexicana">Mexicana</option>
                                        <option value="espanola">Española</option>
                                        <option value="estadounidense">Estadounidense</option>
                                        <option value="canadiense">Canadiense</option>
                                        <option value="francesa">Francesa</option>
                                        <option value="italiana">Italiana</option>
                                        <option value="alemana">Alemana</option>
                                        <option value="britanica">Británica</option>
                                        <option value="china">China</option>
                                        <option value="japonesa">Japonesa</option>
                                        <option value="coreana">Coreana</option>
                                        <option value="rusa">Rusa</option>
                                        <option value="india">India</option>
                                        <option value="australiana">Australiana</option>
                                        <option value="sudafricana">Sudafricana</option>
                                        <option value="portuguesa">Portuguesa</option>
                                        <option value="holandesa">Holandesa</option>
                                        <option value="sueca">Sueca</option>
                                        <option value="noruega">Noruega</option>
                                        <option value="suiza">Suiza</option>
                                        <option value="turca">Turca</option>
                                        <option value="egipcia">Egipcia</option>
                                        <option value="nigeriana">Nigeriana</option>
                                        <option value="filipina">Filipina</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <i class="fas fa-address-book"></i> Datos de Contacto
                                </h3>
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label>Fecha de nacimiento:</label>
                                        <input type="date" name="fecha_nacimiento" value="<?= ($empleado['fecha_nacimiento'] !== '0000-00-00') ? htmlspecialchars($empleado['fecha_nacimiento']) : '' ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Género:</label>
                                        <select name="genero">
                                            <option value="">Seleccione una opcion</option>
                                            <option value="Masculino" <?= $empleado['genero'] == 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                                            <option value="Femenino" <?= $empleado['genero'] == 'Femenino' ? 'selected' : '' ?>>Femenino</option>
                                            <option value="Otro" <?= $empleado['genero'] == 'Otro' ? 'selected' : '' ?>>Otro</option>
                                        </select>
                                    </div>
                                    <div class="grid-item">
                                        <label>Dirección:</label>
                                        <input type="text" name="direccion" value="<?= htmlspecialchars($empleado['direccion']) ?>">
                                    </div>
                                    <div class="grid-item">
                                    <label for="ciudad">Ciudad:</label>
                                    <select id="ciudad" name="ciudad">
                                        <option value="">Selecciona una opcion</option>
                                        <option value="Arauca">Arauca</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Barranquilla">Barranquilla</option>
                                        <option value="Bogotá">Bogotá</option>
                                        <option value="Bucaramanga">Bucaramanga</option>
                                        <option value="Cali">Cali</option>
                                        <option value="Cartagena">Cartagena</option>
                                        <option value="Cúcuta">Cúcuta</option>
                                        <option value="Florencia">Florencia</option>
                                        <option value="Ibagué">Ibagué</option>
                                        <option value="Leticia">Leticia</option>
                                        <option value="Manizales">Manizales</option>
                                        <option value="Medellín">Medellín</option>
                                        <option value="Mitú">Mitú</option>
                                        <option value="Mocoa">Mocoa</option>
                                        <option value="Montería">Montería</option>
                                        <option value="Neiva">Neiva</option>
                                        <option value="Pasto">Pasto</option>
                                        <option value="Pereira">Pereira</option>
                                        <option value="Popayán">Popayán</option>
                                        <option value="Puerto Carreño">Puerto Carreño</option>
                                        <option value="Puerto Inírida">Puerto Inírida</option>
                                        <option value="Quibdó">Quibdó</option>
                                        <option value="Riohacha">Riohacha</option>
                                        <option value="San Andrés">San Andrés</option>
                                        <option value="San José del Guaviare">San José del Guaviare</option>
                                        <option value="Santa Marta">Santa Marta</option>
                                        <option value="Sincelejo">Sincelejo</option>
                                        <option value="Tunja">Tunja</option>
                                        <option value="Valledupar">Valledupar</option>
                                        <option value="Villavicencio">Villavicencio</option>
                                        <option value="Yopal">Yopal</option>
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
                                        <label class="required">Correo electrónico:</label>
                                        <div class="input-group">
                                            <input type="email" name="correo" value="<?= htmlspecialchars($empleado['correo']) ?>" required>
                                            <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                        </div>
                                    </div>
                                    <div class="grid-item">
                                        <label>Contacto de emergencia:</label>
                                        <input type="text" name="contacto_emergencia" value="<?= htmlspecialchars($empleado['contacto_emergencia']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Parentesco:</label>
                                        <input type="text" name="parentesco" value="<?= htmlspecialchars($empleado['parentesco']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Número de emergencia:</label>
                                        <input type="text" name="numero_emergencia" value="<?= htmlspecialchars($empleado['numero_emergencia']) ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <i class="fas fa-users"></i> Información Familiar
                                </h3>
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label>Número de hijos:</label>
                                        <input type="number" name="numero_hijos" value="<?= htmlspecialchars($empleado['numero_hijos']) ?>" min="0">
                                    </div>
                                    <div class="grid-item">
                                        <label>Nombre y edad de los hijos:</label>
                                        <textarea name="nombre_y_edad_hijos"><?= htmlspecialchars($empleado['nombre_y_edad_hijos']) ?></textarea>
                                    </div>
                                    <div class="grid-item">
                                        <label>Beneficiarios:</label>
                                        <textarea name="beneficiarios"><?= htmlspecialchars($empleado['beneficiarios']) ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- TAB: Información Laboral -->
                        <div class="tab-content" id="info-laboral">
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <i class="fas fa-building"></i> Datos de Empleo
                                </h3>
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label class="required">Cargo:</label>
                                        <input type="text" name="cargo" value="<?= htmlspecialchars($empleado['cargo']) ?>" required>
                                    </div>
                                    <div class="grid-item">
                                        <label>Área:</label>
                                        <input type="text" name="area" value="<?= htmlspecialchars($empleado['area']) ?>">
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
                                        <label>Macroproceso:</label>
                                        <input type="text" name="macroproceso" value="<?= htmlspecialchars($empleado['macroproceso']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Jefe inmediato:</label>
                                        <input type="text" name="jefe_inmediato" value="<?= htmlspecialchars($empleado['jefe_inmediato']) ?>" >
                                        </div>
                                    <div class="grid-item">
                                        <label>Fecha de ingreso:</label>
                                        <input type="date" name="fecha_ingreso" value="<?= htmlspecialchars($empleado['fecha_ingreso']) ?>" >
                                    </div>
                                    <div class="grid-item">
                                        <label>Tipo de contrato:</label>
                                        <select name="tipo_contrato">
                                            <option value="">Seleccione una opcion</option>
                                            <option value= "Obra O Labor" <?= $empleado['tipo_contrato'] == 'Obra O Labor' ? 'selected' : '' ?>>Obra o labor</option>
                                            <option value= "Fijo" <?= $empleado['tipo_contrato'] == 'Fijo' ? 'selected' : '' ?>>Fijo</option>
                                            <option value= "Indefinido" <?= $empleado['tipo_contrato'] == 'Indefinido' ? 'selected' : '' ?>>Indefinido</option>
                                            <option value= "Prestacion de servicios" <?= $empleado['tipo_contrato'] == 'Prestacion de servicios' ? 'selected' : '' ?>>Prestacion de servicios</option>
                                        </select>
                                    </div>
                                    <div class="grid-item">
                                        <label>Tipo de vinculacion:</label>
                                        <select name="tipo_vinculacion">
                                            <option value="">Seleccione una opcion</option>
                                            <option value= "Directo" <?= $empleado['tipo_vinculacion'] == 'Directo' ? 'selected' : '' ?>>Directo</option>
                                            <option value= "Indirecto" <?= $empleado['tipo_vinculacion'] == 'Indirecto' ? 'selected' : '' ?>>Indirecto</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- TAB: Salud y Bienestar -->
                        <div class="tab-content" id="salud-bienestar">
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <i class="fas fa-heartbeat"></i> Información de Salud
                                </h3>
                                <div class="grid-container">
                                    <div class="grid-item">
                                    <label for="rh">RH:</label>
                                    <select name="rh">
                                        <option value="">Seleccione una opcion</option>
                                        <option value="o+">O+</option>
                                        <option value="o-">O-</option>
                                        <option value="a+">A+</option>
                                        <option value="a-">A-</option>
                                        <option value="b+">B+</option>
                                        <option value="b-">B-</option>
                                        <option value="ab+">AB+</option>
                                        <option value="ab-">AB-</option>
                                    </select>
                                    </div>
                                    <div class="grid-item">
                                    <label for="eps">EPS:</label>
                                    <select name="eps">
                                        <option value="">Seleccione una opcion</option>
                                        <option value="sura">Sura</option>
                                        <option value="sanitas">Sanitas</option>
                                        <option value="compensar">Compensar</option>
                                        <option value="saludtotal">Salud Total</option>
                                        <option value="nuevaeps">Nueva EPS</option>
                                        <option value="famisanar">Famisanar</option>
                                        <option value="coosalud">Coosalud</option>
                                        <option value="mutualser">Mutual SER</option>
                                        <option value="capital salud">Capital Salud</option>
                                        <option value="ecoopsos">Ecoopsos</option>
                                        <option value="dusakawi">Dusakawi</option>
                                        <option value="anas wayuu">Anas Wayuu</option>
                                        <option value="asmet salud">Asmet Salud</option>
                                        <option value="saviasalud">Savia Salud</option>
                                        <option value="emssanar">Emssanar</option>
                                        <option value="cajacopi">Cajacopi</option>
                                    </select>
                                    </div>
                                    <div class="grid-item">
                                        <label>Pensiones:</label>
                                        <input type="text" name="pensiones" value="<?= htmlspecialchars($empleado['pensiones']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Cesantías:</label>
                                        <input type="text" name="cesantias" value="<?= htmlspecialchars($empleado['cesantias']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Caja de compensación:</label>
                                        <input type="text" name="caja_de_compensacion" value="<?= htmlspecialchars($empleado['caja_de_compensacion']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Tasa de riesgo:</label>
                                        <input type="text" name="taza_de_riesgo" value="<?= htmlspecialchars($empleado['taza_de_riesgo']) ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <i class="fas fa-notes-medical"></i> Historial de Incapacidades
                                </h3>
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label>Días de incapacidad por accidente laboral:</label>
                                        <input type="number" name="dias_incapacidad_accidente_laboral" value="<?= htmlspecialchars($empleado['dias_incapacidad_accidente_laboral']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Días de incapacidades generales:</label>
                                        <input type="number" name="dias_incapacidades" value="<?= htmlspecialchars($empleado['dias_incapacidades']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Días de ausencia:</label>
                                        <input type="number" name="dias_ausencia" value="<?= htmlspecialchars($empleado['dias_ausencia']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Observación SGSST:</label>
                                        <textarea name="observacion_SGSST"><?= htmlspecialchars($empleado['observacion_SGSST']) ?></textarea>
                                    </div>
                                    <div class="grid-item">
                                        <label>Licencias:</label>
                                        <input type="text" name="licencias" value="<?= htmlspecialchars($empleado['licencias']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Vacaciones:</label>
                                        <input type="text" name="vacaciones" value="<?= htmlspecialchars($empleado['vacaciones']) ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <i class="fas fa-tshirt"></i> Información para Dotación
                                </h3>
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label>Talla de camiseta:</label>
                                        <input type="text" name="talla_camiseta" value="<?= htmlspecialchars($empleado['talla_camiseta']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Talla de pantalón:</label>
                                        <input type="text" name="talla_pantalon" value="<?= htmlspecialchars($empleado['talla_pantalon']) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- TAB: Compensación -->
                        <div class="tab-content" id="compensacion">
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <i class="fas fa-money-bill-wave"></i> Información Salarial
                                </h3>
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label>Salario:</label>
                                        <div class="input-group">
                                            <input type="text" name="salario" value="<?= htmlspecialchars($empleado['salario']) ?>">
                                            <span class="input-group-addon">$</span>
                                        </div>
                                    </div>
                                    <div class="grid-item">
                                        <label>Otros conceptos salariales:</label>
                                        <input type="text" name="otros_salario" value="<?= htmlspecialchars($empleado['otros_salario']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Presupuesto:</label>
                                        <input type="text" name="presupuesto" value="<?= htmlspecialchars($empleado['presupuesto']) ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <i class="fas fa-hand-holding-usd"></i> Préstamos y Beneficios
                                </h3>
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label>Valor préstamo:</label>
                                        <div class="input-group">
                                            <input type="text" name="valor_prestamo" value="<?= htmlspecialchars($empleado['valor_prestamo']) ?>">
                                            <span class="input-group-addon">$</span>
                                        </div>
                                    </div>
                                    <div class="grid-item">
                                        <label>Valor libranza:</label>
                                        <div class="input-group">
                                            <input type="text" name="valor_libranza" value="<?= htmlspecialchars($empleado['valor_libranza']) ?>">
                                            <span class="input-group-addon">$</span>
                                        </div>
                                    </div>
                                    <div class="grid-item">
                                        <label>Valor premio:</label>
                                        <div class="input-group">
                                            <input type="text" name="valor_premio" value="<?= htmlspecialchars($empleado['valor_premio']) ?>">
                                            <span class="input-group-addon">$</span>
                                        </div>
                                    </div>
                                    <div class="grid-item">
                                        <label>Observación premio:</label>
                                        <textarea name="observacion_premio"><?= htmlspecialchars($empleado['observacion_premio']) ?></textarea>
                                    </div>
                                    <div class="grid-item">
                                        <label>Beneficio 1:</label>
                                        <input type="text" name="beneficio1" value="<?= htmlspecialchars($empleado['beneficio1']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Beneficio 2:</label>
                                        <input type="text" name="beneficio2" value="<?= htmlspecialchars($empleado['beneficio2']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Beneficio 3:</label>
                                        <input type="text" name="beneficio3" value="<?= htmlspecialchars($empleado['beneficio3']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Beneficio 4:</label>
                                        <input type="text" name="beneficio4" value="<?= htmlspecialchars($empleado['beneficio4']) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- TAB: Desarrollo y Capacitación -->
                        <div class="tab-content" id="desarrollo">
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <i class="fas fa-graduation-cap"></i> Formación y Evaluación
                                </h3>
                                <div class="grid-container">
                                <div class="grid-item">
                                    <label for="nivel_academico">Nivel Academico<sup style="color:red;"> * </sup>:</label>
                                    <select id="nivel_academico" name="nivel_academico">
                                        <option value="">Selecciona una opción</option>
                                        <option value="bachiller">Bachiller</option>
                                        <option value="tecnico">Tecnico</option>
                                        <option value="tecnologo">Tecnologo</option>
                                        <option value="profesional">Profesional</option>
                                        <option value="posgrado">Posgrado</option>
                                    </select>
                                </div>
                                    <div class="grid-item">
                                        <label>Fecha de inducción:</label>
                                        <input type="date" name="fecha_induccion" value="<?= ($empleado['fecha_induccion'] !== '0000-00-00') ? htmlspecialchars($empleado['fecha_induccion']) : '' ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Fecha de evaluación de prueba:</label>
                                        <input type="date" name="fecha_evaluacion_prueba" value="<?= ($empleado['fecha_evaluacion_prueba'] !== '0000-00-00') ? htmlspecialchars($empleado['fecha_evaluacion_prueba']) : '' ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Fecha de evaluación de desempeño:</label>
                                        <input type="date" name="fecha_evaluacion_desempeño" value="<?= ($empleado['fecha_evaluacion_desempeño'] !== '0000-00-00') ? htmlspecialchars($empleado['fecha_evaluacion_desempeño']) : '' ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <i class="fas fa-briefcase"></i> Información de Vacante
                                </h3>
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label>Responsable de la vacante:</label>
                                        <input type="text" name="responsable_vacante" value="<?= htmlspecialchars($empleado['responsable_vacante']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Fecha de requisición:</label>
                                        <input type="date" name="fecha_requisicion" value="<?= ($empleado['fecha_requisicion'] !== '0000-00-00') ? htmlspecialchars($empleado['fecha_requisicion']) : '' ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Fecha de cierre de vacante:</label>
                                        <input type="date" name="fecha_cierre_vacante" value="<?= ($empleado['fecha_cierre_vacante'] !== '0000-00-00') ? htmlspecialchars($empleado['fecha_cierre_vacante']) : '' ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Número de días vacante:</label>
                                        <input type="number" name="no_dias_vacante" value="<?= htmlspecialchars($empleado['no_dias_vacante']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Seguimiento de vacantes:</label>
                                        <input type="text" name="seguimiento_vacantes" value="<?= htmlspecialchars($empleado['seguimiento_vacantes']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Segundos y encargados:</label>
                                        <input type="text" name="segundos_y_encargados" value="<?= htmlspecialchars($empleado['segundos_y_encargados']) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- TAB: Procesos Disciplinarios -->
                        <div class="tab-content" id="disciplina">
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <i class="fas fa-gavel"></i> Proceso Disciplinario
                                </h3>
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <label>Motivo disciplinario:</label>
                                        <textarea name="motivo_disciplinario"><?= htmlspecialchars($empleado['motivo_disciplinario']) ?></textarea>
                                    </div>
                                    <div class="grid-item">
                                        <label>Fecha de aceptación:</label>
                                        <input type="date" name="fecha_aceptacion" value="<?= ($empleado['fecha_aceptacion'] !== '0000-00-00') ? htmlspecialchars($empleado['fecha_aceptacion']) : '' ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Fecha de citación:</label>
                                        <input type="date" name="fecha_citacion" value="<?= ($empleado['fecha_citacion'] !== '0000-00-00') ? htmlspecialchars($empleado['fecha_citacion']) : '' ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Fecha de diligencia:</label>
                                        <input type="date" name="fecha_diligencia" value="<?= ($empleado['fecha_diligencia'] !== '0000-00-00') ? htmlspecialchars($empleado['fecha_diligencia']) : '' ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Fecha de cierre:</label>
                                        <input type="date" name="fecha_cierre" value="<?= ($empleado['fecha_cierre'] !== '0000-00-00') ? htmlspecialchars($empleado['fecha_cierre']) : '' ?>" >
                                    </div>
                                    <div class="grid-item">
                                        <label>Acción disciplinaria:</label>
                                        <input type="text" name="accion_disciplinaria" value="<?= htmlspecialchars($empleado['accion_disciplinaria']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Concepto final:</label>
                                        <input type="text" name="concepto_final" value="<?= htmlspecialchars($empleado['concepto_final']) ?>">
                                    </div>
                                    <div class="grid-item">
                                        <label>Observaciones adicionales:</label>
                                        <textarea name="observaciones_adicionales"><?= htmlspecialchars($empleado['observaciones_adicionales']) ?></textarea>
                                    </div>
                                    <div class="grid-item">
                                        <label>Estado:</label>
                                        <select name="estado">
                                            <option value="">Seleccione una opcion</option>
                                            <option value="Activo" <?= $empleado['estado'] == 'Activo' ? 'selected' : '' ?>>Activo</option>
                                            <option value="En proceso" <?= $empleado['estado'] == 'En proceso' ? 'selected' : '' ?>>En proceso</option>
                                            <option value="Cerrado" <?= $empleado['estado'] == 'Cerrado' ? 'selected' : '' ?>>Cerrado</option>
                                        </select>
                                    </div>
                                    <div class="grid-item">
                                        <label>Responsable:</label>
                                        <input type="text" name="responsable" value="<?= htmlspecialchars($empleado['responsable']) ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <i class="fas fa-file-alt"></i> Solicitudes Legales
                                </h3>
                                <div class="grid-container">
                                    <div class="grid-item" style="grid-column: 1 / span 2;">
                                        <label>Solicitudes legales:</label>
                                        <textarea name="solicitudes_legales"><?= htmlspecialchars($empleado['solicitudes_legales']) ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Botones de acción -->
                        <div class="actions">
                            <a href="index.html" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar cambios
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