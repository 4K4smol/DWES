<?php
require '../libreria/autoload.php';

use App\Clases\AdaptadorGeneradorPassword;

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $longitud = (int) $_POST['Longitud']; // Convertir la longitud a entero
    $incluirMayusculas = isset($_POST['Mayus']);
    $incluirMinusculas = isset($_POST['Min']);
    $incluirNumeros = isset($_POST['Numeros']);
    $incluirSimbolos = isset($_POST['Simbolos']);

    if (!isset($longitud) || $longitud < 4) {
        $mensaje = "La longitud debe ser al menos 4 caracteres.";
    } elseif (!$incluirMayusculas && !$incluirMinusculas && !$incluirNumeros && !$incluirSimbolos) {
        $mensaje = "Debes seleccionar al menos una opción para generar la contraseña.";
    } else {
        $generador = new AdaptadorGeneradorPassword();
        $password = $generador->generar($longitud, $incluirMayusculas, $incluirMinusculas, $incluirNumeros, $incluirSimbolos);
        $mensaje = "La contraseña generada es: $password";
    }
}
?>

<!DOCTYPE html>
<html lang="ES_es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 composer</title>
</head>
<body>
    <form method="post">
        <fieldset>
            <legend>Configuración de generación de contraseña</legend>
            <label for="Mayus">Mayúsculas</label>
            <input type="checkbox" id="Mayus" name="Mayus"><br>
            <label for="Min">Minúsculas</label>
            <input type="checkbox" id="Min" name="Min"><br>
            <label for="Numeros">Números</label>
            <input type="checkbox" id="Numeros" name="Numeros"><br>
            <label for="Simbolos">Símbolos</label>
            <input type="checkbox" id="Simbolos" name="Simbolos"><br><br>
            <label for="Longitud">Longitud</label>
            <input type="number" id="Longitud" name="Longitud" required><br>
            <br>
            <button type="submit">Generar Contraseña</button>
        </fieldset>
    </form>
    <br>
    <?php if ($mensaje): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>
</body>
</html>
