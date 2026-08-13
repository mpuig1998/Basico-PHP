<?php
// CONFIGURACIÓN GENERAL

// Tipo de contenido que devolvemos al frontend
header('Content-Type: application/json');

// Medidas básicas de seguridad
header("X-Content-Type-Options: nosniff");             // Evita que el navegador interprete mal el contenido
header("X-Frame-Options: DENY");                       // Evita que tu página se cargue en iframes externos
header("Content-Security-Policy: default-src 'self'"); // Solo permite recursos del mismo dominio


// CONFIGURACIÓN DE SUBIDA

$carpeta = __DIR__ . "/uploads";   // Carpeta donde se guardarán los archivos
$MAX_SIZE = 2 * 1024 * 1024;       // Tamaño máximo permitido: 2 MB

// Extensiones permitidas
$extensionesPermitidas = ['txt', 'json', 'csv', 'pdf'];

// MIME permitidos (más flexibles para evitar bloqueos inesperados)
$mimesPermitidos = [
    'application/pdf',
    'application/json',
    'text/plain',
    'text/csv',
    'application/octet-stream',
    'inode/x-empty',
    'text/x-c',
    'application/vnd.ms-excel'
];

// Crear carpeta si no existe
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0755, true); // Permisos seguros (NO 777)
}


// PROCESO DE SUBIDA (POST)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Comprobar que el archivo se recibió
    if (!isset($_FILES['archivo'])) {
        echo json_encode(["mensaje" => "No se recibió un archivo"]);
        exit;
    }

    // Revisar errores de PHP en la subida
    $error = $_FILES['archivo']['error'];
    if ($error !== UPLOAD_ERR_OK) {
        // UPLOAD_ERR_OK = 0, todo bien
        echo json_encode([
            "mensaje" => "Error al subir archivo",
            "codigo_error" => $error
        ]);
        exit;
    }

    $rutaTemporal = $_FILES['archivo']['tmp_name']; // Ruta temporal del archivo en el servidor
    $tamano = $_FILES['archivo']['size'];           // Tamaño del archivo en bytes

    // Validación de tamaño
    if ($tamano > $MAX_SIZE) {
        echo json_encode(["mensaje" => "Archivo demasiado grande"]);
        exit;
    }

    // Sanitizar el nombre original para evitar caracteres peligrosos
    $nombreOriginal = basename($_FILES['archivo']['name']);
    $nombreSeguro = preg_replace('/[^a-zA-Z0-9._-]/', '_', $nombreOriginal);

    // Validar extensión
    $extension = strtolower(pathinfo($nombreSeguro, PATHINFO_EXTENSION));
    if (!in_array($extension, $extensionesPermitidas)) {
        echo json_encode(["mensaje" => "Tipo de archivo no permitido"]);
        exit;
    }

    // Validar MIME real del archivo
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $rutaTemporal);
    finfo_close($finfo);

    if (!in_array($mime, $mimesPermitidos)) {
        echo json_encode([
            "mensaje" => "Tipo MIME no permitido",
            "mime_detectado" => $mime
        ]);
        exit;
    }

    // Generar un nombre único para evitar colisiones
    $nombreArchivo = bin2hex(random_bytes(8)) . "." . $extension;
    $destino = $carpeta . "/" . $nombreArchivo;

    // Mover archivo desde temporal a la carpeta definitiva
    if (move_uploaded_file($rutaTemporal, $destino)) {
        $mensaje = "Archivo subido correctamente";
    } else {
        $mensaje = "Error al mover el archivo";
    }

    // Devolver respuesta JSON al frontend
    echo json_encode(["mensaje" => $mensaje]);
    exit;
}


// LISTADO DE ARCHIVOS (GET)
$archivos = array_diff(scandir($carpeta), ['.', '..']); // Ignora '.' y '..'
$resultado = [];
$limiteArchivos = 20; // Evita abuso mostrando demasiados archivos
$contador = 0;

foreach ($archivos as $archivo) {
    if ($contador >= $limiteArchivos) break;

    $ruta = $carpeta . "/" . $archivo;

    if (is_file($ruta)) {
        $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

        // No mostrar contenido de PDFs o archivos grandes
        if (filesize($ruta) > $MAX_SIZE || $extension === 'pdf') {
            $contenido = "[Contenido no mostrado]";
        } else {
            $contenido = file_get_contents($ruta);
        }

        $resultado[] = [
            "nombre" => $archivo,
            "contenido" => $contenido
        ];

        $contador++;
    }
}

// Devolver JSON con la lista de archivos
echo json_encode($resultado);