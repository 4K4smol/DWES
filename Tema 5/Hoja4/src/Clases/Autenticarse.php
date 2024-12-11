<?php

    namespace App\Clases;

    class Autentificarse
    {

        public function inicializar()
        {
            iniciar_sesion();
        }

        public function configurar()
        {
            $consulta = "CREATE TABLE usuarios (
                id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                username BIGINT UNSIGNED,
                pwd VARCHAR(20) UNIQUE,
            );";

        }

    }

?>