<?php
$contador = 0;

function incrementarGlobal() {
    global $contador;
    $contador++;
    return $contador;
}

function incrementarGlobals() {
    $GLOBALS['contador']++;
    return $GLOBALS['contador'];
}

function incrementarParametro($contador) {
    $contador++;
    return $contador;
}

echo incrementarGlobal()."\n";
echo incrementarGlobals()."\n";
echo incrementarParametro($contador)."\n";
?>