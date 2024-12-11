<?php

    function flash(string $clave, null|string $mensaje = null): null|string
    {
        // Verificar valor sesion iniciada
        if (!isset($_SESSION)) {
            session_start();
        }

        // Si flash no existe se inicia
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = [];
        }

        if (isset($_SESSION['flash'][$clave])) {
            // Obtenemos el valor asociado a la clave
            $valor = $_SESSION['flash'][$clave];
            // Eliminar clave
            unset($_SESSION['flash'][$clave]);
            // Retornamos el valor recuperado
            return $valor;
        }

        // si el mensaje no es null, crear clave
        if ($mensaje !== null) {
            $_SESSION['flash'][$clave] = $mensaje;
        }

        return $mensaje;
    }

    function iniciar_sesion(): void
    {
        // Comprueba si el estado de la sesión es PHP_SESSION_NONE
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    function estaLogueado(): bool
    {
        return isset($_SESSION['usuario']);
    }

    function redireccionar(string $url): void
    {
        header('Location: '.$url);
    }


    function esPost(): bool
    {
        return ($_SERVER['REQUEST_METHOD'] == 'POST') ? true : false;
    }







?>