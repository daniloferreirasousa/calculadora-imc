<?php
namespace Cafe;

class Calculadora {
    public static function somarImc($peso, $altura) {
        $peso = floatval($peso);
        $altura = floatval($altura);

        $imc = number_format($peso / ($altura * $altura), 2);
        
        return $imc;
    }
}