<?php

// Arrays indexado
$colores = [
    "Red", 
    "Green", 
    "Blue"
    ];
echo "Índice 0: " . $colores[0] . "<br>";

// Array asociativo
$clavesValores = [
    "Clave 1" => 1,
    "Clave 2" => "Valor 2",
    "Clave 3" => True    
];
echo "Valor de la clave: " . $clavesValores["Clave 1"] . "<br>";

// Array multidimensional
$multidimensional = [
    ["Clave 1" => "Valor 1", "Clave 2" => "Valor 2"],
    ["Clave" => True, "Clave 0" => 25]
];
echo "Indexación de la segunda clave: " . $multidimensional[1]["Clave"] . "<br>";

// Array multidimensional completo
$multidimensionales[] = ["Array" => "Valor", "Clave 1" => "Valor 1"]; 

echo "Lista de arrays:<br>";
foreach ($multidimensionales as $m) {
    echo $m["Array"] . $m["Clave 1"] . "<br>";
}
echo "Número de arrays: " . count($multidimensionales) . "<br>";



// FUNCIONES DE ARRAYS
$color = ["Red", "Green", "Blue"];

// array_push agrega al final
array_push($color, "Yellow");
// array_pop elimina el último
$ultimo = array_pop($color);
// array_shift elimina el primero
$primero = array_shift($color);
// array_unshift agrega al inicio
array_unshift($color, "Black");
// array_merge une con otro array
$color = array_merge($color, ["White", "Pink"]);
// count cantidad de elementos
$total = count($color);
// in_array verificar existencia
$existeRed = in_array("Red", $color);
// array_keys obtener índices
$claves = array_keys($color);
// array_values obtener valores
$valores = array_values($color);

// Mostrar resultados en navegador
echo "<h3>Array final:</h3>";
echo "<pre>";
print_r($color);
echo "</pre>";
echo "Último eliminado: $ultimo <br>";
echo "Primero eliminado: $primero <br>";
echo "Total elementos: $total <br>";
echo "¿Existe 'Red'? ";
echo $existeRed ? "Sí<br>" : "No<br>";
echo "<h3>Claves:</h3>";
echo "<pre>";
print_r($claves);
echo "</pre>";
echo "<h3>Valores:</h3>";
echo "<pre>";
print_r($valores);
echo "</pre>";

?>