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

   $id_capa_os = $_POST['codigoos'];
   $status = $_POST['status'];
   
	if(isset($_POST['atualizastatus'])){
		
		
   $query ="UPDATE os SET status ='$status' WHERE id=$id_capa_os";
 
   $atualizar = $mysqli->query($query) or die("$mysqli->error");
		
		echo "Cadastro Atualizado com sucesso!";
    	echo '</pre>';
   
    
    mysqli_close($conn);

}

?>

</body>
</html>


