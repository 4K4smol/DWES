<?php

    function flash(string $clave, string $mensaje = null): ?string
    {
        iniciar_sesion();
        if (isset($_SESSION['flash']['clave'])) {
            $valor = $_SESSION['flash']['clave'];
            unset($_SESSION['flash']['clave']);
            return $valor;
        }

        if ($mensaje !== null) {
            $_SESSION['flash']['clave'] = $mensaje;
        }

        return $mensaje;
    }

    function iniciar_sesion(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    function estaLogueado(): bool
    {
        iniciar_sesion();
        return isset($_SESSION['usuario']);
    }

    function redireccionar(string $url): void
    {
        header("Location: $url");
        exit();
    }

    function esPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }


?>