<!DOCTYPE html>
<html>
<head>
    <title>Formulario Alumno</title>
</head>
<body>
    <h2>Formulario de Alumno</h2>
    <form action="procesaRequest.php" method="POST">
        Nombre del alumno: <input type="text" name="nombre"><br>
        Módulo:
        <select name="modulo">
            <option value="Desarrollo Web en Entorno Servidor">Desarrollo Web en Entorno Servidor</option>
            <option value="Desarrollo Web en Entorno Cliente">Desarrollo Web en Entorno Cliente</option>
        </select><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
