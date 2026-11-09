<?php

require_once dirname(__FILE__) . "/../../scripts/librerias/validacion.php";

abstract class MuebleBase {

    private const MAXIMO_MUEBLES = 10;
    private int $mueblesCreados;

    private string $_nombre;
    private string $_fabricante;
    private string $_pais;
    private int $_anio;
    private string $_fechaIniVenta;
    private string $_fechaFinVenta;
    private float $_precio;

    // GETTERS
    public function getNombre() {return $this->_nombre;}
    public function getFabricante() {return $this->_fabricante;}
    public function getPais() {return $this->_pais;}
    public function getAnio() {return $this->_anio;}
    public function getFechaIniVenta() {return $this->_fechaIniVenta;}
    public function getFechaFinVenta() {return $this->_fechaFinVenta;}
    public function getPrecio() {return $this->_precio;}

    // SETTERS
    public function setNombre(string $nombre) {
        if($nombre == "") {
            return false;
        }
        if(!validaCadena($nombre, 40, "")) {
            return false;
        }

        return $this->_nombre = strtoupper($nombre);

    }
    
    public function setFabricante(string $fabricante) {
        $this->_fabricante = $fabricante;
    }
    public function setPais(string $pais) {
        $this->_pais = $pais;
    }
    public function setAnio(int $anio) {
        $this->_anio = $anio;
    }
    public function setFechaIniVenta(string $fechaIniVenta) {
        $this->_fechaIniVenta = $fechaIniVenta;
    }
    public function setFechaFinVenta(string $fechaFinVenta) {
        $this->_fechaFinVenta = $fechaFinVenta;
    }
    public function setPrecio(float $precio) {
        $this->_precio = $precio;
    }

}