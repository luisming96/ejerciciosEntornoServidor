<?php
function crearMultiplicador($factor) {
    return function($numero) use ($factor) {
        return $numero * $factor;
    };
}
$por2 = crearMultiplicador(2);
echo "Ejercicio 4" . $por2(5) . "\n";
?>