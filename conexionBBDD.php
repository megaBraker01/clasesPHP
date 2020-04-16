<?php
// creamos constantes
	define('HOSTNAME', 'localhost');
	define('DATABASE', 'concurso');
	define('USER', 'root');
	define('PASSWORD', '');


// CONEXION MYSQLI POR PROSEDIMIENTO
	$conexion = mysqli_connect(HOSTNAME, USER, PASSWORD, DATABASE); // realizamos la conexion
	if (!$conexion) { // validamos si hay algun error al conecar con la bbdd
		printf("Fallo en la conexion: %s\n", mysqli_connect_error()); // avisamos del error
		exit(); // salimos 
	}
	mysqli_set_charset($conexion, 'utf8'); // especificamos la codificacion de la conexion
	
	$consulta = 'SELECT * FROM usuarios'; // especificamos la consuta deseada
	
	$resultados = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion)); // realizamos la consulta con la conexion y si hay un error lo mostramos 
	
// podemos recorrer los registros con sus indices con mysqli_fetch_row o con sus valores asociativos con mysqli_fetch_assoc o mysqli_fetch_array ...si lo que queremos es ahorrar en recursos podemos utilizar cualquiera de las 2 primeras, ya que la última “mysql_fetch_array” generá los 2 arrays de mysql_fetch_row y mysql_fetch_assoc.
	$mostrar = array();
	while($fila = mysqli_fetch_row($resultados)){ // recorremos todos los registros por sus indices
		$mostrar[] = $fila[0] . " - " . $fila[1] . " - " . $fila[2] . " - " . $fila[3] . "<br>"; // si metemos el resultado en una variable o array entonces podremos cerrar antes la conexion y luego trabajar con dicha varible o array
	}
	echo '<br>';
	while($fila = mysqli_fetch_assoc($resultados)){ // recorremos los registros como array asociativos
		echo $fila['usuId'] . " - " . $fila['usuEmail'] . " - " . $fila['usuPassword'] . " - " . $fila['usuNombre'] . "<br>";
	}
	echo '<br>';
	mysqli_close($conexion); // cerramos la conexion
	mysqli_free_result($resultados); // liberamos la memoria asociada al resultado de registros
	
	var_dump($mostrar); // podremos trabajar con los datos aunque la conexion ya este cerrada
	

// CONEXION MYSQLI ORIENTADO A OBJETOS
	$conexion = new mysqli(HOSTNAME, USER, PASSWORD, DATABASE); // realizamos la conexion
	if ($conexion->connect_errno) { // validamos si hay algun error al conecar con la bbdd
		printf("Fallo en la conexión: %s\n", $conexion->connect_error); // avisamos del error
		exit(); // salimos 
	}
	$conexion->set_charset("utf8");  // especificamos la codificacion de la conexion
	
	$consulta = 'SELECT * FROM usuarios'; // especificamos la consuta deseada
	
	$resultados = $conexion->query($consulta) or die($conexion->error); // realizamos la consulta con la conexion y si hay un error lo mostramos 
	
	$mostrar = "";
	while($fila = $statement->fetch_row()){ // recorremos todos los registros por sus indices
		$mostrar .= $fila[0] . " - " . $fila[1] . " - " . $fila[2] . " - " . $fila[3] . "<br>"; // si metemos el resultado en una variable o array entonces podremos cerrar antes la conexion y luego trabajar con dicha varible o array
	}
	echo '<br>';
	while($fila = $statement->fetch_assoc()){ // recorremos los registros como array asociativos
		echo $fila['usuId'] . " - " . $fila['usuEmail'] . " - " . $fila['usuPassword'] . " - " . $fila['usuNombre'] . "<br>";
	}
	echo '<br>';
	$conexion->close(); // cerramos la coneccion
	$statement->free(); // liberamos la memoria asociada al resultado
	
	echo $mostrar . "<br>"; // podremos trabajar con los datos aunque la conexion ya este cerrada


// CONEXION MYSQLI CON CLASES
	class Conexion{
		protected $conexion;
		public function Conexion(){
			$this->conexion = new mysqli(HOSTNAME, USER, PASSWORD, DATABASE);
			if($this->conexion->connect_errno){
				printf("Fallo en la conexión: %s\n", $this->conexion->connect_error); // avisamos del error
				return;
			}
			$this->conexion->set_charset("utf8");
			return $this->conexion;
		}
	}
	
	$consulta = 'SELECT * FROM usuarios';
	$conexion = new Conexion;
	$statement = $conexion->Conexion()->query($consulta);
	$mostrar = "";
	while($fila = $statement->fetch_assoc()){ // recorremos los registros como array asociativos
		$mostrar .= $fila['usuId'] . " - " . $fila['usuEmail'] . " - " . $fila['usuPassword'] . " - " . $fila['usuNombre'] . "<br>";
	}
	$conexion = NULL; // cerramos la coneccion
	echo $mostrar . "<br>";


// CONEXION PDO ORIENTADO A OBJETOS
	try{
		$conexion = new PDO('mysql:host=' .HOSTNAME. '; dbname=' .DATABASE, USER, PASSWORD); // realizamos la conexion
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // preparamos las excepciones
		$conexion->exec('SET CHARACTER SET utf8');  // especificamos la codificacion de la conexion
	} catch(Exception $e){ // validamos si hay algun error al conecar con la bbdd
		die('Fallo en la conexion: ' .$e->GetMessage()); // avisamos del error
		exit(); // salimos 
	}
	
	$consulta = 'SELECT * FROM usuarios WHERE usuFechaAlta < ?'; // especificamos la consuta deseada, el interrogante (marcador) se sustituye por una variable
	
	$statement = $conexion->prepare($consulta);
	
	$variable = date('Y-m-d');
	//echo $variable;
	$statement->execute(array($variable));
	echo $statement->debugDumpParams() . "<br>"; // podemos debugear con el metodo debugDumpParams()
	
	$mostrar = "";
	while($fila = $statement->fetch(PDO::FETCH_NUM)){ // recorremos todos los registros por sus indices
		$mostrar .= $fila[0] . " - " . $fila[1] . " - " . $fila[2] . " - " . $fila[3] . "<br>";
	}
	echo $mostrar . "<br>";
	
	$mostrar = "";
	while($fila = $statement->fetch(PDO::FETCH_ASSOC)){ // recorremos los registros como array asociativos
		$mostrar .= $fila['usuId'] . " - " . $fila['usuEmail'] . " - " . $fila['usuPassword'] . " - " . $fila['usuNombre'] . "<br>";
	}
	echo $mostrar . "<br>";
	
	$mostrar = "";
	while($fila = $statement->fetch(PDO::FETCH_OBJ)){ // recorremos los registros como objetos
		$mostrar .= $fila->usuId . " - " . $fila->usuEmail . " - " . $fila->usuPassword . " - " . $fila->usuNombre . "<br>";
	}	
	$conexion = NULL; // cerramos la coneccion
	$statement->closeCursor(); // liberamos la memoria asociada al resultado
	
	echo $mostrar . "<br>"; // podremos trabajar con los datos aunque la conexion ya este cerrada


// CONEXION PDO CON CLASES
	class Conexion2{
		protected $conexion;
		public function __construct(){
			try{
				$this->conexion = new PDO('mysql:host=' .HOSTNAME. '; dbname=' .DATABASE, USER, PASSWORD); // realizamos la conexion
				$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // preparamos las excepciones
				$this->conexion->exec('SET CHARACTER SET utf8');  // especificamos la codificacion de la conexion
				return $this->conexion;
			} catch(Exception $e){ // validamos si hay algun error al conecar con la bbdd
				die('Fallo en la conexion: ' .$e->GetMessage()); // avisamos del error
				exit(); // salimos 
			} 
		}
		
		public function Conectar(){
			return $this->conexion;
		}
	}
	
	$consulta = 'SELECT * FROM usuarios';
	$conexion = new Conexion2;
	$statement = $conexion->Conexion()->prepare($consulta);
	$statement->execute(array());
	$mostrar = "";
	while($fila = $statement->fetch(PDO::FETCH_ASSOC)){ // recorremos los registros como array asociativos
		$mostrar .= $fila['usuId'] . " - " . $fila['usuEmail'] . " - " . $fila['usuPassword'] . " - " . $fila['usuNombre'] . "<br>";
	}
	$conexion = NULL; // cerramos la coneccion
	$statement->closeCursor(); // liberamos la memoria asociada al resultado
	// $statement->queryString // obtenemos la consulta que se va a ejecutar
	// $statement->getColumnMeta(0) // obtenemos la informacion del campo especificado, donde 0 es la posicion del campo
	
	echo $mostrar . "<br>";


?>
