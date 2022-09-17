<?php 
if(empty($_SESSION['id'])) {
    session_start();
    $_SESSION['id'] = session_id();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class='container'>
       <header>
            <h1>Calculadora de IMC</h1>
            <p>O Índice de Massa Corporal (IMC), é um cálculo simples que permite medir se alguém está ou não com o peso ideal. Ele aponta se o peso está adequado ou se está abaixo ou acima do peso. </p>
        </header>    
        
        <form method='POST' action='src/imc.php'>
            <input type='text' name='peso' id='peso' placeholder='Peso'><br/><br/> 
            <input type='text' name='altura' id='altura' placeholder='Altura'><br/><br/>
            <input type='submit' value='Calcular'>
        </form>


        <?php if(!empty($_SESSION['flash'])): ?>
            <div class='<?=$_SESSION['flash_style'];?>'>
                <?php 
                    echo $_SESSION['flash']."<br/>";
                    echo $_SESSION['classificacao'];
                    $_SESSION['classificaccao'] = '';
                    $_SESSION['flash'] = '';
                    $_SESSION['flash_style'] = '';
                ?>
            </div>
        <?php endif;?>
    
    </div>
    
<footer>
    <span class='name'>danilo</span>ferreira</br>
    <span>&copy; 2022</span>
</footer>

<script src='assets/js/imask.js'></script>
<script type='text/javascript'>
IMask(
document.querySelector('#peso'),
{
    mask:'00.00'
}
);
IMask(
document.querySelector('#altura'),
{
    mask:'0.00'
}
);

</script>

</body>
</html>