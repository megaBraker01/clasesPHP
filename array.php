<?php
// ARRAY INDEXADOS
	$cosas = array(50, "hola mundo", true, 3.1415);
	$cosas[]='25/06/2017'; // podemos agregar elementos al array
	echo $cosas[4] . "<br>";


// ARRAY ASOCIATIVOS
	$masCosas = array('nombre' => 'Rafael', 'apellidos' => 'Perez Sanchez', 'edad' => 30, 'alta' => TRUE);
	$masCosas[]=3.14; // si no indicamos el nombre del indice, el valor se guarda en la 1ra posicion libre, empezando por la 0 
	$masCosas[]='hola mundo'; // este valor se guardara en la posicion 1 ya que la 0 esta ocupada
	$masCosas['pais']='España';
	//var_dump($masCosas);


// COMPROBAR SI ES UN ARRAY
	if(is_array($masCosas)){
		echo "es un array";
	} else { echo 'no es un array'; }


// FOREACH, se utiliza para recorrer todos los elementos de un arrays (aunque tambien se podria usar un bucle for)
	$x = array("Ramon", 52, "Maria");
	foreach($x as $valor){
		echo $valor . "<br>";
	}
	
	$p = array('nombre' => 'Rafael', 'apellidos' => 'Perez Sanchez', 'edad' => 30, 'alta' => TRUE);
	foreach($p as $clave => $valor){
		echo 'la clave es ' . $clave . ' y su valor es ' . $valor . "<br>";
	}
	
	for($i=0; $i<count($x); $i++){
		echo $x[$i] . '<br>';	
	}
	
// ORDENAR ELEMENTO DEL ARRAY
	$numeros = array(5, 1, 7, 3, 2, 8);
	sort($numeros); // SORT odema los numeros de menor a mayor y los string alfabeticamnte
	var_dump($numeros);


// ARRAY MULTIDIMENSIONALES
	$frutas = array('manzana', 'peras', 'coco');
	$leche = array('vaca', 'cabra', 'desnatada');
	$alimentos = array('tomates', $frutas, $masCosas, 'postre' => 'yogur', $leche, array(50, "hola mundo", true, 3.1415)); //array dentro de otro array
	foreach($alimentos as $clave => $valor){		
		if(is_array($valor)){
			foreach($valor as $propiedad => $vale){
				echo 'la subclave es ' . $propiedad . ' y su subvalor es ' . $vale .'<br>';
			}
			echo '<br>';
		} else { echo 'la clave es ' . $clave . ' y su valor es ' . $valor .'<br>';}
	}


// FUNCIONES FRECUENTES
	sizeof($p); //está desaconsejado usarlo, en su lugar usar count();
	print_r($p); //imprime en pantalla los indices y sus valores de un array
	max($p);// obtiene el valor maximo de una matriz
	min($p); // obtiene el valor minimo de una matriz
	sort($p); // ordena un array por sus valores de menor a mayor
	rsort($p); // ordena un array por sus valores de mayor a menor
	array_shift($p); // quita el primer elemento del array
	array_pop($p); // quita el ultimo elemento del array
	in_array(parametro1, parametro2); // encontra si el 1er parametro esta dentro del 2do parametro (el 2do tiene que ser un array) eje; in_array(2, array), in_array("hola mundo", array)
	implode(", ", $p); // Une elementos de un array en un string, separandolos por el primer parametro (glue o pegamento)
	explode(", "); // Separara un string por el primer parametro (glue) y lo combierte en array indexado

?>
