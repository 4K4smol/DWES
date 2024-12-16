<?php

    use App\Interfaces\UsuarioRepositoryInterface as InterfacesUsuarioRepositoryInterface;
    use App\Models\Usuario;
    use App\Clases\ConexionBD;
    use PDO;
    use PDOException;

    class UsuarioRepositoryInterface implements InterfacesUsuarioRepositoryInterface
    {

        private PDO $conexion;

        public function __construct() {
            $this->conexion = ConexionBD::getConnection();
        }

        public function findById(int $id): ?Usuario {
            $stmt = $this->conexion->prepare("SELECT id, email, password FROM usuarios WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $data = $stmt->fetch();
            if ($data) {
                return new Usuario($data['email'], $data['password'], $data['id']);
            }
            return null;
        }

        public function guardar(Usuario $usuario): bool
        {
            if ($usuario->getId() === null) {
                // Insert
                $stmt = $this->conexion->prepare("INSERT INTO usuarios (email, password) VALUES (:email, :password)");
                return $stmt->execute([
                    'email' => $usuario->getEmail(),
                    'password' => $usuario->getPwd(),
                ]);
            } else {
                // Update porque ya existe
                $stmt = $this->conexion->prepare("UPDATE usuarios SET email = :email, password = :password WHERE id = :id");
                return $stmt->execute([
                    'email' => $usuario->getEmail(),
                    'password' => $usuario->getPwd(),
                    'id' => $usuario->getId()
                ]);
            }
        }
    }




?>