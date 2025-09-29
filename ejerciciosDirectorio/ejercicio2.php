<?php
// Ejercicio 2: Crear archivo y leer su contenido
if ($archivo = fopen("datos.txt", "w")) {
    fwrite($archivo, "Hola mundo desde PHP\nEsta es la segunda línea\nY esta la tercera");
    fclose($archivo);
    
    echo "Archivo creado correctamente.\n";
    
    if ($archivo = fopen("datos.txt", "r")) {
        $contenido = fread($archivo, filesize("datos.txt"));
        fclose($archivo);
        
        echo "Contenido del archivo:\n";
        echo $contenido;
        
        unlink("datos.txt");
    } else {
        echo "Error al leer archivo";
    }
} else {
    echo "Error al crear archivo";
}
?>