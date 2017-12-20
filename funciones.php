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


// FUNSION CON PARAMETROS POR DEFECTO,
	function capitalizar($caracteres, $todoMayuscula = FALSE){ // en este caso el 2do parametro es opcional
		$caracteres = ucwords($caracteres);
		if($todoMayuscula){
			$caracteres = strtoupper($caracteres);
		}
		return $caracteres;
	}

?>