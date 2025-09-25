<?php
function sumar($a, $b)
{
    return $a + $b;
}

$restar = fn($a, $b) => $a - $b;

$multiplicar = function ($a, $b) {
    return $a * $b;
};

$dividir = function ($a, $b) {
    return $b != 0 ? $a / $b : 'Error: División por cero.';
};

$resultado = null;
$error = null;
$num1 = '';
$num2 = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = trim($_POST['num1']);
    $num2 = trim($_POST['num2']);
    $opcion = $_POST['opcion'];

    if (!is_numeric($num1) || !is_numeric($num2)) {
        $error = "Error: Por favor, ingresa solo números.";
    } else {
        $num1 = (float)$num1;
        $num2 = (float)$num2;

        if ($opcion === '1') {
            $resultado = sumar($num1, $num2);
        } elseif ($opcion === '2') {
            $resultado = $restar($num1, $num2);
        } elseif ($opcion === '3') {
            $resultado = $multiplicar($num1, $num2);
        } elseif ($opcion === '4') {
            $resultado = $dividir($num1, $num2);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
</head>

<body>
    <h2>Calculadora</h2>

    <?php if ($error !== null): ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <?php if ($resultado !== null): ?>
        <p>El resultado es: <?= $resultado ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="num1" value="<?= $num1 ?>" required>
        <select name="opcion">
            <option value="1">+</option>
            <option value="2">-</option>
            <option value="3">*</option>
            <option value="4">/</option>
        </select>
        <input type="text" name="num2" value="<?= $num2 ?>" required>
        <button type="submit">Calcular</button>
    </form>
</body>
</html>