<?php

    namespace Examen04\Clases\Producto;

    use Examen04\Interfaces\RepositorioInterfaz;
    use Examen04\Clases\ConexionBD;
    use Examen04\Clases\Producto\Producto;
    use Examen04\Clases\Familia;
    use Examen04\Clases\Imagen;
    use PDO;
    use PDOException;

    class FuncionesRepositorio implements RepositorioInterfaz{

        private PDO $conexion;

        public function __construct() {
            $this->conexion = ConexionBD::getConnection();
        }

        public function crear(Producto $producto):bool
        {
            $this->conexion->beginTransaction();
            try {
                $query = "INSERT INTO productos (nombre,descripcion,precio,familia,imagen)
                VALUES (:nombre, :descripcion, :precio, :familia, :imagen);";
                $stmt = $this->conexion->prepare($query);
                return $stmt->execute(params: [
                    ':nombre' => $producto->nombre,
                    ':descripcion' => $producto->descripcion,
                    ':precio' => $producto->precio,
                    ':familia' => $producto->familia,
                    ':imagen' => $producto->imagen,
                ]);
            } catch (PDOException $e) {
                "Error al insertar registro" .$e->getMessage();
            }
        }

        public function listar(): array
        {
            try {
                $query = "SELECT productos.id, productos.nombre,productos.descripcion,productos.precio,
                familias.codigo,familias.nombre as familiaNombre,
                imagenes.id as imagenId,imagenes.nombre as imagenNombre,imagenes.url 
                FROM dwes_examen04.productos 
                left join dwes_examen04.familias on productos.familia=familias.codigo
                left join dwes_examen04.imagenes on productos.imagenId=imagenes.id;";
                $stmt = $this->conexion->query($query);

                $productos=[];

                while ($row = $stmt->fetch(mode: PDO::FETCH_ASSOC)) {
                    $familia = new Familia($row['codigo'],$row['familiaNombre']);
                    $imagen = new Imagen($row['imagenNombre'], $row['url'], $row['imagenId']);
                    $productos[] = new Producto(
                        nombre: $row['nombre'],
                        descripcion: $row['descripcion'],
                        precio: $row['precio'],
                        familia: $familia->getCodigo(),
                        imagen: $imagen->getId(),
                        id: $row['id']
                    );
                }

                return $productos;

            } catch (PDOException $e) {
                "Error al insertar recoger productos" .$e->getMessage();
            }
        }
        
        public function listarPorId(int $id):Producto{
            return $a;
        }
        public function borrar(int $id):bool{
            return $a;
        }

    }
?>