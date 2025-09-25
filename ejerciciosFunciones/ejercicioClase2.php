<?php
$numeros = [1, 2, 3, 4];

function calcularPromedio($numeros) {
    $promedio = array_sum($numeros) / count($numeros);
    return $promedio;
}
echo "Ejemplo función normal". calcularPromedio($numeros) . "<br>";

function calcularPromedioFlecha($numeros) {
    return function () use ($numeros) {
        return array_sum($numeros) / count($numeros);
    };
}
$calcularProme = calcularPromedioFlecha($numeros);
echo "Ejemplo funcion anonima". $calcularProme() . "<br>";


$promedio = fn($numeros) => array_sum($numeros) / count($numeros);
echo "Ejemplo funcion flecha): ". $promedio($numeros) . "<br>";
?>