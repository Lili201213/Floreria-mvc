<?php

namespace App\Controlador;

use App\Modelo\Flor;

class FlorController
{
    public function listarFlores(): array
    {
        return [
            new Flor(
                1,
                "Ramo de Rosas",
                "Rosas",
                48.00,
                "Hermoso ramo de 12 rosas rojas.",
                "ramo rosas.jpg"
            ),

            new Flor(
                2,
                "Ramo de Tulipanes",
                "Tulipanes",
                60.00,
                "Elegante ramo de tulipanes de colores.",
                "tulipan.jpe"
            ),

            new Flor(
                3,
                "Ramo de Girasoles",
                "Girasoles",
                50.00,
                "Alegre ramo de girasoles frescos.",
                "girasoles.jpeg"
            ),

            new Flor(
                4,
                "Ramo de Gerberas",
                "Gerberas",
                40.00,
                "Hermosas gerberas para una ocasión especial.",
                "gerberas.jpg"
            ),

             new Flor(
                5,
                "Ramo de Lirios",
                "Lirios",
                60.00,
                "Hermosos lirios para regalar a esa persona especial.",
                "lirios.jpeg"
            ),

             new Flor(
                6,
                "Ramo de Rosas",
                "Rosas",
                38.00,
                "Hermosas rosas de colores, secillas pero hermosas.",
                "color.jpeg"
            ),

             new Flor(
                7,
                "Arreglo de Flores",
                "Arreglo",
                60.00,
                "Hermoso arreglo de flores para centro de mesa.",
                "mesa.jpeg"
            ),

             new Flor(
                8,
                "Canasta de Flores",
                "Canasta",
                60.00,
                "Hermosa canasta de flores para dar en cumpleaños.",
                "cumple.jpeg"
            ),

             new Flor(
                9,
                "Ramo de Girasol",
                "Girasol",
                20.00,
                "Hermoso ramo de 2 girasoles.",
                "girasol.jpeg"
            )
        ];
    }

    public function filtrarFlores(string $buscar = "", string $categoria = ""): array
    {
        $flores = $this->listarFlores();

        return array_filter($flores, function (Flor $flor) use ($buscar, $categoria) {

            $coincideBusqueda = $buscar === "" ||
                stripos($flor->getNombre(), $buscar) !== false;

            $coincideCategoria = $categoria === "" ||
                $flor->getCategoria() === $categoria;

            return $coincideBusqueda && $coincideCategoria;
        });
    }

    public function registrarFlor(array $datos): Flor
{
    return new Flor(
        10,
        $datos['nombre'],
        $datos['categoria'],
        (float) $datos['precio'],
        $datos['descripcion'],
        $datos['imagen']
    );
}
}