<?php
$promedio = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {//Se comprueba si el formulario se envió con método POST.
    // Obtener los números del formulario
    $entrada = trim($_POST["numeros"]); //Se recogen los números que introdujo el usuario con $_POST["numeros"].

    // Convertir la cadena en array de números
    $numeros = explode(" ", $entrada);
    $numeros = array_map('floatval', $numeros);

    // Calcular promedio
    $suma = array_sum($numeros);
    $contador = count($numeros);

    if ($contador > 0) {
        $promedio = $suma / $contador;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Promedio</title>
</head>
<body>
    <h2>Calculadora de Promedio</h2>
    <form method="post">
        <label>Introduce números separados por espacios:</label><br>
        <input type="text" name="numeros" required>
        <button type="submit">Calcular</button>
    </form>

    <?php if ($promedio !== null): ?>
        <p><strong>El promedio es:</strong> <?= $promedio ?></p>
    <?php endif; ?>
</body>
</html>
