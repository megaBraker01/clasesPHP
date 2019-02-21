//  funcion para hacer benchmarking (medición del rendimiento)
$tiempo_inicio = microtime(true);
// codigo a jecutar (funcion, sentencias, bucles, etc...)
$tiempo_fin = microtime(true);

echo "\nTiempo empleado: " . ($tiempo_fin - $tiempo_inicio);
