<!DOCTYPE html>
<html>

<body>
		<a href="../view/cadastro_cliente.php">
		<img src="../imagens/botao_voltar.jpg" width="50" height="50">		
		</a>
		
<?php

   include_once("../controller/conexao.php");

   $cpfcnpj = $_POST['cpfcnpj'];
   $nome = $_POST['nome'];
   $endereco = $_POST['endereco'];
   $bairro = $_POST['bairro'];   
   $cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$telefone = $_POST['telefone'];
	$sexo = $_POST['sexo'];
	$email = $_POST['email'];
 	$ativo = $_POST['ativo'];	

	$conn= new mysqli("localhost","root","","chaveroda");

	if($conn->connect_error){
	echo "Error: ".$conn->connect_error;
	}

	$result = $conn->query("SELECT cpfcnpj FROM cliente WHERE cpfcnpj = '$cpfcnpj'");
	$row = $result->fetch_assoc();

	if($row > 0) {

		$query ="UPDATE cliente SET ativo ='$ativo' WHERE cpfcnpj=$cpfcnpj"; 
   	$atualizar = $mysqli->query($query) or die("$mysqli->error"); 	

   	echo '<pre>Cadastro atualizado com sucesso!<br>';
   	echo '</pre>';
	
	}else {
		$query = "INSERT INTO cliente (cpfcnpj,nome,endereco,bairro,cidade,uf,sexo,telefone,email,ativo) 
   	values ('$cpfcnpj','$nome','$endereco','$bairro','$cidade','$uf','$sexo','$telefone','$email','$ativo')";
   	
    	$salvar = $mysqli->query($query) or die("$mysqli->error");
    
    	echo '<pre>Cadastro atualizado com sucesso!<br>';
    	echo '</pre>';
	}
   
      mysqli_close($mysqli);

?>

</body>
</html>
