$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<peliculas>

 <pelicula>
  <titulo>PHP: Tras el Analilzador</titulo>
  <personajes>
   <personaje>
    <nombre>Srta. Programadora</nombre>
    <actor>Onlivia Actora</actor>
   </personaje>
   <personaje>
    <nombre>Sr. Programador</nombre>
    <actor>El Act&#211;r</actor>
   </personaje>
  </personajes>
  <argumento>
   Así que, este lenguaje. Es como, un lenguaje de programación. ¿O es un
   lenguaje de script? Lo descubrirás en esta intrigante y temible parodia
   de un documental.
  </argumento>
  <grandes-frases>
   <frase>PHP soluciona todos los problemas web</frase>
  </grandes-frases>
  <puntuacion tipo="votos">7</puntuacion>
  <puntuacion tipo="estrellas">5</puntuacion>
 </pelicula>
 
 <pelicula>
  <titulo>PHP: Titanic</titulo>
  <personajes>
   <personaje>
    <nombre>Leo</nombre>
    <actor>Dicaprio</actor>
   </personaje>
   <personaje>
    <nombre>Ojitos verdes</nombre>
    <actor>La de las tetas</actor>
   </personaje>
  </personajes>
  <argumento>
   esto va de que se van en un barco y el barco de hunde
  </argumento>
  <grandes-frases>
   <frase>esta peli ganó muchos oscares</frase>
  </grandes-frases>
  <puntuacion tipo="votos">9</puntuacion>
  <puntuacion tipo="estrellas">6</puntuacion>
 </pelicula>
 
</peliculas>
XML;

$xml = new SimpleXMLElement($xmlstr);
//var_dump($xml);

// para acceder a elementos con caracteres reservados (-) se pone entre llaves
$var = $xml->pelicula[0]->{'grandes-frases'}->frase;

// para acceder a atributos de un elemento, se hace como si fuera array asociativo
$var = $xml->pelicula[0]->puntuacion[1]['tipo'];

// accedemos al valor del un elemento, se hace accediendo directamente el elemento
//$var = $xml->pelicula[0]->puntuacion[1];
echo $var;

// para comparar valores hay que hacer la convercion (cast), se pueden hacer varios cast en la mima linea
if ("votos" == (string) $xml->pelicula[0]->puntuacion[0]['tipo']) {
    echo "los votos de la peli 1 son de " . $xml->pelicula[0]->puntuacion[0] . PHP_EOL;
}

// para interactuar por todos los elementos del documento, se hace con xpath
foreach ($xml->xpath('//personaje') as $personaje) {
    echo $personaje->nombre . ' interpretado por ' . $personaje->actor, PHP_EOL;
}

// se puede editar los valores de un elemento
$xml->pelicula[0]->personajes[0]->personaje[0]->nombre = "Jonny Deep";


// para añadir nuevos elementos addChild (nodo)
$personaje = $xml->pelicula[0]->personajes->addChild('personaje');
$personaje->addChild('nombre', 'Sr. Analizador'); // añadimos elementos hijos dentro del elemento que acabamos de crear
$personaje->addChild('actor', 'John Doe');

// para añadir nuevo atributo addAttribute
$puntuacion = $xml->pelicula[0]->addChild('puntuacion', '15h-19h');
$puntuacion->addAttribute('tipo', 'horario');

// para imprimir el documento completo
echo $xml->asXML();
