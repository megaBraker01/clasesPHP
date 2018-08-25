<?php
	
	// TERNARIO
	$a = TRUE;
	$b = FALSE;
	$resultado = $a==$b ? "a es igual a b" : "a es distinto de b"; // condicion o valor true ? valor si verdadero : valor si falso
	$resultado = $b ?: $a; // operador Elvis, forma reducida del Ternario, asigna el primer valor de izquierda a derecha que sea distinto a NULL

	//FUNSION DE NULL
	$resultado = $a ?? $b; // devuelve el primer operando de izquierda a derecha que exista y no sea NULL. NULL si no hay valores definidos y no son NULL. Disponible a partir de PHP 7.
	echo ($resultado);
	
	
	// LOGICOS
	$a = TRUE;
	$b = FALSE;
	$a and $b; // And (y) TRUE si tanto $a como $b son TRUE.
	$a or $b; // Or (o inclusivo) TRUE si cualquiera de $a o $b es TRUE.
	$a xor $b; // Xor (o exclusivo) TRUE si $a o $b es TRUE, pero no ambos.
	!$a; // Not (no) TRUE si $a no es TRUE.
	$a && $b; // And (y) TRUE si tanto $a como $b son TRUE. (TIENE MAS PRIORIDAD QUE AND)
	$a || $b; // Or (o inclusivo) TRUE si cualquiera de $a o $b es TRUE. (TIENE MAS PRIORIDAD QUE OR)
	
	
	// ARITMETICOS
	$a = 3;
	$b = 2;
	$resultado = $a + $b; // adicion $resultado == 5
	$resultado = $a - $b; // diferencia $resultado == 1
	$resultado = $a * $b; // multiplicacion $resultado == 6
	$resultado = $a / $b; // division $resultado == 1.5
	$resultado = $a % $b; // modulo $resultado == 1 (toma el signo de $a, si $a es negativa entonces el resultado tambien sera negativo
	$resultado = $a ** $b; // exponenciacion, $resultado == 9
	++$a; // Pre-incremento Incrementa $a en uno, y luego retorna $a.
	$a++; // Post-incremento Retorna $a, y luego incrementa $a en uno.
	--$a; // Pre-decremento Decrementa $a en uno, luego retorna $a.
	$a--; // Post-decremento Retorna $a, luego decrementa $a en uno.
	
	
	// DE COMPARACION
	$a = TRUE;
	$b = FALSE;
	$a == $b; // Igual, TRUE si $a es igual a $b después de la manipulación de tipos.
	$a === $b; // Idéntico, TRUE si $a es igual a $b, y son del mismo tipo.
	$a != $b; // Distinto que o Diferente que, TRUE si $a no es igual a $b después de la manipulación de tipos.
	$a <> $b; // Distinto que o Diferente que, TRUE si $a no es igual a $b después de la manipulación de tipos.
	$a !== $b; // No idéntico, TRUE si $a no es igual a $b, o si no son del mismo tipo.
	$a < $b; // Menor que, TRUE si $a es estrictamente menor que $b.
	$a > $b; // Mayor que, TRUE si $a es estrictamente mayor que $b.
	$a <= $b; // Menor o igual que, TRUE si $a es menor o igual que $b.
	$a >= $b; // Mayor o igual que, TRUE si $a es mayor o igual que $b.
	$a <=> $b; // Nave espacial, devuelve -1 si $a es menor que $b, 0 si son iguales y 1 si $a es mayor a $b.
	
	echo "<br/>";
?>
