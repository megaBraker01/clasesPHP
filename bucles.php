<?php

// INDETERMINADOS
	// while, se ejecuta simpre y suando su condicion sea verdadera
	$i=1;
	while($i<=5){
		echo $i++ . "<br>";
		if($i == 4){
			echo 'hemos llegado a donde queremos' . "<br>";
			break; // para interrumpir cualquier bucle se utiliza break
		}
	}
	
	
	// do while, se ejecuta al menos una vez aunque su condicion NO sea verdadera
	$z=6;
	do{
		echo $z++ . "<br>";
	}while($z<=5);
	
	
	// foreach, se utiliza para recorrer todos los elementos de un arrays (aunque tambien se podria usar un bucle for)
	$x = array("Ramon", "Pedro", "Maria");
	foreach($x as $valor){
		echo $valor . "<br>";
	}
	
	$p = array('nombre' => 'Rafael', 'apellidos' => 'Perez Sanchez', 'edad' => 30, 'alta' => TRUE);
	foreach($p as $clave => $valor){
		echo 'la clave es ' . $clave . ' y su valor es ' . $valor . "<br>";
	}
	
	
// DETERMINADOS
	// for, se ejecuta todas las veces que le indiquemos
	for($n=3; $n>=-3; $n--){
		if($n == 0){
			echo "no se puede dividir entre 0 <br>";
			continue; // para odviar un resultado usamos continue
		}
		echo "5 / $n = " . 5/$n . "<br>";
	}
	
	// recorriendo arrays indexados con for
	for($i=0; $i<count($x); $i++){
		echo $x[$i] . "<br>";
	}
	
	// recorriendo arrays asociativos multidimendionales con for
	$c = array($p, 
				array('nombre' => 'Maria', 'apellidos' => 'Ramirez', 'edad' => 25, 'alta' => TRUE), 
				array('nombre' => 'Antonio', 'apellidos' => 'Gonzalez', 'edad' => 27, 'alta' => TRUE),
				array('nombre' => 'Carol', 'apellidos' => 'Ramirez', 'edad' => 31, 'alta' => TRUE),
				);
				
	for($i=0; $i<count($c); $i++){
		for($z=0; $z<count($i); $z++){
			echo "Nombre: " . $c[$i]['nombre'] . "<br> Apellidos: " . $c[$i]['apellidos'] . " <br>Edad: " . $c[$i]['edad'] . " <hr>";
		}
	}
	
?>