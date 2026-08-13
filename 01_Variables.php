<?php

/* 
Comentarios varias lineas
Comentarios varias lineas
*/

// Comentarios de una sola linea

$nombre = 'Un nombre';  // String
$edad = 28;             // Integer
$precio = 19.99;        // Float
$estudiante = true;     // Boolean
$nulo = null;           // NULL


//Array
$colores = ["Red", "Green", "Blue"];


function variableLocal() {
    $localVar = "Esto es una variable local";
    return $localVar;
}

$globalVar = "Esto es una variable global";

function variableGlobal() {
    global $globalVar;
    return $globalVar;
}

function incremento() {
    static $num = 0;
    $num++;
    return $num;
}
?>


