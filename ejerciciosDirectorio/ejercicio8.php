<?php
// Ejercicio 8: Buscar archivos por extensión
if (mkdir("archivos_test")) {
    $archivo1 = fopen("archivos_test/documento.txt", "w");
    fwrite($archivo1, "Archivo de texto");
    fclose($archivo1);
    $archivo2 = fopen("archivos_test/script.php", "w");
    fwrite($archivo2, "<?php echo 'Hola'; ?>");
    fclose($archivo2);
    $archivo3 = fopen("archivos_test/datos.csv", "w");
    fwrite($archivo3, "nombre,edad\nJuan,25");
    fclose($archivo3);
    $archivo4 = fopen("archivos_test/notas.txt", "w");
    fwrite($archivo4, "Notas importantes");
    fclose($archivo4);
    
    echo "Archivos creados.\n\n";
    echo "Archivos .txt encontrados:\n";
    $archivos = scandir("archivos_test");
    
    foreach ($archivos as $archivo) {
        if ($archivo != "." && $archivo != "..") {
            $extension = pathinfo($archivo, PATHINFO_EXTENSION);
            if ($extension == "txt") {
                echo "- $archivo\n";
            }
        }
    }
    
    unlink("archivos_test/documento.txt");
    unlink("archivos_test/script.php");
    unlink("archivos_test/datos.csv");
    unlink("archivos_test/notas.txt");
    rmdir("archivos_test");
    
} else {
    echo "Error al crear directorio";
}
?>