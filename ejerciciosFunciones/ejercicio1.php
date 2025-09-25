<?php
$hora = date('H');

if ($hora >= 6 && $hora < 12) {
    $saludo = "¡Buenos días!";
} elseif ($hora >= 12 && $hora < 20) {
    $saludo = "¡Buenas tardes!";
} else {
    $saludo = "¡Buenas noches!";
}

echo $saludo;
?>