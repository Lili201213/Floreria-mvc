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
 
    // RECIBIR IMAGEN
    $imagen = $_FILES['imagen'] ?? null; 
 
 
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
    if ($imagen === null || $imagen['error'] === UPLOAD_ERR_NO_FILE) { 
        $errores[] = 'Debes seleccionar una imagen.'; 
    } elseif ($imagen['error'] !== UPLOAD_ERR_OK) { 
        $errores[] = 'Ocurrió un error al subir la imagen.'; 
    } 
 
 
    // SI NO HAY ERRORES, REGISTRAMOS
    if (empty($errores)) { 
 
        // Obtener el nombre original de la imagen
        $nombreImagen = basename($imagen['name']); 
 
        // Carpeta donde se guardarán las imágenes
        $carpetaImagenes = __DIR__ . '/img/'; 
 
        // Ruta completa donde se guardará la imagen
        $rutaImagen = $carpetaImagenes . $nombreImagen; 
 
 
        // Guardar la imagen en public/img
        if (move_uploaded_file($imagen['tmp_name'], $rutaImagen)) { 
 
            $datos = [ 
                'nombre' => $nombre, 
                'categoria' => $categoriaPost, 
                'precio' => $precio, 
                'descripcion' => $descripcion, 
                'imagen' => $nombreImagen 
            ]; 
 
            $nuevaFlor = $controlador->registrarFlor($datos); 
 
            $flores[] = $nuevaFlor; 
 
            $mensaje = '¡La flor se registró correctamente!'; 
 
        } else { 
 
            $errores[] = 'No se pudo guardar la imagen.'; 
        } 
    } 
} 
 
require_once __DIR__ . '/../src/Vista/menu.php';