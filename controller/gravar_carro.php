<!DOCTYPE html>
<html>

<body>
		<a href="../view/cadastro_carro.php">
		<img src="../imagens/botao_voltar.jpg" width="50" height="50">		
		</a>
		
<?php

   include_once("../controller/conexao.php");

   $cliente = $_POST['cliente'];
   $carro = $_POST['carro'];
   $fabricante = $_POST['fabricante'];
	$anomodelo = $_POST['anomodelo'];
	$cor = $_POST['cor'];
	$placa = $_POST['placa'];
	$ativo = $_POST['ativo'];
	
      
	$conn= new mysqli("localhost","root","","chaveroda");

	if($conn->connect_error){
	echo "Error: ".$conn->connect_error;
	}

	$result = $conn->query("SELECT cpfcnpj FROM cliente where nome = '$cliente'");   
   $row = $result->fetch_assoc();
   
	$cpfcnpj = $row['cpfcnpj'];
		
	if($row > 0) {

		$query ="UPDATE carro SET ativo ='$ativo' WHERE cpfcnpj=$cpfcnpj"; 
   	$atualizar = $mysqli->query($query) or die("$mysqli->error"); 	

   	echo '<pre>Cadastro atualizado com sucesso!<br>';
   	echo '</pre>';
	
		}else { 	
 		$query = "INSERT INTO carro (cpfcnpj,cliente,carro,fabricante,anomodelo,cor,placa,ativo) 
   	values ('$cpfcnpj','$cliente','$carro','$fabricante','$anomodelo','$cor','$placa','$ativo')";

    		echo '<pre>Cadastro realizado com sucesso!<br>';
    		echo '</pre>';

    		$salvar = $mysqli->query($query) or die("$mysqli->error");
}
    mysqli_close($mysqli);

?>

</body>
</html>


