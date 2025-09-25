<?php 
$numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$pares = array_filter($numeros, fn($n) => $n % 2 === 0);

print_r($pares);
?>
