<!DOCTYPE html>
<html>

<body>
		<a href="../view/cadastro_servico.php">
		<img src="../imagens/botao_voltar.jpg" width="50" height="50">		
		</a>
		
<?php

   include_once("../controller/conexao.php");

   $codigo = $_POST['codigo'];
   $descricao = $_POST['descricao'];
   $preco = $_POST['preco'];
   $ativo = $_POST['ativo'];
	
	
   	$query = "INSERT INTO servico (codigo,descricao,preco,ativo) 
   	values ('$codigo','$descricao','$preco','$ativo')";

    	echo '<pre>Cadastro realizado com sucesso!<br>';
    	echo '</pre>';

    $salvar = $mysqli->query($query) or die("$mysqli->error");
 	
    mysqli_close($mysqli);

?>

</body>
</html>


