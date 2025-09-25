<?php

function sumar($a, $b) {
    return $a + $b;
}

$restar = fn($a, $b) => $a - $b;

$multiplicar = function($a, $b) {
    return $a * $b;
};

$dividir = function($a, $b) {
    return $b != 0 ? $a / $b : 'Error: No se puede dividir por cero.';
};

$opcion = '';

do {
    echo "\n- Calculadora -\n";
    echo "1. Sumar\n";
    echo "2. Restar\n";
    echo "3. Multiplicar\n";
    echo "4. Dividir\n";
    echo "0. Salir\n";
    
    echo "Elige una opción: ";
    $opcion = trim(fgets(STDIN));

    if (!is_numeric($opcion)) {
        echo "Opción no válida. Por favor, ingresa un número del 0 al 4.\n";
        continue;
    }

    if ($opcion === '0') {
        echo "Saliendo... ¡Adiós!\n";
    } elseif (in_array($opcion, ['1', '2', '3', '4'])) {
        echo "Ingresa el primer número: ";
        $input1 = trim(fgets(STDIN));
        echo "Ingresa el segundo número: ";
        $input2 = trim(fgets(STDIN));

        if (!is_numeric($input1) || !is_numeric($input2)) {
            echo "Error: Los valores ingresados no son números. Por favor, inténtalo de nuevo.\n";
            continue;
        }

        $num1 = (float)$input1;
        $num2 = (float)$input2;
        
        if ($opcion === '1') {
            $resultado = sumar($num1, $num2);
            echo "Resultado: " . $num1 . " + " . $num2 . " = " . $resultado . "\n";
        } elseif ($opcion === '2') {
            $resultado = $restar($num1, $num2);
            echo "Resultado: " . $num1 . " - " . $num2 . " = " . $resultado . "\n";
        } elseif ($opcion === '3') {
            $resultado = $multiplicar($num1, $num2);
            echo "Resultado: " . $num1 . " * " . $num2 . " = " . $resultado . "\n";
        } elseif ($opcion === '4') {
            $resultado = $dividir($num1, $num2);
            echo "Resultado: " . $num1 . " / " . $num2 . " = " . $resultado . "\n";
        }
    } else {
        echo "Opción no válida. Por favor, elige un número del 0 al 4.\n";
    }

} while ($opcion != '0');
?>