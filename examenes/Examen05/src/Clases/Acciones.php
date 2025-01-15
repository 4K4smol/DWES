<?php
    namespace Examen05\Clases;

    use Examen05\Clases\Puente;
    use Examen05\Clases\PDOUsuario;

    class Acciones
    {
        public static function inicializar(): void
        {
            iniciar_sesion();
        }

        public static function runAccion(): void
        {
            $accion = $_GET['accion'] ?? 'Fuentes/mostrarLogin';

            switch ($accion) {
                case 'mostrarLogin':
                    redireccionar('Fuentes/mostrarLogin.php');
                    break;
                case 'mostrarConectado':
                    redireccionar('Fuentes/mostrarConectado.php');
                    break;
                case 'autenticar':
                    Acciones::autenticar();
                    break;
                default:
                    redireccionar('index.php');
                    break;
            }
        }

        public static function cerrar_sesion(): void
        {
            iniciar_sesion();
            session_unset();
            session_destroy();
            redireccionar("mostrarLogin.php");
        }

        public static function autenticar()
        {

            if (!esPost()) {
                flash('error','No es un metodo post');
                redireccionar("Fuentes/mostrarLogin.php");
            }

            $nombre_usuario = $_POST['nombre_usuario'] ?? null;
            $clave = $_POST['clave'] ?? null;

            if (empty($nombre_usuario) || empty($clave)) {
                flash('error', 'campos no rellenados');
                redireccionar('Fuentes/mostrarLogin.php');
            }

            $usuario_log = new Usuario($nombre_usuario,$clave);

            $pdo_usuario = new PDOUsuario();
            $puente = new Puente($pdo_usuario);

            switch ($puente->comprobarUsuario($usuario_log)) {
                case '1':
                    var_dump($usuario_log);
                    iniciar_sesion();
                    $_SESSION['usuario'] = [
                        'id' => $usuario_log->getId(), // Acceder a la propiedad correcta
                        'nombre_usuario' => $usuario_log->getNombreUsuario(),
                        'clave' => $usuario_log->getClave(),
                    ];
                    redireccionar('Fuentes/mostrarConectado.php');
                    break;
                case '2':
                    flash('Error','Credenciales incorrectas');
                    redireccionar("Fuentes/mostrarLogin.php");
                    break;

                case '-1':
                    flash('Error','Problema con la Base de Datos');
                    redireccionar("Fuentes/mostrarLogin.php");
                    break;

                case '0':
                    flash('Error','Usaurio no existe');
                    redireccionar("Fuentes/mostrarLogin.php");
                    break;
            }



        }

    }



?>