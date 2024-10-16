<?php
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cantidad = (int) $_POST['cantidad'];
    $origen = $_POST['monedasOrigen'];
    $destino = $_POST['monedasDestino'];
    
    if($origen=='yuan'){
        if($destino=='dolar'){
            $resultado=$cantidad*0.14;
            echo $cantidad." en Yuanes son ".$resultado." Dolares";
        }
        if($destino=='euro'){
            $resultado=$cantidad*0.13;
            echo $cantidad." en Yuanes son ".$resultado." Euros";
        }
    }

    if($origen=='euro'){
        if($destino=='dolar'){
            $resultado=$cantidad*1.09;
            echo $cantidad." en Euros son ".$resultado." Dolares";
        }
        if($destino=='yuan'){
            $resultado=$cantidad*7.74;
            echo $cantidad." en Euros son ".$resultado." YUANES";
        }
    }

    if($origen=='dolar'){
        if($destino=='euro'){
            $resultado=$cantidad*0.92;
            echo $cantidad." en Dolares son ".$resultado." Euros";
        }
        if($destino=='yuan'){
            $resultado=$cantidad*7.12;
            echo $cantidad." en Dolares son ".$resultado." YUANES";
        }
    }

}
?>



<!DOCTYPE html>
<html lang="Es_es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 tema 3 hoja 9</title>
</head>
<body>
    <h1>Conversor de Monedas</h1>
    <hr>
    <form method="post">
        <label for="cantidad">cantidad*</label>
        <input type="number" id="cantidad" name="cantidad"><br><br>
        <label for="monedasOrigen">Origen*</label>
        <select name="monedasOrigen" id="monedasOrigen" required>
            <option value="euro">EURO</option>
            <option value="dolar">DOLAR</option>
            <option value="yuan">YUAN</option>
        </select><br><br>
        <label for="monedasDestino">Destino*</label>
        <select name="monedasDestino" id="monedasDestino">
                <option value="euro">EURO</option>
                <option value="dolar">DOLAR</option>
                <option value="yuan">YUAN</option>
        </select>
        <br><br>
        <button type="submit">Convertir</button>
    </form>
    <hr>
    <?php if ($mensaje): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>
</body>
</html>