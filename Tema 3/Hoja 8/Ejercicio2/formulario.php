<!DOCTYPE html>
<html>
<head>
    <title>Formulario Alumno</title>
</head>
<body>
    <h2>Formulario de Alumno</h2>
    <form action="procesa.php" method="get">
        Nombre del alumno: <input type="text" name="nombre"><br>
        Módulo:
        <select name="modulo">
            <option value="DesarrolloWebenEntornoServidor">Desarrollo Web en Entorno Servidor</option>
            <option value="DesarrolloWebenEntornoCliente">Desarrollo Web en Entorno Cliente</option>
        </select><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
