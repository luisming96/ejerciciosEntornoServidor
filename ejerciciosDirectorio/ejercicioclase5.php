<?php
$nombreArchivo = "./mis_archivos/textos.txt";

if (!file_exists($nombreArchivo)) {
    crearDocumento($nombreArchivo);
}

leerTodo($nombreArchivo);
procesarLineas($nombreArchivo);

function crearDocumento($archivo){
    $nuevoDocumento = fopen($archivo, "x");
    
    for ($n = 1; $n <= 10; $n++) {
        fwrite($nuevoDocumento, "Bienvenid@s\n");
    }
    fclose($nuevoDocumento);
}
function leerTodo($archivo){
    $nuevoDocumento = fopen($archivo, "r");
    $contenido = fread($nuevoDocumento, 1024);
    echo $contenido;
    fclose($nuevoDocumento);
}
function procesarLineas($archivo){
    $nuevoDocumento = fopen($archivo, "r");
    $contador = 0;
    
    while (($linea = fgets($nuevoDocumento)) !== false) {
        $contador++;
        echo "Línea " . $contador . ": " . $linea;
    }
    echo "Total:". $contador ."líneas\n";
    fclose($nuevoDocumento);
}
?>