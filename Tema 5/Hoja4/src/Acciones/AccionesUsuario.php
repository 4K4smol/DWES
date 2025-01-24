<?php


    namespace App\Acciones;

    use App\Interfaces\InterfazAccionesUsuario;
    use App\ConexionBD;
    use App\Models\Usuario;
    use PDO;

    class AccionesUsuario implements InterfazAccionesUsuario
    {

        private PDO $conexionBD;

        public function __construct()
        {
            $this->conexionBD = ConexionBD::getConexionBD();
        }

        public function registrar(Usuario $usuario): bool
        {
            $consulta = "INSERT INTO dwes07_sesiones.usuarios (nombre, email, password, fecha) VALUES (:nombre, :email, :password, :fecha);";
            $stmt = $this->conexionBD->prepare($consulta);
            return $stmt->execute(params: [
                ':nombre' => $usuario->getNombre(),
                ':email' => $usuario->getEmail(),
                ':password' => $usuario->getPassword(),
                ':fecha' => $usuario->getFecha(),
            ]);
        }

        public function loguear(string $nombre): ?Usuario
        {
            $consulta = "SELECT * FROM dwes07_sesiones.usuarios WHERE usuarios.nombre = :nombre;";
            $stmt = $this->conexionBD->prepare($consulta);
            $stmt->execute(params: [
                ':nombre' => $nombre,
            ]);

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!empty($resultado)) {
                return new Usuario(
                    $resultado['nombre'],
                    $resultado['email'],
                    $resultado['password'],
                    $resultado['fecha'],
                );
            }

            return null;
        }
    }