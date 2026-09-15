<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controlador\FlorController;

$controlador = new FlorController();

$buscar = $_GET['buscar'] ?? '';
$categoria = $_GET['categoria'] ?? '';

$flores = $controlador->filtrarFlores($buscar, $categoria);

$mensaje = '';
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['nombre'] ?? '');
    $categoriaPost = trim($_POST['categoria'] ?? '');
    $precio = trim($_POST['precio'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $imagen = trim($_POST['imagen'] ?? '');


    // VALIDAR NOMBRE
    if ($nombre === '') {
        $errores[] = 'El nombre de la flor es obligatorio.';
    }


    // VALIDAR CATEGORÍA
    if ($categoriaPost === '') {
        $errores[] = 'Debes seleccionar una categoría.';
    }


    // VALIDAR PRECIO
    if ($precio === '') {
        $errores[] = 'El precio es obligatorio.';
    } elseif (!is_numeric($precio) || $precio <= 0) {
        $errores[] = 'El precio debe ser mayor que 0.';
    }


    // VALIDAR DESCRIPCIÓN
    if ($descripcion === '') {
        $errores[] = 'La descripción es obligatoria.';
    }


    // VALIDAR IMAGEN
    if ($imagen === '') {
        $errores[] = 'El nombre de la imagen es obligatorio.';
    }


    // SI NO HAY ERRORES, REGISTRAMOS
    if (empty($errores)) {

        $datos = [
            'nombre' => $nombre,
            'categoria' => $categoriaPost,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'imagen' => $imagen
        ];

        $nuevaFlor = $controlador->registrarFlor($datos);

        $flores[] = $nuevaFlor;

        $mensaje = '¡La flor se registró correctamente!';
    }
}

require_once __DIR__ . '/../src/Vista/menu.php';