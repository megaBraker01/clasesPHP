<?php

/*
function __autoload($nombreClase){
    $directorio_0 = "./{$nombreClase}.php";
    $directorio_1 = "Conexion/{$nombreClase}.php";
    $directorio_2 = "Controlador/{$nombreClase}.php";
    $directorio_3 = "Modelo/{$nombreClase}.php";
    if(file_exists($directorio_0)) {
        require_once($directorio_0);
    } elseif(file_exists($directorio_1)) {
        require_once($directorio_1);
    } elseif(file_exists($directorio_2)) {
        require_once($directorio_2);
    }elseif(file_exists($directorio_3)) {
        require_once($directorio_3);
    } else {
        try{
            die("El archivo {$nombreClase}.php no se ha encontrado en los directorios especificados.");
            // si entra en este bloque, el siguiente codigo no se ejecutará
            $message = "El archivo {$nombreClase}.php no se ha podido encontrar.";
            throw new Exception($message);
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
}
*/

/*
 * hacel al autoloader dentro una carpeta llamada Autoloader/
 * la primera busqueda que hará va a ser en el propio directorio del archivo que lo esta usando
 * si no está, revisará si hay mas direcctorios que esten dentro del direcctorio desde donde se esta usando
 * si no salta un directorio atras y lo revisa (../) y si no está, entonces lista los directorios que haya
 * y si finalmente no lo encuentra entonces muere la aplicacion 
*/
if(!function_exists('autoLoader')){
    function autoLoader($class){
        $currentDir = getcwd();
        $parentDir = "../";     
        $classFile = $class.'.php';
        $clasWasFound = false;
        
        // PRIMERO - buscamos la clase en el directorio actual
        if(is_file($classFile) && !class_exists($class)){
            require_once($classFile);
            $clasWasFound = true;
        }
        
        // SEGUNDO - si no está, identificamos los directorios hijos para buscar entre ellos        
        if(!$clasWasFound){
            $scanCurrentDirList = array_slice(scandir($currentDir), 2); // listamos los directorios que estan dentro del directorio actual
            foreach ($scanCurrentDirList as $dir){
                if(is_dir($dir)){
                    $fullPath = $dir."/".$classFile;
                    if(is_file($fullPath) && !class_exists($class)){
                        require_once($fullPath);
                        $clasWasFound = true;
                        break;
                    }
                } 
            }
        }
        
        // TERCERO - si no está, buscamos en el directorio padre
        if(!$clasWasFound){
            if(is_file($parentDir.$classFile) && !class_exists($class)){
                require_once($parentDir.$classFile);
                $clasWasFound = true;
            }
        }
        
        // CUARTO - si no está, identificamos los directorios hermanos para buscar entre ellos        
        if(!$clasWasFound){
            $scanParentDirList = array_slice(scandir($parentDir), 2);
            foreach ($scanParentDirList as $dir){
                if(is_dir($parentDir.$dir)){
                    $fullPath = $parentDir.$dir."/".$classFile;
                    if(is_file($fullPath) && !class_exists($class)){
                        require_once($fullPath);
                        $clasWasFound = true;
                        break;
                    }
                } 
            }
        }
        
        // QUINTO - si finalmente no esta la clase, paramos la ejecucion
        if(!$clasWasFound){
            die("El archivo {$classFile} no se ha encontrado en los directorios especificados.");
        }
    }
}
spl_autoload_register('autoLoader');
