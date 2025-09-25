<?php
$nombres = ['juan', 'maria', 'pedro', 'ana'];

$nombres_mayusculas = array_map(function($nombre) {
    return strtoupper($nombre);
}, $nombres);

$nombres_finales = array_map(function($nombre) {
    return "Sr./Sra. " . $nombre;
}, $nombres_mayusculas);

print_r($nombres_finales);

?>