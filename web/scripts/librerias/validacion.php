<?php
/**
 * Comprueba que $var contiene un entero cuyo valor esta entre $min y $max.
 * En $var se devuelve el entero saneado (En caso de no cumplir las condiciones asigna a $var el valor $defecto).
 *
 * @param integer $var
 * @param integer $min
 * @param integer $max
 * @param integer $defecto
 * @return boolean
 */
function validaEntero(int &$var, int $min, int $max, int $defecto):bool {
    if(($var >= $min) && ($var <= $max)) {
        return true;
    }
    else {
        $var = $defecto;
        return false;
    }
}

/**
 * Comprueba que $var contiene un entero cuyo valor esta entre $min y $max.
 * En $var se devuelve el real saneado (En caso de no cumplir las condiciones asigna a $var el valor $defecto).
 *
 * @param float $var
 * @param float $min
 * @param float $max
 * @param float $defecto
 * @return boolean
 */
function validaReal(float &$var, float $min, float $max, float $defecto):bool {
    if(($var >= $min) && ($var <= $max)) {
        return true;
    }
    else {
        $var = $defecto;
        return false;
    }
}

/**
 * Comprueba que $var contiene una fecha correcta en el formato "dd/mm/yyyy".
 * En $var se devuelve la fecha saneada (2 cifras para dia y mes y 4 para año)
 * En caso de no cumplir las condiciones devuelve $defecto en $var.
 *
 * @param string $var
 * @param string $defecto
 * @return boolean
 */
function validaFecha(string &$var, string $defecto):bool {

    $fecha = trim($var);
    $regex = '/^\d{1,2}\/\d{1,2}\/\d{4}$/';

    if(preg_match($regex,$fecha)) {

        $array = explode('/',$fecha);

        if(checkdate($array[1],$array[0],$array[2])) {

            $var = sprintf('%02d/%02d/%04d', $array[0], $array[1], $array[2]);
            return true;

        }
    }

    $var = $defecto;
    return false;

}

/**
 * Comprueba que $var contiene una fecha correcta en el formato "hh:mm:ss".
 * En $var se devuelve la fecha saneada (2 cifras para horas, minutos y segundos)
 * En caso de no cumplir las condiciones devuelve $defecto en $var.
 *
 * @param string $var
 * @param string $defecto
 * @return boolean
 */
function validaHora(string &$var, string $defecto):bool {
    
    $hora = trim($var);
    $regex = '/^\d{1,2}\:\d{1,2}\:\d{1,2}$/';

    if(preg_match($regex,$hora)) {

        $array = explode(':', $hora);
        $date = DateTime::createFromFormat('!H:i:s', $hora);

        if (($date !== false) && ($date->format('G:i:s') === sprintf('%d:%02d:%02d', $array[0], $array[1], $array[2]))) {

            $var = sprintf('%02d:%02d:%02d', $array[0], $array[1], $array[2]);
            return true;

        }

    }

    $var = $defecto;
    return false;

}

/**
 * Comprueba que $var contiene un email correcto en el formato "aaaaaa@bbbbb.ccc"
 * En $var se devuelve el email saneado (En caso de no cumplir las condiciones se asigna $defecto)
 *
 * @param string $var
 * @param string $defecto
 * @return boolean
 */
function validaEmail(string &$var, string $defecto):bool {

    $email = trim($var);
    $regex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/';

    if(preg_match($regex,$email)) {
        $var = $email;
        return true;
    }

    $var = $defecto;
    return false;
    
}

/**
 * Comprueba que $var contiene una cadena de longitud máxima $longitud.
 * En caso de no cumplir las condiciones se asigna $var a $defecto
 *
 * @param string $var
 * @param integer $longitud
 * @param string $defecto
 * @return boolean
 */
function validaCadena(string &$var, int $longitud, string $defecto):bool {
    
    $cadena = trim($var);

    if(mb_strlen($cadena,'UTF-8') <= $longitud) {
        $var = $cadena;
        return true;
    }
    
    $var = $defecto;
    return false;

}

/**
 * Comprueba que $var cumple con la expresión regular $expresion. 
 * En caso de no cumplir lascondiciones se asigna a $var el valor por $defecto
 * 
 * @param string $var
 * @param string $expresion
 * @param string $defecto
 * @return boolean 
 */
function validaExpresion(string &$var, string $expresion, string $defecto):bool {
    $cadena = trim($var);
    if(preg_match($expresion,$cadena)) {
        $var = $cadena;
        return true;
    }

    $var = $defecto;
    return false;
}

/**
 * Comprueba que $var sea igual a uno de los elementos del array $posibles ($tipo=1) o 
 * a una de las claves del array $posibles ($tipo=2). 
 *
 * @param mixed $var
 * @param array $posibles
 * @param integer $tipo
 * @return boolean
 */
function validaRango(mixed $var, array $posibles, int $tipo=1):bool {

    if ($tipo == 1) {
        return in_array($var, $posibles);
    }

    if ($tipo == 2) {
        return array_key_exists($var, $posibles);
    }

    return false;

}
