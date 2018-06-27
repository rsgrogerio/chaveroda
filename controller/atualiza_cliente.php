<!DOCTYPE html>
<html>

<body>
		<a href="../view/cadastro_cliente.php">
		<img src="../imagens/botao_voltar.jpg" width="50" height="50">		
		</a>
		
<?php

	$conn= new mysqli("localhost","root","","chaveroda");

	if($conn->connect_error){
		echo "Error: ".$conn->connect_error;
	}

   include_once("../controller/conexao.php");

   $cpfcnpj = $_POST['cpfcnpj'];
   $ativo = $_POST['ativo'];
   
	if(isset($_POST['atualizacliente'])){       
		
   $query ="UPDATE cliente SET ativo ='$ativo' WHERE cpfcnpj=$cpfcnpj";
 
   $atualizar = $mysqli->query($query) or die("$mysqli->error");
		
		echo "Cadastro Atualizado com sucesso!";
    	echo '</pre>';
   
    
    mysqli_close($conn);

}

?>

</body>
</html>

