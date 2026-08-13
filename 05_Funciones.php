<?php
// Función simple
echo "<h3>Función simple</h3>";

function funcion() {
    echo "Bloque de código reutilizable";
}

funcion();

// Función con parámetros
echo "<h3>Función con parámetros</h3>";

function parametro($parametro) {
    echo "Función con $parametro";
}

parametro("parametro asignado");

// Parámetros con valor por defecto
echo "<h3>Parámetros con valor por defecto</h3>";

function parametroDefecto($parametro = "parametro por defecto") {
    echo "Función con $parametro" . "<br>";
}

parametroDefecto();        
parametroDefecto("parametro asignado");   

// Función con valor de retorno
echo "<h3>Función con valor de retorno</h3>";

function sumar($a, $b) {
    return $a + $b;
}

$resultado = sumar(5, 5);
echo $resultado; 

// Función con tipo de retorno 
echo "<h3>Función con tipo de retorno </h3>";

function multiplicar(int $a, int $b): int {
    return $a * $b;
}

echo multiplicar(2, 5); 

// Función anónima
echo "<h3>Función anónima</h3>";

$suma = function($a, $b) {
    return $a + $b;
};

echo $suma(5, 5); 

// Función con array
echo "<h3>Función con array</h3>";

function sumarArray($numeros) {
    return array_sum($numeros);
}

echo sumarArray([1, 2, 3, 4]);

// Función flecha
echo "<h3>Función flecha</h3>";

$suma = fn($a, $b) => $a + $b;

echo $suma(5, 5);
?>