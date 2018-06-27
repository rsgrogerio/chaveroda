<!DOCTYPE html>
<html>

<body>
		<a href="../view/cadastro_funcionario.php">
		<img src="../imagens/botao_voltar.jpg" width="50" height="50">		
		</a>
		
<?php

   include_once("../controller/conexao.php");

   $cpf = $_POST['cpf'];
   $nome = $_POST['nome'];
   $endereco = $_POST['endereco'];
   $bairro = $_POST['bairro'];   
   $cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$telefone = $_POST['telefone'];
	$sexo = $_POST['sexo'];
	$funcao = $_POST['funcao'];
	$ativo = $_POST['ativo'];	
	
	
	$conn= new mysqli("localhost","root","","chaveroda");

	if($conn->connect_error){
	echo "Error: ".$conn->connect_error;
	}

	$result = $conn->query("SELECT cpf FROM funcionario WHERE cpf = $cpf");
	$row = $result->fetch_assoc();

	if($row > 0) {
		
		$query ="UPDATE funcionario SET ativo ='$ativo' WHERE cpf=$cpf"; 
   	$atualizar = $mysqli->query($query) or die("$mysqli->error"); 	

   	echo '<pre>Cadastro atualizado com sucesso!<br>';
   	echo '</pre>';
	
	}else {
	   
   	$query = "INSERT INTO funcionario (cpf,nome,endereco,bairro,cidade,uf,sexo,telefone,funcao,ativo) 
   	values ('$cpf','$nome','$endereco','$bairro','$cidade','$uf','$sexo','$telefone','$funcao','$ativo')";

    	echo '<pre>Cadastro realizado com sucesso!<br>';
    	echo '</pre>';

    	$salvar = $mysqli->query($query) or die("$mysqli->error");

		}
		
    	mysqli_close($mysqli);

?>

</body>
</html>


