<?php

// CREANDO UNA CLASE
	class Coche{ // los nombre empiezan con mayuscula
		var $rueda; // las propiedades del objeto (por defecto son publicas)
		var $color;
		var $motor;
		function Coche(){ // contructor de la clase, es para dar un estado inicial a las propiedades de una clase, PHP solo permite un unico contructor, se tiene que llamar exactamente igual que la propia clase
			$this->rueda = 4;
			$this->color = "";
			$this->motor = 1.8;		
		}
		function arrancar(){ // metodos de una clase
			return "el coche esta arrancando<br>";
		}
		function frenar(){ // una clase puede tener infinitos metodos
			return "el coche esta frenando<br>";
		}
		function set_color($nuevoColor){ // metodo setter, sirve para redefinir la propiedad de una clase
			$this->color = $nuevoColor;
		}
	}
	
	$carro = new Coche(); // instanciando una clase
	$carro->color="morado"; // cuando una propiedad es publica la podemos modificar fuera de la clase
	echo $carro->color ."<br>";
	echo $carro->arrancar(); // accedemos al metodo de la clase
	echo $carro->rueda ."<br>"; // accedemos a la propiedad de la clase
	$carro->set_color("blanco"); // accediendo a un metrodo constructor, generalmente se le tiene que pasar algun parametro.
	echo $carro->color ."<br>";


// HERENCIA
	class Camion extends Coche{} // con la palabra reservada EXTENDS estamos heredando todo de la super clase Coche (NOTA: no se heredan las propieades encapsuladas con PRIVATE pero si con PUBLIC y PROTECTED)
	$camion = new Camion;
	$camion->set_color("azul");
	echo $camion->color ."<br>";


// SOBRESCRITURA DE METODOS
	class Camioneta extends Camion{
		function arrancar(){ // podemos heredar de otra clase y redefinir sus metodos
			return "la camioneta esta arrancando";
		}
		function frenar(){
			return parent::frenar()." y esta frenando muy bien"; //con PARENT:: le estamo indicando que herede el metodo frenar() y luego podemos agregar mas cosas
		}
	}
	$camioneta = new Camioneta;
	echo $camioneta->arrancar() ."<br>";
	echo $camioneta->frenar() ."<br>";


// ENCAPSULACION CON MODIFICADORES DE ACCESO (public, private, protected)
	class Moto{
		var $color; // PUBLIC por defecto, podemos acceder y modificar esta propiedad desde cualquier lado
		private $ruedas; // con PRIVATE indicamos que esta propiedad solo sea accesible desde la misca clase y no desde fuera
		protected $motor; // con PROTECTED la propiedad es accesible desde la misma clase y desde otras subclases
		function Moto(){
			$this->color = "negro";
			$this->ruedas = 2;
			$this->motor = 120;
		}
		function get_ruedas(){
			return $this->ruedas;
		}
		function set_ruedas($ruedas){
			$this->ruedas = $ruedas;
		}
	}
	$moto = new Moto;
	echo $moto->color ."<br>";
	echo $moto->get_ruedas() ."<br>"; // para acceder a una propiedad PRIVATE o PROTECTED es a travez de un metodo getter
	$moto->set_ruedas(3); // para modificar una propiedad PRIVATE o PROTECTED es a travez de un metodo setter
	echo $moto->get_ruedas() ."<br>"; 


// PROPIEDADES Y METODOS ESTATICOS
	class Persona{
		static $vive = TRUE; // son propias de la clase y NO de los objetos creados, se podria decir que es una constante detro de una clase
		private static $ojos = "Negros"; // al igual que cualquier otra propiedad debemos decirle si queremos que sea public, private o protected para que no se puedad modificar ni acceder desde fuera de la clase
		protected static $pelo;
		function get_ojos(){
			return self::$ojos; // para hacer referencia a una propiedad static se utiliza SELF:: en lugar de $THIS->
		}
		function set_ojos($ojos){
			self::$ojos = $ojos;
		}
	}
	
	Persona::$vive=false; // se puede modificar el valor de una propiedad STATIC siempre que esta no sea PRIVATE o PROTECTED
	
	if(Persona::$vive){
		echo "la persona esta viva" . "<br>";
	} else { echo "la persona fallecio" . "<br>"; }
	
	$antonio = new Persona;
	$antonio->set_ojos("azul");
	echo $antonio->get_ojos();
	

?>