<!DOCTYPE html>
<html>

<body>
		<a href="../view/cadastro_produto.php">
		<img src="../imagens/botao_voltar.jpg" width="50" height="50">		
		</a>
		
<?php

   include_once("../controller/conexao.php");

   $codigo = $_POST['codigo'];
   $descricao = $_POST['descricao'];
   $precovenda = $_POST['precovenda'];
   $saldo = $_POST['saldo'];
   $ativo = $_POST['ativo'];    
   
	
	$conn= new mysqli("localhost","root","","chaveroda");

	if($conn->connect_error){
	echo "Error: ".$conn->connect_error;
	}

	$result = $conn->query("SELECT codigo FROM produto WHERE codigo = $codigo");
	$row = $result->fetch_assoc();

	if($row > 0) {
		
		$query ="UPDATE produto SET ativo ='$ativo' WHERE codigo=$codigo"; 
   	$atualizar = $mysqli->query($query) or die("$mysqli->error"); 	

   	echo '<pre>Cadastro atualizado com sucesso!<br>';
   	echo '</pre>';
	
	}else {
      
      $query = "INSERT INTO produto (codigo,descricao,precovenda,saldo,ativo) 
   	values ('$codigo','$descricao','$precovenda','$saldo','$ativo')";

    echo '<pre>Cadastro realizado com sucesso!<br>';
    echo '</pre>';

    $salvar = $mysqli->query($query) or die("$mysqli->error");

}
    mysqli_close($mysqli);

?>

</body>
</html>


