<?php

    namespace App;

    use PDO;
    use PDOException;

    $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv -> load();

    class ConexionBD
    {

        private static  ?PDO $conexionBD = null;

        final private function __construct(){}

        final public static function getConexionBD(): ?PDO
        {
            try {
                if (!self::$conexionBD) {
                    self::$conexionBD = new PDO(
                        dsn: $_ENV['DB_DSN'],
                        username: $_ENV['DB_USERNAME'],
                        password:$_ENV['DB_PASSWORD'],
                    );
                }
            } catch (PDOException $e) {
                echo "ERROR AL CONECTAR BASE " . $e->getMessage();
            }

            return self::$conexionBD;
        }

        private function __clone() {}

    }

?>