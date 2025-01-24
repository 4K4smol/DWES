<?php

    namespace App\Clases;

    use App\Interfaces\InterfazUsuario;
    use App\conexionBD;
use PDO;
use UsuarioRepositoryInterface;

    Class IUsuario implements InterfazUsuario
    {

        private PDO $conexionBD;

        public function __construct()
        {
            $this->conexionBD = conexionBD::getConnection();
        }

        public function registrar(Usuario $usuario): bool
        {
            $nombre_usuario = $usuario->getUsuario();
            $password = $usuario->getPassword();

            $consulta = "INSERT INTO dwes_03_funicular.usuarios (usuario, password) VALUES( :usuario, :password);";
            $stmt = $this->conexionBD->prepare($consulta);
            return $stmt->execute([
                ':usuario' => $nombre_usuario,
                ':password' => $password,
            ]);
        }

        public function encontrarUsuarioPorNombreUsuario(string $nombre): ?Usuario
        {
            $consulta = "SELECT * FROM dwes_03_funicular.usuarios WHERE usuarios.usuario = :nombre;";
            $stmt = $this->conexionBD->prepare($consulta);
            $stmt->execute([':nombre' => $nombre]);

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                return new Usuario(
                    $resultado['usuario'],
                    $resultado['password'],
                    $resultado['id']
                );
            }

            return null;
        }
    }




?>