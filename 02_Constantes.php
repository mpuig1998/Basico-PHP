<?php

// Uso directo
define("SALUDO", "Hola");
const NOMBRE = "Nombre";

echo SALUDO . " " . NOMBRE . "<br>"; //Salto de linea HTML
// Dependiendo el úso de PHP, el salto de linea sera con . PHP_EOL o bien "\n"

// Uso en cálculos
define("IVA", 0.21);

$precio = 100;
$total = $precio + ($precio * IVA);
echo "Total con IVA: " . $total . "<br>"; //Salto de linea HTML

// Función usando constante
define("MULTIPLICADOR", 2);

function duplicar($numero) {
    return $numero * MULTIPLICADOR;
}

echo duplicar(5) . "<br>";

// Constantes mágicas
echo "Archivo: " . __FILE__ . "<br>"; 
echo "Directorio: " . __DIR__ . "<br>";
echo "Línea: " . __LINE__ . "<br>";

function miFunction() {
    echo "Función: " . __FUNCTION__ . "<br>";
    echo "Línea dentro de la función: " . __LINE__ . "<br>";
}

echo miFunction()
?>