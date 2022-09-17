<?php
if(empty($_SESSION['id'])) {
    session_start();
    $_SESSION['id'] = session_id();
}

require __DIR__ . '/../vendor/autoload.php';

use Cafe\Calculadora;

$peso = filter_input(INPUT_POST, 'peso');
$altura = filter_input(INPUT_POST, 'altura');
$_SESSION['classificacao'] = '';
if(!empty($peso) && !empty($altura)) {
    
    if(is_numeric($peso) && is_numeric($altura)) {
        $imc = Calculadora::somarImc($peso, $altura);

        if($imc < 18.5) {
            $_SESSION['classificacao'] = 'Abaixo do peso';
            $_SESSION['flash_style'] = 'atencao';
        } else if($imc >= 18.5 && $imc <= 24.99) {
            $_SESSION['classificacao'] = 'Peso normal';
            $_SESSION['flash_style'] = 'success';
        } else if ($imc >= 25.0 && $imc <= 29.99) {
            $_SESSION['classificacao'] = 'Sobrepeso';
            $_SESSION['flash_style'] = 'atencao';
        } else if($imc >= 30.0 && $imc <= 34.99) {
            $_SESSION['classificacao'] = 'Obesidade Grau I';
            $_SESSION['flash_style'] = 'atencao_1';
        } else if($imc >= 34.0 && $imc <= 39.99) {
            $_SESSION['classificacao'] = 'Obesidade Grau II';
            $_SESSION['flash_style'] = 'atencao_2';
        } else if($imc >= 40.0) {
            $_SESSION['classificacao'] = 'Obesidade Grau III';
            $_SESSION['flash_style'] = 'atencao_3';
        }

   
   
   
        $_SESSION['flash'] = "IMC: ".$imc;
        header('Location: ../');
        exit;    
   
   
   
    } else {
        $_SESSION['flash'] = "Apenas números são permitidos";
        $_SESSION['flash_style'] = 'error';
        header('Location: ../');
        exit;
    }

    
} else {
    $_SESSION['flash'] = 'Preencha os campos corretamente';
    $_SESSION['flash_style'] = 'error';
    header('Location: ../');
    exit;
}
