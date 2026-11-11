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

    function __construct(string $nombre, $fabricante = "FaMu:", $pais = "ESPAÑA", $anio = 2020, 
    $fechaIniVenta = "01/01/2020", $fechaFinVenta = "31/12/2040", $precio = 30) {
        $this->_nombre = $nombre;
        $this->_fabricante = $fabricante;
        $this->_pais = $pais;
        $this->_anio = $anio;
        $this->_fechaIniVenta = $fechaIniVenta;
        $this->_fechaFinVenta = $fechaFinVenta;
        $this->_precio = $precio;
    }

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
        if(validaCadena($fabricante, 30, "FaMu:")) {
            $this->_fabricante = $fabricante;
            return true;
        }

        return false;

    }

    public function setPais(string $pais) {
        if(validaCadena($pais, 20, "ESPAÑA")) {
            $this->_pais = $pais;
            return true;
        }

        return false;

    }

    public function setAnio(int $anio) {
        if(validaEntero($anio, 2020, date('Y'), 2020)) {
            $this->_anio = $anio;
            return true;
        }

        return false;

    }

    public function setFechaIniVenta(string $fechaIniVenta) {
        if(validaFecha($fechaIniVenta, '01/01/2020')) {
            $this->_fechaIniVenta = $fechaIniVenta;
            return true;
        }

        return false;

    }

    public function setFechaFinVenta(string $fechaFinVenta) {
        if(validaFecha($fechaFinVenta, '31/12/2024')) {
            $this->_fechaFinVenta = $fechaFinVenta;
            return true;
        }

        return false;

    }

    public function setPrecio(float $precio) {
        if(validaReal($precio, 30, 99999, 30)) {
            $this->_precio = $precio;
            return true;
        }

        return false;

    }

}