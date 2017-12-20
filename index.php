<?php

// para definir una constante se utiliza la funcion define();
// la constante funciona como una variable global
define("PI", 3.141516); //el primer parametro (simpre entre comillas) es el nombre y el segundo su valor
echo PI; //los nombres de las constantes generalmente se escriben en mayusculas
echo "<br>";
 
// hay varios tipos de variables, local, estatica, global y super global o variable de sesion

// varible local
$nombre = "juan";
function getNombre(){
	$nombre = "pedro";
}
getNombre();
echo $nombre; // se imprime juan, la funcion no cambia el valor de la primera variable
echo "<br>";

// variable estatica
function incrementa(){
	static $contador = 0;
	$contador++;
	echo $contador;
}
incrementa(); // imprime 1, la funcion NO destruye el valor de la variable 
incrementa(); // imprime 2, utiliza el valor que tenia la variable anteriormente.
echo "<br>";

// variable global
$nombre = "juan";
function getNombre2(){
	global $nombre;
	$nombre = "pedro";
}
getNombre2();
echo $nombre; // se imprime pedro, la funcion cambia el valor de la primera variable
echo "<br>";

// variable super global o variable de sesion
if (!isset($_SESSION)) {
  session_start(); //es necesario inicializar la sesion antes de usar este tipo de variables
}
$_SESSION['nombre'] = "Rafael";
function renombre(){
	$_SESSION['nombre'] = "juan peralta";	//podemos acceder a este tipo de variable desde cualquier lugar, incluso desde otro archivo
}
renombre();
echo $_SESSION['nombre']; //imprime juan peralta
echo "<br>";

//escapando caracteres
echo "<p class=\"negrita\">hola mundo</p>"; // para escapar un caracter es con barra invertida \
echo "<br/>";

//concatenar 
$nombre = "hernesto";
$apellidos = "Perez Sanchez";
echo "tu nombre es $nombre $apellidos"; //las comillas dobles distingue entre string y variables
echo "<br/>";
echo 'tu $nombre es ' . $nombre . ' ' . $apellidos; // las comillas simple toman como literal el contenido
echo "<br/>";

//comparar string
$nombre = "ramon";
$nombre2 = "Ramon";
$resultado = strcmp($nombre, $nombre2); // compara si son iguales y distingue minusculas de mayusculas, devuelve 0 si son exactamente inguales y 1 si no son iguales
echo $resultado; // resultado es igual a 1
echo "<br/>";
$resultado = strcasecmp($nombre, $nombre2); // compara sin distinguir minusculas de mayusculas
echo $resultado; // resultado es igual a 0
echo "<br/>";



?>