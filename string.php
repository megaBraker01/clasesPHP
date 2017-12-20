<?php
	
	//ESCAPANDO CARACTERES
	echo "<p class=\"negrita\">hola mundo</p>"; // para escapar un caracter es con barra invertida \
	echo "<br/>";
	
	//CONCATENAR 
	$nombre = "hernesto";
	$apellidos = "Perez Sanchez";
	echo "tu nombre es $nombre $apellidos"; //las comillas dobles distingue entre string y variables (no funciona con constantes)
	echo "<br/>";
	echo 'tu $nombre es ' . $nombre . ' ' . $apellidos; // las comillas simple toman como literal el contenido
	echo "<br/>";
	
	//COMPARAR STRING
	$nombre = "ramon";
	$nombre2 = "Ramon";
	$resultado = strcmp($nombre, $nombre2); // compara si son iguales y distingue minusculas de mayusculas, devuelve 0 si son exactamente inguales y 1 si no son iguales
	echo $resultado; // resultado es igual a 1
	echo "<br/>";
	$resultado = strcasecmp($nombre, $nombre2); // compara sin distinguir minusculas de mayusculas
	echo $resultado; // resultado es igual a 0
	echo "<br/>";
	
	//FUNCIONES FRECUENTES
	trim(); // quita los espacios en blanco de principio y fin de un string	
	strtolower(); // convierte todo el string en minúsculas.
	strtoupper(); // pasa todo el string a mayúsculas.
	ucfirst(); // convierte la primer letra del string en mayúscula.
	ucwords(); // convierte cada primera letra de cada palabra en mayúscula.
	nl2br(); // imprime los saltos de linea que se hayan guardado en la base de datos
	strlen(); //  Nos devuelve el número de caracteres de una cadena. 
	printf("cadena %s, el entero %d y el double %e", $var1, $var2, $ect); //  imprime una cadena de texto formateada, las variables se sustituyen por las letras con % en su respectivo orden, %s para cadenas, %d para enteros y %e para doubles.
	substr("cadena", $inicio, $longitud); //  Devuelve una subcadena de otra, empezando por inicio y de longitud longitud.
	chop(); //  Elimina los saltos de línea y los espacios finales de una cadena. 
	strpos("cadena1", "cadena2"); // Busca la cadena2 dentro de cadena1 indicándonos la posición en la que se encuentra. 
	str_replace("cadena1", "cadena2", "texto"); // Reemplaza la cadena1 por la cadena2 en el texto. 
	strcmp("cadena1", "cadena2"); // Compara dos cadenas y devuelve.
	dechex(); // parA convertir a hexadecimal

?>