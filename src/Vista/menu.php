<?php

$buscar = $buscar ?? '';
$categoria = $categoria ?? '';
$flores = $flores ?? [];
$mensaje = $mensaje ?? '';
$errores = $errores ?? [];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Florería LR</title>

    <link rel="stylesheet" href="/Floreria-mvc/public/css/estilos.css">
</head>

<body>

    <!-- =========================
         ENCABEZADO
    ========================== -->

    <header class="encabezado">

        <div class="contenido-header">

            <span class="decoracion">✿</span>

            <h1>Florería ♥lili♥</h1>

            <p>
                Flores que hablan por ti
            </p>

            <button
                type="button"
                class="btn-registrar"
                id="abrirFormulario"
            >
                🌷 Registrar nueva flor
            </button>

        </div>

    </header>


    <!-- =========================
         CONTENIDO PRINCIPAL
    ========================== -->

    <main>

        <!-- BUSCADOR -->

        <section class="buscador">

            <div class="titulo-seccion">

                <span>🌸</span>

                <div>
                    <h2>Encuentra tu flor ideal</h2>
                    <p>Explora nuestra colección floral</p>
                </div>

            </div>


            <form method="GET" action="index.php" class="form-busqueda">

                <div class="campo-busqueda">

                    <input
                        type="text"
                        name="buscar"
                        placeholder="Buscar una flor..."
                        value="<?= htmlspecialchars($buscar) ?>"
                    >

                </div>


                <select name="categoria">

                    <option value="">Todas las categorías</option>

                    <option value="Rosas"
                        <?= $categoria === 'Rosas' ? 'selected' : '' ?>>
                        Rosas
                    </option>

                    <option value="Tulipanes"
                        <?= $categoria === 'Tulipanes' ? 'selected' : '' ?>>
                        Tulipanes
                    </option>

                    <option value="Girasoles"
                        <?= $categoria === 'Girasoles' ? 'selected' : '' ?>>
                        Girasoles
                    </option>

                    <option value="Gerberas"
                        <?= $categoria === 'Gerberas' ? 'selected' : '' ?>>
                        Gerberas
                    </option>

                    <option value="Lirios"
                        <?= $categoria === 'Lirios' ? 'selected' : '' ?>>
                        Lirios
                    </option>

                    <option value="Arreglo"
                        <?= $categoria === 'Arreglo' ? 'selected' : '' ?>>
                        Arreglo
                    </option>

                    <option value="Canasta"
                        <?= $categoria === 'Canasta' ? 'selected' : '' ?>>
                        Canasta
                    </option>

                    <option value="Girasol"
                        <?= $categoria === 'Girasol' ? 'selected' : '' ?>>
                        Girasol
                    </option>

                </select>


                <button type="submit" class="btn-buscar">
                    Buscar
                </button>

            </form>

        </section>


        <!-- =========================
             MENSAJES
        ========================== -->

        <?php if (!empty($mensaje)): ?>

            <div class="mensaje-exito">

                <span>✓</span>

                <?= htmlspecialchars($mensaje) ?>

            </div>

        <?php endif; ?>


        <?php if (!empty($errores)): ?>

            <div class="errores">

                <strong>Por favor, revisa lo siguiente:</strong>

                <ul>

                    <?php foreach ($errores as $error): ?>

                        <li>
                            <?= htmlspecialchars($error) ?>
                        </li>

                    <?php endforeach; ?>

                </ul>

            </div>

        <?php endif; ?>


        <!-- =========================
             CATÁLOGO
        ========================== -->

        <section class="catalogo">

            <div class="titulo-catalogo">

                <span>✿</span>

                <div>
                    <h2>Nuestro catálogo</h2>
                    <p>Elige el detalle perfecto para esa persona especial</p>
                </div>

                <span>✿</span>

            </div>


            <?php if (empty($flores)): ?>

                <div class="sin-resultados">

                    <span>🌷</span>

                    <h3>No encontramos flores</h3>

                    <p>
                        Intenta realizar otra búsqueda.
                    </p>

                </div>

            <?php else: ?>

                <div class="contenedor-flores">

                    <?php foreach ($flores as $flor): ?>

                        <article class="flor">

                            <div class="imagen-flor">

                                <img
                                    src="img/<?= htmlspecialchars($flor->getImagen()) ?>"
                                    alt="<?= htmlspecialchars($flor->getNombre()) ?>"
                                >

                            </div>


                            <div class="info-flor">

                                <span class="categoria">
                                    <?= htmlspecialchars($flor->getCategoria()) ?>
                                </span>

                                <h3>
                                    <?= htmlspecialchars($flor->getNombre()) ?>
                                </h3>

                                <p>
                                    <?= htmlspecialchars($flor->getDescripcion()) ?>
                                </p>

                                <div class="precio">
                                    S/ <?= number_format($flor->getPrecio(), 2) ?>
                                </div>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

        </section>

    </main>


    <!-- =========================
         MODAL DEL FORMULARIO
    ========================== -->

    <div
        class="modal"
        id="modalFormulario"
        aria-hidden="true"
    >

        <div class="modal-contenido">

            <button
                type="button"
                class="cerrar-modal"
                id="cerrarFormulario"
                aria-label="Cerrar"
            >
                ×
            </button>


            <div class="modal-header">

                <span class="flor-modal">🌷</span>

                <h2>Registrar nueva flor</h2>

                <p>
                    Agrega una nueva opción a nuestro catálogo
                </p>

            </div>


            <form method="POST" action="index.php" class="form-registro" enctype="multipart/form-data">

                <div class="grupo-campo">

                    <label for="nombre">
                        Nombre de la flor
                    </label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        placeholder="Ejemplo: Ramo de Margaritas"
                        required
                    >

                </div>


                <div class="grupo-campo">

                    <label for="categoria">
                        Categoría
                    </label>

                    <select
                        id="categoria"
                        name="categoria"
                        required
                    >

                        <option value="">
                            Seleccione una categoría
                        </option>

                        <option value="Rosas">Rosas</option>
                        <option value="Tulipanes">Tulipanes</option>
                        <option value="Girasoles">Girasoles</option>
                        <option value="Gerberas">Gerberas</option>
                        <option value="Lirios">Lirios</option>
                        <option value="Arreglo">Arreglo</option>
                        <option value="Canasta">Canasta</option>
                        <option value="Girasol">Girasol</option>

                    </select>

                </div>


                <div class="grupo-campo">

                    <label for="precio">
                        Precio
                    </label>

                    <div class="campo-precio">

                        <span>S/</span>

                        <input
                            type="number"
                            id="precio"
                            name="precio"
                            step="0.01"
                            min="0"
                            placeholder="45.00"
                            required
                        >

                    </div>

                </div>


                <div class="grupo-campo">

                    <label for="descripcion">
                        Descripción
                    </label>

                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Describe el arreglo floral..."
                        required
                    ></textarea>

                </div>


                <div class="grupo-campo">
    <label for="imagen">Imagen de la flor</label>
    <input
        type="file"
        id="imagen"
        name="imagen"
        accept=".jpg,.jpeg,.png,.webp"
        required
    >
    <small>Selecciona una imagen desde tu computadora.</small>
</div>


                <div class="acciones-formulario">

                    <button
                        type="button"
                        class="btn-cancelar"
                        id="cancelarFormulario">
                        Cancelar
                    </button>

                    <button
                        type="submit"
                        class="btn-guardar" >
                        🌸 Registrar flor
                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- =========================
         PIE DE PÁGINA
    ========================== -->

    <footer>

        <div class="footer-flor">
            ✿
        </div>

        <h3>
            Florería ♥Lili♥
        </h3>

        <p>
            Flores que hablan por ti 🌷
        </p>

        <div class="linea-footer"></div>

        <small>
            © 2026 Florería Lili · Todos los derechos reservados
        </small>

    </footer>

    <!-- JavaScript -->
    <script src="/Floreria-mvc/public/js/script.js"></script>

</body>
</html>