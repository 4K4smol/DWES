<?php

require '../vendor/autoload.php';

use App\Validators\IbanValidator;

$ibanValidator = new IbanValidator();
$resultado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iban = $_POST['iban'];

    if ($ibanValidator->validarIban($iban)) {
        $resultado = "El IBAN es válido.";
    } else {
        $resultado = "El IBAN no es válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar IBAN</title>
</head>
<body>
    <h1>Validar IBAN</h1>
    <form method="post">
        <label for="iban">Introduce el IBAN:</label>
        <input type="text" id="iban" name="iban" required>
        <button type="submit">Validar</button>
    </form>

    <p><?php echo $resultado; ?></p>
</body>
</html>
