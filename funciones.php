<?php

// PASAR PARAMETROS POR VALOR
	function incremento($numero){ // el valor del parametro fuera de la funsion NO es afectado
		return ++$numero;
	}


// PASAR PARAMETROS POR REFERENCIA
	function decremento(&$parametro){ // el valor de la variable fuera de la funcion es afectado
		return --$parametro;
	}
	$numero = 5;
	echo decremento($numero) . "<br>";
	echo $numero; // en este caso $numero pasa a valer 4 porque es pasado por referencia


// FUNSION CON PARAMETROS POR DEFECTO (ESCALABLES),
// NOTA: El valor predeterminado tiene que ser una expresión constante (NO una variable), un miembro de una clase o una llamada a una función.
// Los valores predeterminados van siempre a la derecha de los no predeterminados
	function capitalizar($caracteres, $todoMayuscula = FALSE, $todoMinuscula = TRUE){ // en este caso el 2do y 3er parametro son opcionales
		$caracteres = ucwords($caracteres);
		if($todoMayuscula){
			$caracteres = strtoupper($caracteres);
		}
		return $caracteres;
	}


// FUNCIONES ANONIMAS
// También conocidas como cierres (closures) Son funciones que no tienen un nombre especificado.
	$mensaje = 'hola';
	// Sin "use"
	$ejemplo = function () {
	    var_dump($mensaje);
	}; // notese que terminan en punto y coma (;)
	$ejemplo();

// tambien se puede usar USE para heredar parametros
	$mensaje = 'mundo';
	// Los cierres también aceptan argumentos normales
	$ejemplo = function ($arg) use ($mensaje) {
	    var_dump($arg . ' ' . $mensaje);
	}; // notese que terminan en punto y coma (;)
	$ejemplo("hola");


// TIPADO DE PARAMETROS
// NOTA: en PHP el tipado de parametros se comporta practicamente como el cast
// ya que float TRUE devuelve 1, int 2.568 devuelve 2, string 692 devuelve "692", bool 3 devuelve TRUE
	function contatenar(float $num1, int $num2, string $var3, bool $var4, array $var5){
		return var_dump($num1, $num2, $var3, $var4, $var5);
	}
// TIPADO DE RETORNO
// tambien se puede especificar el tipo de retorno que tiene que tener una funcion
	function saludar(string $nombre, int $edad) : string{
	   $var = "Hola, me llamo {$nombre} y tengo {$edad} años";
	   return $var; // esta funcion obligatoriamente tiene que devolver un  string
	}

// FUNDION VARIÁDICA
// NOTA: Una función variádica es una función de aridad indefinida, es decir, que acepta una cantidad de argumentos variable
// la aridad es el número de argumentos necesarios para que dicho operador o función se pueda calcular
	function suma() {
	    $cuenta = 0;
	    foreach(func_get_args() as $numero){ // func_get_args funcion de PHP que obtiene todos los argumentos que se estan pasando por nuestra funcion y los devuelve como array
		$cuenta += $numero;
	    }
	    return $cuenta;
	}

	echo suma(2, 5, 8); // Devuelve 15


?>
