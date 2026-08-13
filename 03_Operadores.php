<?php

echo "<h2>Ejemplos de Operadores en PHP</h2> <hr>";

$q = 10;
$w = 5;
$e = "10";
$r = "5";
$t = true;
$y = false;

// Operadores Aritméticos
echo "<h3>Operadores Aritméticos</h3>";

echo "Suma: $q + $w = " . ($q + $w) . "<br>";
echo "Resta: $q - $w = " . ($q - $w) . "<br>";
echo "Multiplicación: $q * $w = " . ($q * $w) . "<br>";
echo "División: $q / $w = " . ($q / $w) . "<br>";
echo "Módulo: $q % $w = " . ($q % $w) . "<br>";
echo "Potencia: $q ** $w = " . ($q ** $w) . "<br>";


// Operadores de Comparación
echo "<h3>Operadores de Comparación</h3>";

echo "Igualdad $w == '$r' : " . ($w == $r ? 'Cumplida' : 'No cumplida') . "<br>";
echo "Igualdad estricta $w === '$r' : " . ($w === $r ? 'Cumplida' : 'No cumplida') . "<br>";
echo "Desigualdad $w != '$r' : " . ($w != $r ? 'Cumplida' : 'No cumplida') . "<br>";
echo "Desigualdad estricta $w !== '$r' : " . ($w !== $r ? 'Cumplida' : 'No cumplida') . "<br>";
echo "Mayor que $w < 10 : " . ($w < 10 ? 'Cumplida' : 'No cumplida') . "<br>";
echo "Menor que $w > 10 : " . ($w > 10 ? 'Cumplida' : 'No cumplida') . "<br>";
echo "Mayor o igual que $w >= 5 : " . ($w >= 5 ? 'Cumplida' : 'No cumplida') . "<br>";
echo "Menor o igual que $w <= 5 : " . ($w <= 5 ? 'Cumplida' : 'No cumplida') . "<br>";

// Operadores Lógicos
echo "<h3>Operadores Lógicos</h3>";

echo "true && false : " . ($t && $y ? 'Cumplida' : 'No cumplida') . "<br>";
echo "true || false : " . ($t || $y ? 'Cumplida' : 'No cumplida') . "<br>";
echo "!true : " . (!$t ? 'Cumplida' : 'No cumplida') . "<br>";


// Operadores de Asignación
echo "<h3>Operadores Asignación</h3>";

$w += 5; 
echo "Después de += 5: $w" . "<br>";
$w -= 3; 
echo "Después de -= 3: $w" . "<br>";
$w *= 2; 
echo "Después de *= 2: $w" . "<br>";
$w /= 4; 
echo "Después de /= 4: $w" . "<br>";
$w %= 3; 
echo "Después de %= 3: $w" . "<br>";


// Operadores de Incremento/Decremento
echo "<h3>Operadores Incremeto</h3>";

$q++;  
echo "Equivalente a += 10: $q" . "<br>"; 
$q--;  
echo "Equivalente a -= 11: $q" . "<br>"; 

// Ejemplo combinado
echo "<h3>Ejemplo Combinado</h3>";

$x = 7;
$y = 2;

if (($x + $y > 8) && ($x - $y < 6)) {
    echo "Concidición cumplida";
} else {
    echo "Condición no cumplida";
}

?>