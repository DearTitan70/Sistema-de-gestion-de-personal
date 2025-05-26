<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Dinámico</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #879683;
            --secondary-color: #f9f3e5;
            --accent-color: #304d73;
            --success-color: #4CAF50;
            --danger-color: #f44336;
            --light-color: #f5f7fa;
            --dark-color: #2c3e50;
            --border-radius: 8px;
            --box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f3e5;
            color: var(--dark-color);
            line-height: 1.6;
            padding: 30px 0;
        }

        .container {
            background: #ffffff;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            width: 90%;
            height: auto;
            overflow: visible;
        }

        .header {
            margin-bottom: 30px;
            position: relative;
        }

        h3 {
            color: var(--primary-color);
            font-size: 24px;
            text-align: center;
            margin: 20px 0;
            padding-bottom: 10px;
            position: relative;
        }

        h3:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: var(--secondary-color);
        }

        .hidden {
            display: none;
        }

        .form-section {
            margin-top: 20px;
            background: #fff;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .grid-item {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark-color);
            font-weight: 500;
            font-size: 14px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #879683;
            border-radius: var(--border-radius);
            font-size: 14px;
            transition: var(--transition);
            background-color: var(--light-color);
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(74, 111, 165, 0.2);
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%232c3e50' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }

        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: var(--transition);
            margin-top: 30px;
            width: 100%;
            max-width: 300px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .submit-btn:hover {
            background-color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(48, 77, 115, 0.3);
        }

        .alert {
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: var(--border-radius);
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .alert i {
            margin-right: 10px;
            font-size: 18px;
        }

        .alert-success {
            background-color: rgba(76, 175, 80, 0.1);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .alert-danger {
            background-color: rgba(244, 67, 54, 0.1);
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }

        .btn_volver {
            padding: 12px 20px;
            background-color: var(--primary-color);
            color: var(--secondary-color);
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .btn_volver i {
            margin-right: 8px;
        }

        .btn_volver:hover {
            background-color: var(--secondary-color);
            color: var(--primary-color)
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(48, 77, 115, 0.2);
        }

        .estado-selector {
            max-width: 300px;
            margin: 0 auto 30px auto;
        }

        .estado-selector label {
            font-size: 16px;
            font-weight: 600;
            color: var(--primary-color);
            text-align: center;
            display: block;
            margin-bottom: 10px;
        }

        .estado-selector select {
            font-size: 16px;
            padding: 15px;
            text-align-last: center;
            border: 2px solid var(--primary-color);
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
                width: 95%;
            }
            
            .grid-container {
                grid-template-columns: 1fr;
            }
            
            h3 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_GET['status']) && $_GET['status'] == 'success') {
            echo '<div class="alert alert-success"><i class="fas fa-check-circle"></i>Datos guardados exitosamente.</div>';
        } else if (isset($_GET['status']) && $_GET['status'] == 'error') {
            echo '<div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i>Error al guardar los datos. Por favor intente nuevamente.</div>';
        }
        ?>
        
        <div class="header">
            <a href="index.html" class="btn_volver">
                <i class="fas fa-arrow-left"></i> Volver al inicio
            </a>
        </div>
        
        <form id="empleadoForm" action="crear_empleado.php" method="POST">
            <div class="estado-selector">
                <label for="estado">Estado del Empleado</label>
                <select id="estado" name="estado" required>
                    <option value="">Selecciona una opción</option>
                    <option value="activo">Activo</option>
                </select>
            </div>

            <div id="activoCampos" class="hidden form-section">
                <h3>Datos de Empleado Activo</h3>
                <h4 style="color:#879683;">Los campos marcados con (*) son obligatorios</h4><br> 
                <div class="grid-container">
                    <div class="grid-item">
                        <label for="area">Área<sup style="color:red;"> * </sup>:</label>
                        <input type="text" id="area" name="area" placeholder="Ingrese el área">
                    </div>

                    <div class="grid-item">
                        <label for="presupuesto">Presupuesto de planta:</label>
                        <input type="number" id="presupuesto" name="presupuesto" placeholder="Ingrese el presupuesto">
                    </div>

                    <div class="grid-item">
                        <label for="segundos_y_encargados">Segundos y encargados:</label>
                        <input type="number" id="segundos_y_encargados" name="segundos_y_encargados" placeholder="Ingrese cantidad">
                    </div>

                    <div class="grid-item">
                        <label for="tipo_documento">Tipo de documento<sup style="color:red;"> * </sup>:</label>
                        <select id="tipo_documento" name="tipo_documento">
                            <option value="">Selecciona una opción</option>
                            <option value="CC">C.C</option>
                            <option value="TI">T.I</option>
                            <option value="PEP">P.E.P</option>
                        </select>
                    </div>

                    <div class="grid-item">
                        <label for="nacionalidad">Nacionalidad:</label>
                        <select id="nacionalidad" name="nacionalidad">
                        <option value="">Seleccione</option>
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

                    <div class="grid-item">
                        <label for="no_identificacion">No. Identificación<sup style="color:red;"> * </sup>:</label>
                        <input type="number" id="no_identificacion" name="no_identificacion" placeholder="Ingrese número de identificación">
                    </div>

                    <div class="grid-item">
                        <label for="nombre">Nombre Completo<sup style="color:red;"> * </sup>:</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre completo">
                    </div>

                    <div class="grid-item">
                        <label for="ceco">Centro de Costo<sup style="color:red;"> * </sup>:</label>
                        <input type="text" id="ceco" name="ceco" placeholder="Ingrese centro de costo">
                    </div>

                    <div class="grid-item">
                        <label for="cargo">Cargo:<sup style="color:red;"> * </sup></label>
                        <input type="text" id="cargo" name="cargo" placeholder="Ingrese cargo">
                    </div>

                    <div class="grid-item">
                        <label for="tipo_contrato">Tipo de contrato:</label>
                        <select id="tipo_contrato" name="tipo_contrato">
                            <option value="">Selecciona una opción</option>
                            <option value="obra_labor">Obra o Labor</option>
                            <option value="fijo">Fijo</option>
                            <option value="indefinido">Indefinido</option>
                            <option value="prestacion_servicios">Prestacion de servicios</option>
                            <option value="aprendizaje">Aprendizaje</option>
                        </select>
                    </div>

                    <div class="grid-item">
                        <label for="tipo_vinculacion">Tipo de vinculación:</label>
                        <select id="tipo_vinculacion" name="tipo_vinculacion">
                            <option value="">Selecciona una opción</option>
                            <option value="directo">Directo</option>
                            <option value="indirecto">Indirecto</option>
                        </select>
                    </div>

                    <div class="grid-item">
                        <label for="fecha_ingreso">Fecha de Ingreso<sup style="color:red;"> * </sup>:</label>
                        <input type="date" id="fecha_ingreso" name="fecha_ingreso">
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
                        <label for="macroproceso">Macroproceso:</label>
                        <input type="text" id="macroproceso" name="macroproceso" placeholder="Ingrese macroproceso">
                    </div>

                    <div class="grid-item">
                        <label for="jefe_inmediato">Jefe Inmediato:</label>
                        <input type="text" id="jefe_inmediato" name="jefe_inmediato" placeholder="Ingrese jefe inmediato">
                    </div>

                    <div class="grid-item">
                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
                    </div>

                    <div class="grid-item">
                        <label for="cel">No. Celular<sup style="color:red;"> * </sup>:</label>
                        <input type="number" id="cel" name="cel" placeholder="Ingrese número celular">
                    </div>

                    <div class="grid-item">
                        <label for="direccion">Dirección<sup style="color:red;"> * </sup>:</label>
                        <input type="text" id="direccion" name="direccion" placeholder="Ingrese dirección">
                    </div>

                    <div class="grid-item">
                        <label for="correo">Correo:</label>
                        <input type="email" id="correo" name="correo" placeholder="Ingrese correo electrónico">
                    </div>

                    <div class="grid-item">
                        <label for="genero">Género<sup style="color:red;"> * </sup>:</label>
                        <select id="genero" name="genero">
                            <option value="">Selecciona una opción</option>
                            <option value="femenino">Femenino</option>
                            <option value="masculino">Masculino</option>
                        </select>
                    </div>

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
                        <label for="sap">Sap:</label>
                        <input type="text" id="sap" name="sap">
                    </div>

                    <div class="grid-item">
                        <label for="tiendas_pareto">Tiendas Pareto:</label>
                        <input type="text" id="tiendas_pareto" name="tiendas_pareto">
                    </div>

                    <div class="grid-item">
                        <label for="horario">Horario:</label>
                        <input type="text" id="horario" name="horario">
                    </div>

                    <div class="grid-item">
                        <label for="observaciones">Observaciones:</label>
                        <input type="text" id="observaciones" name="observaciones">
                    </div>

                    <div class="grid-item">
                        <label for="carpeta">Observaciones:</label>
                        <input type="text" id="carpeta" name="carpeta">
                    </div>

                    <div class="grid-item">
                        <label for="otros_salario">Otros salario:</label>
                        <input type="number" id="otros_salario" name="otros_salario">
                    </div>

                    <div class="grid-item">
                        <label for="expedicion_cedula">Fecha de expedicion cedula:</label>
                        <input type="date" id="expedicion_cedula" name="expedicion_cedula">
                    </div>

                    <div class="grid-item">
                        <label for="ciudad_cedula">Ciudad de expedicion:</label>
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
                        <label for="eps">EPS:</label>
                        <select name="eps">
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
                        <label for="caja_de_compensacion">Caja de compensacion:</label>
                        <input type="text" id="caja_de_compensacion" name="caja_de_compensacion">
                    </div>

                    <div class="grid-item">
                        <label for="cesantias">Cesantias:</label>
                        <input type="text" id="cesantias" name="cesantias">
                    </div>

                    <div class="grid-item">
                        <label for="pensiones">Pensiones:</label>
                        <input type="text" id="pensiones" name="pensiones">
                    </div>

                    <div class="grid-item">
                        <label for="beneficiarios">Beneficiarios:</label>
                        <input type="text" id="beneficiarios" name="beneficiarios">
                    </div>

                    <div class="grid-item">
                        <label for="contacto_emergencia">Contacto de emergencia:</label>
                        <input type="text" id="contacto_emergencia" name="contacto_emergencia">
                    </div>

                    <div class="grid-item">
                        <label for="parentesco">Parentesco:</label>
                        <input type="text" id="parentesco" name="parentesco">
                    </div>

                    <div class="grid-item">
                        <label for="numero_emergencia">Numero de emergencia:</label>
                        <input type="number" id="numero_emergencia" name="numero_emergencia">
                    </div>

                    <div class="grid-item">
                        <label for="numero_hijos">Cantidad de hijos:</label>
                        <input type="number" id="numero_hijos" name="numero_hijos">
                    </div>

                    <div class="grid-item">
                        <label for="nombre_y_edad_hijos">Nombre y edad hijos:</label>
                        <input type="text" id="nombre_y_edad_hijos" name="nombre_y_edad_hijos">
                    </div>

                    <div class="grid-item">
                        <label for="rh">RH:</label>
                        <select name="rh">
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
                        <label for="codigo_sap">Código SAP:</label>
                        <input type="text" id="codigo_sap" name="codigo_sap">
                    </div>
                    <div class="grid-item">
                        <label for="talla_camiseta">Talla Camiseta:</label>
                        <input type="text" id="talla_camiseta" name="talla_camiseta">
                    </div>
                    <div class="grid-item">
                        <label for="talla_pantalon">Talla Pantalón:</label>
                        <input type="text" id="talla_pantalon" name="talla_pantalon">
                    </div>
                    <div class="grid-item">
                        <label for="taza_de_riesgo">Taza de Riesgo:</label>
                        <input type="text" id="taza_de_riesgo" name="taza_de_riesgo">
                    </div>
                    <div class="grid-item">
                        <label for="dias_incapacidad_accidente_laboral">Días Incapacidad Accidente Laboral:</label>
                        <input type="number" id="dias_incapacidad_accidente_laboral" name="dias_incapacidad_accidente_laboral">
                    </div>
                    <div class="grid-item">
                        <label for="dias_incapacidades">Días Incapacidades:</label>
                        <input type="number" id="dias_incapacidades" name="dias_incapacidades">
                    </div>
                    <div class="grid-item">
                        <label for="dias_ausencia">Días Ausencia:</label>
                        <input type="number" id="dias_ausencia" name="dias_ausencia">
                    </div>
                    <div class="grid-item">
                        <label for="observacion_SGSST">Observación SGSST:</label>
                        <textarea id="observacion_SGSST" name="observacion_SGSST"></textarea>
                    </div>
                    <div class="grid-item">
                        <label for="licencias">Licencias:</label>
                        <input type="text" id="licencias" name="licencias">
                    </div>
                    <div class="grid-item">
                        <label for="vacaciones">Vacaciones:</label>
                        <input type="text" id="vacaciones" name="vacaciones">
                    </div>
                    <div class="grid-item">
                        <label for="salario">Salario:</label>
                        <input type="number" id="salario" name="salario">
                    </div>
                    <div class="grid-item">
                        <label for="valor_prestamo">Valor Préstamo:</label>
                        <input type="number" id="valor_prestamo" name="valor_prestamo">
                    </div>
                    <div class="grid-item">
                        <label for="valor_libranza">Valor Libranza:</label>
                        <input type="number" id="valor_libranza" name="valor_libranza">
                    </div>
                    <div class="grid-item">
                        <label for="valor_premio">Valor Premio:</label>
                        <input type="number" id="valor_premio" name="valor_premio">
                    </div>
                    <div class="grid-item">
                        <label for="observacion_premio">Observación Premio:</label>
                        <textarea id="observacion_premio" name="observacion_premio"></textarea>
                    </div>
                    <div class="grid-item">
                        <label for="beneficio1">Beneficio 1:</label>
                        <textarea id="beneficio1" name="beneficio1"></textarea>
                    </div>
                    <div class="grid-item">
                        <label for="beneficio2">Beneficio 2:</label>
                        <textarea id="beneficio2" name="beneficio2"></textarea>
                    </div>
                    <div class="grid-item">
                        <label for="beneficio3">Beneficio 3:</label>
                        <textarea id="beneficio3" name="beneficio3"></textarea>
                    </div>
                    <div class="grid-item">
                        <label for="beneficio4">Beneficio 4:</label>
                        <textarea id="beneficio4" name="beneficio4"></textarea>
                    </div>
                    <div class="grid-item">
                        <label for="fecha_induccion">Fecha Inducción:</label>
                        <input type="date" id="fecha_induccion" name="fecha_induccion">
                    </div>
                    <div class="grid-item">
                        <label for="fecha_evaluacion_prueba">Fecha Evaluación Prueba:</label>
                        <input type="date" id="fecha_evaluacion_prueba" name="fecha_evaluacion_prueba">
                    </div>
                    <div class="grid-item">
                        <label for="fecha_evaluacion_desempeño">Fecha Evaluación Desempeño:</label>
                        <input type="date" id="fecha_evaluacion_desempeño" name="fecha_evaluacion_desempeño">
                    </div>
                    <div class="grid-item">
                        <label for="responsable_vacante">Responsable Vacante:</label>
                        <input type="text" id="responsable_vacante" name="responsable_vacante">
                    </div>
                    <div class="grid-item">
                        <label for="fecha_requisicion">Fecha Requisición:</label>
                        <input type="date" id="fecha_requisicion" name="fecha_requisicion">
                    </div>
                    <div class="grid-item">
                        <label for="fecha_cierre_vacante">Fecha Cierre Vacante:</label>
                        <input type="date" id="fecha_cierre_vacante" name="fecha_cierre_vacante">
                    </div>
                    <div class="grid-item">
                        <label for="no_dias_vacante">No. Días Vacante:</label>
                        <input type="number" id="no_dias_vacante" name="no_dias_vacante">
                    </div>
                    <div class="grid-item">
                        <label for="seguimiento_vacantes">Seguimiento Vacantes:</label>
                        <textarea id="seguimiento_vacantes" name="seguimiento_vacantes"></textarea>
                    </div>
                    <div class="grid-item">
                        <label for="solicitudes_legales">Solicitudes Legales:</label>
                        <textarea id="solicitudes_legales" name="solicitudes_legales"></textarea>
                    </div>
                    <div class="grid-item">
                        <label for="motivo_disciplinario">Motivo Disciplinario:</label>
                        <textarea id="motivo_disciplinario" name="motivo_disciplinario"></textarea>
                    </div>
                    <div class="grid-item">
                        <label for="fecha_aceptacion">Fecha Aceptación:</label>
                        <input type="date" id="fecha_aceptacion" name="fecha_aceptacion">
                    </div>
                    <div class="grid-item">
                        <label for="fecha_citacion">Fecha Citación:</label>
                        <input type="date" id="fecha_citacion" name="fecha_citacion">
                    </div>
                    <div class="grid-item">
                        <label for="fecha_diligencia">Fecha Diligencia:</label>
                        <input type="date" id="fecha_diligencia" name="fecha_diligencia">
                    </div>
                    <div class="grid-item">
                        <label for="fecha_cierre">Fecha Cierre:</label>
                        <input type="date" id="fecha_cierre" name="fecha_cierre">
                    </div>
                    <div class="grid-item">
                        <label for="accion_disciplinaria">Acción Disciplinaria:</label>
                        <textarea id="accion_disciplinaria" name="accion_disciplinaria"></textarea>
                    </div>
                    <div class="grid-item">
                        <label for="concepto_final">Concepto Final:</label>
                        <textarea id="concepto_final" name="concepto_final"></textarea>
                    </div>
                    <div class="grid-item">
                        <label for="observaciones_adicionales">Observaciones Adicionales:</label>
                        <textarea id="observaciones_adicionales" name="observaciones_adicionales"></textarea>
                    </div>
                    <div class="grid-item">
                        <label for="responsable">Responsable:</label>
                        <input type="text" id="responsable" name="responsable">
                    </div>
                    <div class="grid-item">
                        <label for="codigo_ceco">Código CECO<sup style="color:red;"> * </sup>:</label>
                        <input type="text" id="codigo_ceco" name="codigo_ceco">
                    </div>
                    
                    <div class="grid-item" style="grid-column: 1 / span 3;">
                        <button type="submit" class="submit-btn">Guardar Empleado Activo</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
document.getElementById("estado").addEventListener("change", function() {
    let estado = this.value;
    let activoCampos = document.getElementById("activoCampos");
    let retiradoCampos = document.getElementById("retiradoCampos");

    if (estado === "activo") {
        activoCampos.classList.remove("hidden");
        retiradoCampos.classList.add("hidden");
    } else if (estado === "retirado") {
        retiradoCampos.classList.remove("hidden");
        activoCampos.classList.add("hidden");
    } else {
        activoCampos.classList.add("hidden");
        retiradoCampos.classList.add("hidden");
    } 
});

document.getElementById("empleadoForm").addEventListener("submit", function(event) {
    const estado = document.getElementById("estado").value;
    
    if (estado === "") {
        alert("Por favor seleccione el estado del empleado");
        event.preventDefault();
        return false;
    }
    
    if (estado === "activo") {
        // Validación únicamente para los campos obligatorios de empleado activo
        const area = document.getElementById("area").value;
        const tipo_documento = document.getElementById("tipo_documento").value;
        const no_identificacion = document.getElementById("no_identificacion").value;
        const nombre = document.getElementById("nombre").value;
        const cargo = document.getElementById("cargo").value;
        const ceco = document.getElementById("ceco").value;
        const fecha_ingreso = document.getElementById("fecha_ingreso").value;
        const genero = document.getElementById("genero").value;
        const codigo_ceco = document.getElementById("codigo_ceco").value;
        const nivel_academico = document.getElementById("nivel_academico").value;
        const cel = document.getElementById("cel").value;
        const direccion = document.getElementById("direccion").value;

        if (area === "" || tipo_documento === "" || no_identificacion === "" || nombre === "" || cargo === "" || ceco === "" || fecha_ingreso === "" || genero === "" || codigo_ceco === "" || nivel_academico === "" || cel === "" || direccion === "") {
            alert("Por favor complete todos los campos obligatorios");
            event.preventDefault();
            return false;
        }
        
        // Deshabilitar los campos del formulario de retirados para evitar validación
        const camposRetirados = document.querySelectorAll("#retiradoCampos input, #retiradoCampos select, #retiradoCampos textarea");
        camposRetirados.forEach(campo => {
            campo.disabled = true;
        });
        
        // Verificar si el formulario se envía correctamente
        console.log("Formulario de empleado activo enviado");
        
    } else if (estado === "retirado") {
        // Validación únicamente para los campos obligatorios de empleado retirado
        const r_no_identificacion = document.getElementById("r_no_identificacion").value;
        const r_nombre = document.getElementById("r_nombre").value;
        const r_cargo = document.getElementById("r_cargo").value;
        const r_jefe_inmediato = document.getElementById("r_jefe_inmediato").value;
        const r_correo = document.getElementById("r_correo").value;
        
        if (r_no_identificacion === "" || r_nombre === "" || r_cargo === "" || r_jefe_inmediato === "" || r_correo === "") {
            alert("Por favor complete los campos obligatorios: No. Identificacion, Nombre, Cargo, Jefe Inmediato y Correo");
            event.preventDefault();
            return false;
        }
        
        // Deshabilitar los campos del formulario de activos para evitar validación
        const camposActivos = document.querySelectorAll("#activoCampos input, #activoCampos select, #activoCampos textarea");
        camposActivos.forEach(campo => {
            campo.disabled = true;
        });
        
        // Verificar si el formulario se envía correctamente
        console.log("Formulario de empleado retirado enviado");
        return true;
    }
});

    </script>
</body>
</html>



