<?php
$archivo = fopen("./mis_archivos/usuarios.txt", "x");
if ($archivo) {
    echo "Archivo nuevo creado.\n";
    fwrite($archivo, "Usuario inicial: admin\n");
    fclose($archivo);
    
    $archivo = fopen("./mis_archivos/usuarios.txt", "a");
    fwrite($archivo, "Nuevo usuario: juan\n");
    fclose($archivo);
    
} else {
    echo "El archivo ya existe.\n";
    
    if (is_writable("./mis_archivos/usuarios.txt")) {
        echo "El archivo es escribible.\n";
        
        $archivo = fopen("./mis_archivos/usuarios.txt", "r+");
        if ($archivo) {
            fseek($archivo, 0, SEEK_END);
            fwrite($archivo, "Usuario añadido: maria\n");
            fclose($archivo);
        } else {
            echo "Error al abrir el archivo existente.\n";
        }
    } else {
        echo "No se puede escribir en el archivo.\n";
    }
}

if (file_exists("./mis_archivos/usuarios.txt")) {
    rename("./mis_archivos/usuarios.txt", "./mis_archivos/usuarios_final.txt");
    echo "Archivo renombrado";
}
?>