<?php

echo "<h2>Ejemplos de Estructuras de control</h2><hr>";

$nota = 10;

// CONDICIONALES
// if / else
if ($nota >= 5) {
    echo "Aprobado.<br>";
} else {
    echo "Suspendido.<br>";
}

// if / elseif/ else
if ($nota >= 9) {
    echo "Sobresaliente.<br>";
} elseif ($nota >= 5) {
    echo "Aprobado.<br>";
} else {
    echo "Suspendido.<br>";
}

// Condicional ternario
echo ($nota >= 5) ? "Aprobado.<br>" : "Suspendido.<br>";


// switch case
$color = "Yellow";

switch ($color) {
    case "Red":
        echo "Concide en el caso 1.<br>";
        break;
    case "Green":
        echo "Coincide en el caso 2.<br>";
        break;
    case "Blue":
        echo "El color en el caso 3.<br>";
        break;                                                     
    default:
        echo "No coincide en ningún caso.<br>";
}

// BUCLES 
// for
echo "Bucle for:<br>";

for ($i = 1; $i <= 5; $i++) {
    echo "Número: $i<br>";
}

// foreach
echo "Bucle foreach:<br>";

$colores = ["Red", "Green", "Blue"];

foreach ($colores as $color) {
    echo "Color: $color<br>";
}

// SENTENCIAS DE CONTROL
// break
for ($i = 0; $i < 10; $i++) {
    if ($i == 5) {
        break;
    }
    echo $i . "<br>";
}
// continue
for ($i = 0; $i < 5; $i++) {
    if ($i == 2) {
        continue;
    }
    echo $i . "<br>";
}

// BUCLES while
// while
echo "Bucle while:<br>";
$contador = 1;

while ($contador <= 5) {
    echo "Número: $contador<br>";
    $contador++;
}

// do while
$i = 1;

do {
    echo "Número: $i <br>";
    $i++;
} while ($i <= 5);

?>