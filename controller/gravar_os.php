<!DOCTYPE html>
<html>

<body>
		<a href="../view/os.php">
		<img src="../imagens/botao_voltar.jpg" width="50" height="50">		
		</a>
		
<?php

	$conn= new mysqli("localhost","root","","chaveroda");

	if($conn->connect_error){
		echo "Error: ".$conn->connect_error;
	}

   include_once("../controller/conexao.php");


   $cpfcnpj = $_POST['cpfcnpj'];
   $defeito = $_POST['defeito'];
	$datainicial = $_POST['datainicial'];
	$tecnico = $_POST['tecnico'];
	$placa = $_POST['placa'];
	$status = $_POST['status'];

	
	$conn= new mysqli("localhost","root","","chaveroda");


	$result = $conn->query("SELECT id FROM carro where placa = '$placa'");    
   $row = $result->fetch_assoc();

	$result2 = $conn->query("SELECT id_cpfcnpj FROM os where id_cpfcnpj = '$cpfcnpj'");    
   $row2 = $result2->fetch_assoc();


   
	$id_carro = $row['id'];
	
	
	
	if($row2 > 0) {
		
		$query ="UPDATE os SET status ='$status' WHERE id_cpfcnpj=$cpfcnpj"; 
   	$atualizar = $mysqli->query($query) or die("$mysqli->error"); 	

   	echo '<pre>Cadastro atualizado com sucesso!<br>';
   	echo '</pre>';		
		

		}else{
			
			
			if(isset($_POST['cadastrar'])){
	
   			$query = "INSERT INTO os (status,id_cpfcnpj,defeito,datainicial,tecnico,id_carro) 
   			values ('Esboco','$cpfcnpj','$defeito','$datainicial','$tecnico','$id_carro')";

    			echo '<pre>Cadastro realizado com sucesso!<br>';
    			echo '</pre>';

    			$salvar = $mysqli->query($query) or die("$mysqli->error");

}
}
    	mysqli_close($mysqli);


?>

</body>
</html>


