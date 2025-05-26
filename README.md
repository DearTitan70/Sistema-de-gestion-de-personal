
# Dashboard de Empleados

Este proyecto es un **Dashboard de Empleados** desarrollado en HTML, CSS, JavaScript y PHP, diseñado para la gestión y visualización de información de empleados en una organización.

## Características

- **Visualización de empleados** en una tabla dinámica.
- **Filtros** por nombre, cédula y centro de costo (CECO).
- **Paginación** y selección de cantidad de registros por página.
- **Acciones rápidas**: editar, ver y retirar empleados.
- **Integración con backend PHP** para obtener y verificar datos de empleados.
- **Diseño responsivo** y moderno.
- **Navegación** a vistas de antigüedad, permanencia y estadísticas.

## Estructura de Archivos

- `index.html`: Página principal del dashboard.
- `obtener-empleados.php`: Endpoint backend para obtener la lista de empleados en formato JSON.
- `verificar_empleado.php`: Endpoint backend para verificar si un empleado existe y redirigir a la vista adecuada.
- `editar-empleado.php`: Página para editar información de un empleado.
- `ver_empleado.php`: Página para visualizar información de un empleado.
- `retirar-empleado.php`: Página/acción para retirar a un empleado.
- `FDS_Logo2.webp`: Logo de la empresa.
- Otros archivos HTML para vistas adicionales (antigüedad, permanencia, estadísticas).

## Requisitos

- Servidor web con soporte para PHP (por ejemplo, Apache, Nginx).
- Navegador web moderno.
- Acceso a los endpoints PHP mencionados arriba.

## Instalación y Uso

1. **Clona o descarga** este repositorio en tu servidor web.
2. Asegúrate de que los archivos PHP (`obtener-empleados.php`, `verificar_empleado.php`, etc.) estén correctamente implementados y accesibles.
3. Coloca el logo `FDS_Logo2.webp` en la raíz del proyecto o ajusta la ruta en el HTML.
4. Abre `index.html` en tu navegador.
5. Utiliza los filtros y la paginación para navegar por los empleados.
6. Usa los botones de acción para editar, ver o retirar empleados.

## Personalización

- Puedes modificar los estilos CSS directamente en la etiqueta `<style>` de `index.html`.
- Para agregar o modificar campos de empleados, ajusta tanto el frontend (tabla y filtros) como los endpoints PHP correspondientes.

## Dependencias

- [Font Awesome](https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css) para iconos.
- Backend en PHP para la gestión de datos.

## Notas

- Este dashboard está pensado como un frontend que consume endpoints PHP. Asegúrate de que los endpoints devuelvan los datos en el formato esperado (JSON).
- El sistema de autenticación y autorización no está implementado en este archivo y debe ser gestionado por el backend si es necesario.
