<?php 

include "conexao.php" ;

if( isset ($_POST ) && !empty($_POST) ){
    $pergunta = $_POST["pergunta"];
    $a = $_POST["A"];
    $b = $_POST["B"];
    $c = $_POST["C"];
    $d = $_POST["D"];
    $e = $_POST["E"];
    $correta = $_POST["correta"];

    $query = "insert into questoes (pergunta,a,b,c,d,e,correta) ";
    $query = $query." values('$pergunta','$a','$b','$c','$d','$e','$correta')";
    $resultado = mysqli_query($conexao, $query);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página do Simulado</title>
</head>
<body>

<h1>Página de Simulado</h1>

<h2>Perguntas</h2>

<form action="./index.php" method="post">



<?php
$query = "select * from questoes order by rand() limit 15";
    $resultado = mysqli_query($conexao, $query);

    while($linha = mysqli_fetch_array($resultado)){
        ?>
        
            <div style="width:100%; border:1px solid;">
            
                <h1> <?php echo $linha["pergunta"]; ?> </h1>
             <input class= "form-check-input" type = "radio" name="respostas" <?php echo $linha["a"]; ?> />
                <h3> <?php echo $linha["b"]; ?> </h3>
                <h3> <?php echo $linha["c"]; ?> </h3>
                <h3> <?php echo $linha["d"]; ?> </h3>
                <h3> <?php echo $linha["e"]; ?> </h3>
            </div>
        <?php
    }
?>



