<?php 
$numeroaleatorio = rand(1, 100);
$adivinar = false;
$intentos = 0;

echo "bienvenido a mi juego de adivinar el numero entre 1 y 100\n";
echo  "he generado un numero aleatorio entre 1 y 100, intenta adivinarlo\n";

while (!$adivinar) {
    echo "Introduce tu numero para adivinar el numero escondido";
    $suposicion = (int)trim(fgets(STDIN));
    $intentos++; 
    if ($suposicion < $numeroaleatorio) {
        echo "el numero es mayor\n";
    } elseif ($suposicion > $numeroaleatorio) {
        echo "el numero es menor\n";
    } else {
        echo "felicidades, has adivinado el numero $numeroaleatorio\n";
        echo "Has necesitado $intentos intentos.\n";
        $adivinar = true;
    }
}
?>