<?php

namespace App\Modelo;

class Flor
{
    private int $id;
    private string $nombre;
    private string $categoria;
    private float $precio;
    private string $descripcion;
    private string $imagen;

    public function __construct(
        int $id,
        string $nombre,
        string $categoria,
        float $precio,
        string $descripcion,
        string $imagen
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getCategoria(): string
    {
        return $this->categoria;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }
}