<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        :root {
            --success-color: #879683;
            --error-color: #ef4444;
            --primary-color: #3a6ea5;
            --secondary-color: #f9f3e5;
            --bg-color: #f9fafb;
            --card-bg: #ffffff;
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f9f3e5;
            padding: 20px;
            transition: all 0.3s ease;
        }
        
        .message-container {
            text-align: center;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow);
            background-color: var(--card-bg);
            width: 100%;
            max-width: 500px;
            position: relative;
            overflow: hidden;
        }
        
        .message-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background-color: #879683;
            opacity: 0.8;
        }
        
        .success, .error {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .icon-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 1.5rem;
        }
        
        .success .icon-container {
            background-color: #879683;
            color: #f9f3e5;
        }
        
        .error .icon-container {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--error-color);
        }
        
        .icon-container i {
            font-size: 2.5rem;
        }
        
        h1 {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .success h1 {
            color: var(--success-color);
        }
        
        .error h1 {
            color: var(--error-color);
        }
        
        p {
            color: #4b5563;
            margin-bottom: 1.5rem;
            font-size: 1rem;
            line-height: 1.5;
        }
        
        .button-container {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1.5rem;
        }
        
        button {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        button i {
            font-size: 1rem;
        }
        
        .btn_primary {
            background-color: #879683;
            color: #f9f3e5;
        }
        
        .btn_primary:hover {
            background-color: #f9f3e5;
            transform: translateY(-2px);
            color: #879683;
        }
        
        .btn_secondary {
            background-color: var(--secondary-color);
            color: #879683;
        }
        
        .btn_secondary:hover {
            background-color: #879683;
            transform: translateY(-2px);
            color: #f9f3e5;
        }
        
        button:active {
            transform: translateY(0);
        }
        
        @media (max-width: 500px) {
            .button-container {
                flex-direction: column;
            }
            
            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="message-container">
        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'exito'): ?>
            <div class="success">
                <div class="icon-container">
                    <i class="fas fa-check"></i>
                </div>
                <h1>¡Registro actualizado correctamente!</h1>
                <p>Los cambios han sido guardados en el sistema.</p>
            </div>
        <?php elseif (isset($_GET['mensaje']) && $_GET['mensaje'] === 'error'): ?>
            <div class="error">
                <div class="icon-container">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h1>Error al actualizar el registro</h1>
                <?php if (isset($_GET['detalle'])): ?>
                    <p>Detalle del error: <?= htmlspecialchars($_GET['detalle']) ?></p>
                <?php else: ?>
                    <p>Ha ocurrido un problema al procesar su solicitud.</p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="error">
                <div class="icon-container">
                    <i class="fas fa-ban"></i>
                </div>
                <h1>Acceso no autorizado</h1>
                <p>No tiene permiso para acceder a esta página directamente.</p>
            </div>
        <?php endif; ?>
        
        <div class="button-container">
            <button class="btn_primary" onclick="window.location.href='index.html'">
                <i class="fas fa-home"></i> Volver al inicio
            </button>
            <button class="btn_secondary" onclick="history.back()">
                <i class="fas fa-arrow-left"></i> Volver al empleado
            </button>
        </div>
    </div>
</body>
</html>