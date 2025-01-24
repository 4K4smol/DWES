<?php

    function flash(string $clave, string $mensaje = null): ?string
    {
        // Iniciar sesión si no está iniciada
        iniciar_sesion();

        // Si existe la clave en $_SESSION['flash'], obtener su valor y eliminarla
        if (isset($_SESSION['flash'][$clave])) {
            $valor = $_SESSION['flash'][$clave];
            unset($_SESSION['flash'][$clave]);
            return $valor;
        }

        // Si no existe, establecer el mensaje (si hay) y retornarlo
        if ($mensaje !== null) {
            $_SESSION['flash'][$clave] = $mensaje;
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
        // Consideramos que la sesión está creada si existe una clave 'usuario' o similar
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
