<!DOCTYPE html>
<html>

<body>
		<a href="../view/cadastro_politicadesconto.php">
		<img src="../imagens/botao_voltar.jpg" width="50" height="50">		
		</a>
		
<?php

   include_once("../controller/conexao.php");

   $precototal = $_POST['precototal'];
   $desconto = $_POST['desconto'];
   $ativo = $_POST['ativo'];
	
   $query = "INSERT INTO politicadesconto (precototal,desconto,ativo) 
   	values ('$precototal','$desconto','$ativo')";

    echo '<pre>Cadastro realizado com sucesso!<br>';
    echo '</pre>';

    $salvar = $mysqli->query($query) or die("$mysqli->error");

    mysqli_close($mysqli);

?>

</body>
</html>


