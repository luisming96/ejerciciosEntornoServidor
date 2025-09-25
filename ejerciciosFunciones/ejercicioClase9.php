<?php
function dividir($a, $b)
{
    if ($b == 0) {
        throw new Exception("No se puede dividir entre 0\n");
    }
    return $a / $b;
}

try {
    echo "10 / 2 = " . dividir(10, 2) . "\n";
    echo "8 / 4 = " . dividir(8, 4)  . "\n";
    echo "5 / 0 = " . dividir(5, 0) . "\n"; 
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    echo "La operación terminó. \n" ;
}
?>