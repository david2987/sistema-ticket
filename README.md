# Aplicación de Gestión de Tareas

Este proyecto es una aplicación web desarrollada en PHP para la gestión de tareas personales. Permite a los usuarios registrarse, iniciar sesión y realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) sobre una lista de tareas, garantizando la seguridad y la correcta gestión de la información.

## Características

*   **Gestión de Usuarios:**
    *   Registro de nuevos usuarios.
    *   Inicio de sesión con generación de token JWT.
    *   Renovación de sesión configurable.
*   **Gestión de Tareas:**
    *   Creación de tareas con título, descripción, fecha de vencimiento y estado.
    *   Lectura de todas las tareas del usuario autenticado.
    *   Actualización de tareas específicas.
    *   Eliminación de tareas específicas.
*   **Autenticación y Autorización:**
    *   Protección de rutas con autenticación JWT.
    *   Autorización para que los usuarios solo gestionen sus propias tareas.

## Tecnologías Utilizadas

*   PHP 8+
*   Composer (para gestión de dependencias)
*   MySQL (o SQLite)
*   `firebase/php-jwt` (u otra librería JWT)

## Requisitos

*   PHP 8+ instalado.
*   Composer instalado.
*   Servidor web (Apache, Nginx, etc.).
*   Base de datos MySQL (o SQLite).

## Instalación

1.  Clonar el repositorio:

    ```bash
    git clone https://github.com/david2987/sistema-ticket.git    ```

2.  Navegar al directorio del proyecto:

    ```bash
    cd task-manager
    ```

3.  Instalar las dependencias con Composer:

    ```bash
    composer install
    ```

4.  Configurar la base de datos:
    *   Crear una base de datos en MySQL (o crear el archivo de base de datos SQLite).
    *   Copiar el archivo `.env.example` a `.env` y configurar las variables de entorno, incluyendo la conexión a la base de datos. Ejemplo:

        ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=tasks
        DB_USERNAME= usuario
        DB_PASSWORD= contraseña
        JWT_SECRET=tu_clave_secreta_jwt
        JWT_LIFETIME=3600 #tiempo de vida del token en segundos
        ```

5.  Ejecutar las migraciones (si utilizas migraciones):

    ```bash
    php artisan migrate
    ```
    *(Ajusta este comando si no usas un framework como Laravel)*

## Estructura del Proyecto

El proyecto sigue una estructura MVC (Modelo-Vista-Controlador) para una mejor organización:

*   `app/`: Contiene la lógica de la aplicación.
    *   `Controllers/`: Controladores que manejan las solicitudes.
    *   `Models/`: Modelos que interactúan con la base de datos.
*   `config/`: Archivos de configuración.
*   `database/`: Archivos relacionados con la base de datos.
*   `routes/`: Rutas de la aplicación.
*   `public/`: Archivos públicos (CSS, JavaScript, imágenes).

## Endpoints de la API

**Autenticación (AuthController)**

`GET /register`: Mostrar el formulario de registro. (Método: GET)
`POST /register`: Procesar el registro de un nuevo usuario. (Método: POST)
`GET /login`: Mostrar el formulario de inicio de sesión. (Método: GET)
`POST /login`: Procesar el inicio de sesión del usuario. (Método: POST)
`GET /logout`: Cerrar la sesión del usuario. (Método: GET)
`GET /profile/(:num)` : Mostrar el perfil de un usuario específico (donde :num es el ID del usuario). (Método: GET)
`POST /profile/(:num)`  : Actualizar el perfil de un usuario específico (donde :num es el ID del usuario). (Método: POST)

**Gestión de Tareas (TaskController) - Rutas protegidas por el filtro 'auth'**

`GET /tasks`: Obtener todas las tareas del usuario autenticado. (Método: GET)
`GET /tasks/create`: Mostrar el formulario para crear una nueva tarea. (Método: GET)
`POST /tasks/create`: Procesar la creación de una nueva tarea. (Método: POST)
`GET /tasks/view/(:num)`: Mostrar una tarea específica (donde :num es el ID de la tarea). (Método: GET)
`GET /tasks/edit/(:num)`: Mostrar el formulario para editar una tarea específica (donde :num es el ID de la tarea). (Método: GET)
`POST /tasks/edit/(:num)`: Procesar la edición de una tarea específica (donde :num es el ID de la tarea). (Método: POST)
`GET /tasks/delete/(:num)`: Eliminar una tarea específica (donde :num es el ID de la tarea). (Método: GET)


## Seguridad

*   Las contraseñas se almacenan con hash utilizando `password_hash`.
*   Se realiza validación de entrada para prevenir inyección SQL.
*   Se sanitizan los datos de entrada/salida para prevenir XSS.


## Próximas Mejoras

*   Implementación de pruebas unitarias.
*   Mejoras en la interfaz de usuario (si aplica).
*   Paginación de tareas.

## Autor

David Ezequiel Grant    

