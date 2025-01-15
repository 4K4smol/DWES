<?php

    namespace Examen05\Clases;

    use Examen05\Interfaces\Contratable;
    use PDO;
    use PDOException;
    use Examen05\Clases\Usuario;

    class PDOUsuario implements Contratable
    {
        private PDO $conexionBD;

        public function __construct()
        {
            $this->conexionBD = ConexionBD::getConexion();
        }

        public function comprobarUsuario(Usuario $usuario): int
        {
            $consulta = "SELECT usuarios.id, usuarios.usuario, usuarios.clave
            FROM dwes_examen05.usuarios
            WHERE usuarios.usuario = :usuario;";

            try {
                $stmt = $this->conexionBD->prepare($consulta);

                if (!$stmt->execute([':usuario' => $usuario->getNombreUsuario()])) {
                    return -1;
                }

                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

                if (empty($resultado)) {
                    return 0;
                }

                $usuarioTabla = new Usuario(
                    $resultado['usuario'],
                    $resultado['clave'],
                    $resultado['id']
                );


                // Comprobamos que el usuario es el mismo
                if ($usuarioTabla->getNombreUsuario() == $usuario->getNombreUsuario()) {
                    // Comprobamos que la contraseña es erronea
                    if (!password_verify($usuario->getClave(),$usuarioTabla->getClave())) {
                        return 2;
                    }
                    return 1;
                }

                return -1;  // Asegura siempre un retorno de tipo int
            } catch (PDOException $e) {
                return -1; // Error de base de datos
            }
        }
    }




?>