<!-- 1.- Copia los formularios de los ejemplos facilitados en los apuntes, tanto el que utiliza el
método POST como el que del método GET. Añádele un campo edad y observa la URL para
poder apreciar cómo se produce el envío de los parámetros. -->

<html> 
    <head> <title>Desarrollo Web</title> </head> 
    <body>

        <?php 
           
        ?>

	    <form name="input" action="Res.php" method="post"> 
	        <label for="nombre">Nombre del alumno: </label>
            <input type="text" name="nombre" id="nombre" />
             <br />
	        <p>Módulos que cursa:</p> 
	        <input type="checkbox" name="modulos[]" value="DWES" />Desarrollo web en entorno servidor<br /> 
	        <input type="checkbox" name="modulos[]" value="DWEC" />Desarrollo web en entorno cliente<br /> <br /> 
	        <input type="submit" name="enviar" value="Enviar" />
    </form>
    </body> 
</html>