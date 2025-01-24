<?php

namespace App;

use PDO;

class Autentificarse
{
    private static ?PDO $conexionBD = null;

    /**
     * Constructor.
     */
    public function __construct()
    {
        self::$conexionBD = ConexionBD::getConexionBD();
    }

    /**
     * Inicializa la sesión si no está iniciada.
     */
    public static function inicializar(): void
    {
        iniciar_sesion();
    }

    /**
     * Configura el entorno, creando la tabla de usuarios y datos iniciales.
     */
    public static function configurar(): void
    {
        self::$conexionBD = ConexionBD::getConexionBD();
        $consulta = "CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY, 
            nombre VARCHAR(100) NOT NULL,
            email VARCHAR(150) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            fecha DATETIME DEFAULT CURRENT_TIMESTAMP
        );";

        $stmt = self::$conexionBD->prepare($consulta);
        $stmt->execute();

        self::crearDatosUsuario();
    }

    /**
     * Método privado que crea un usuario de ejemplo.
     */
    private static function crearDatosUsuario(): void
    {
        $consulta = "INSERT INTO usuarios (nombre, email, password, fecha)
                     VALUES (:nombre, :email, :password, :fecha)";
        $stmt = self::$conexionBD->prepare($consulta);

        // Crear usuario de ejemplo
        $nombre = "Ejemplo Usuario";
        $email = "ejemplo@educantabria.es";
        $password = password_hash("password", PASSWORD_DEFAULT);
        $fecha = date('Y-m-d H:i:s');

        $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':password' => $password,
            ':fecha' => $fecha,
        ]);
    }


    public static function autenticar(): void
    {
        // Verificar si la solicitud es POST
        if (!esPost()) {
            flash('error', 'Método HTTP no permitido');
            redireccionar('/index.php?accion=paginaLogin');
        }

        // Verificar si el usuario ya está logueado
        if (estaLogueado()) {
            redireccionar('/index.php?accion=paginaConectado');
        }

        // Obtener las variables POST
        $correo = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if (!$correo || !$password) {
            flash('error', 'Por favor, complete todos los campos');
            redireccionar('/index.php?accion=paginaLogin');
        }

        // Consultar en la base de datos si el correo existe
        $consulta = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = self::$conexionBD->prepare($consulta);
        $stmt->execute([':email' => $correo]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si el usuario existe y la contraseña es válida
        if ($usuario && password_verify($password, $usuario['password'])) {
            iniciar_sesion();
            $_SESSION['usuario'] = [
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'email' => $usuario['email'],
            ];

            // Redirigir a la página conectada
            redireccionar('/index.php?accion=paginaConectado');
        } else {
            // Si hay error, crear un mensaje flash y redirigir al login
            flash('error', 'Credenciales incorrectas');
            $_SESSION['correo_temporal'] = $correo; // Guardar el correo para mostrarlo en el formulario
            redireccionar('/index.php?accion=paginaLogin');
        }
    }
    public static function paginaConectado(): void
    {
        if (!estaLogueado()) {
            flash('error', 'No tienes acceso a esta página');
            redireccionar('/index.php?accion=paginaLogin');
        }

        // Redirige a la página conectada
        include __DIR__ . '/../public/paginaConectado.php';
        exit();
    }

    /**
     * Método para desconectar al usuario.
     *
     * @return void
     */
    public static function desconectarse(): void
    {
        iniciar_sesion();
        session_unset();  // Elimina todas las variables de sesión
        session_destroy(); // Destruye la sesión
        redireccionar('/index.php?accion=paginaLogin');
    }

    /**
     * Método para mostrar la página de login si el usuario no está conectado.
     *
     * @return void
     */
    public static function paginaLogin(): void
    {
        if (estaLogueado()) {
            redireccionar('/index.php?accion=paginaConectado');
        }

        // Redirige a la página de login
        include __DIR__ . '/../public/paginaLogin.php';
        exit();
    }

    /**
     * Método que ejecuta una acción basada en el parámetro `accion` en la URL.
     *
     * @return void
     */
    public static function runAccion(): void
    {
        $accion = $_GET['accion'] ?? 'paginaLogin';

        switch ($accion) {
            case 'paginaLogin':
                self::paginaLogin();
                break;

            case 'autenticar':
                self::autenticar();
                break;

            case 'paginaConectado':
                self::paginaConectado();
                break;

            case 'desconectarse':
                self::desconectarse();
                break;

            default:
                redireccionar('/index.php?accion=paginaLogin');
                break;
        }
    }

}

?>
