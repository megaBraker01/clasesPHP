<?php

	// CONSTANTES
	// para definir una constante se utiliza la funcion define();
	// la constante son inmutables
	define("PI", 3.141516); //el primer parametro (simpre entre comillas) es el nombre y el segundo su valor
	echo PI; //los nombres de las constantes generalmente se escriben en mayusculas
	echo "<br>";

	// CONSTANTES DENTRO DE CLASE
	// para definir una constante dentro de una clase se utiliza const NOMBRECONSTANTE = valor;
	// y para acceder se utiliza self::NOMBRECONSTANTE
	class Probando {
		const NOMBRE = "Fulano";
		public function getNombre(){
			return self::NOMBRE;
		}
	}
	 
	// hay varios ambitos de variables, local, estatica, global y super global o variable de sesion
	
	// VARIABLE LOCAL
	$nombre = "juan";
	function getNombre(){
		$nombre = "pedro";
	}
	getNombre();
	echo $nombre; // se imprime juan, la funcion no cambia el valor de la primera variable
	echo "<br>";
	
	// VARIABLES ESTATICA
	function incrementa(){
		static $contador = 0;
		$contador++;
		echo $contador;
	}
	incrementa(); // imprime 1, la funcion NO destruye el valor de la variable 
	incrementa(); // imprime 2, utiliza el valor que tenia la variable anteriormente.
	echo "<br>";
	
	// VARIABLES GLOBAL
	$nombre = "juan";
	function getNombre2(){ // la funcion puede acceder y modificar a la variable aunque esta NO se haya pasado por parametro
		global $nombre;
		$nombre = "pedro";
	}
	getNombre2();
	echo $nombre; // se imprime pedro, la funcion cambia el valor de la primera variable
	echo "<br>";
	
	// VARIABLES SUPER GLOBAL O VARIABLE DE SESION
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
	
	// EL CASTING ES CAMBIAR EL TIPO DE VARIABLE
	$num1 = "5"; // es de tipo string por estar entre comillas
	$resultado = (int)$num1; // la cambiamos a tipo entero explisitamente.
	$resultado = settype($num1, 'string'); // combierte a tipo string, el cast tambien se puede cambiar con la funcion settype
	echo "<br>";

?>
