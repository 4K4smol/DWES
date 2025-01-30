<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Animales</title>
</head>
<body>
    <h1>Lista de Animales</h1>
    <ul>
        <?php foreach($animales as $animal): ?>
            <li><?=  $animal->especie ?></li>
        <?php endforeach ?>
    </ul>
</body>
</html>
