<?php
if (mkdir("mis_archivos")) {
    $archivo1 = fopen("mis_archivos/archivo1.txt", "w");
    fwrite($archivo1, "Contenido del archivo 1");
    fclose($archivo1);

    $archivo2 = fopen("mis_archivos/archivo2.txt", "w");
    fwrite($archivo2, "Contenido del archivo 2");
    fclose($archivo2);
    

    echo "Archivos en el directorio:\n";
    $archivos = scandir("mis_archivos");
    print_r($archivos);
    
    unlink("mis_archivos/archivo1.txt");
    unlink("mis_archivos/archivo2.txt");
    rmdir("mis_archivos");
    
} else {
    echo "Error al crear directorio";
}
?>