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
   $servico = $_POST['servico'];
   $produto = $_POST['produto'];
   $quantidade = $_POST['quantidade'];
	 
	$conn= new mysqli("localhost","root","","chaveroda");


	$result_servico = $conn->query("SELECT id,preco FROM servico where descricao = '$servico'");    
   $row_servico = $result_servico->fetch_assoc();
   
	$result_produto = $conn->query("SELECT id,precovenda FROM produto where descricao = '$produto'");    
   $row_produto = $result_produto->fetch_assoc();
      
   
	$codigo_servico = $row_servico['id'];
   $codigo_produto = $row_produto['id'];
   $preco_servico = $row_servico['preco'];
   $precovenda_produto = $row_produto['precovenda'];
   
  
	if($row_servico > 0) {
		   
   
   if(isset($_POST['cadastro'])){
   
   	$query = "INSERT INTO os_corpo_servico (id_capa_os,id_servico,descricao_servico,quantidade,valor_unitario) 
   		values ('$id_capa_os','$codigo_servico','$servico','$quantidade','$preco_servico')";

    	echo '<pre>Cadastro realizado com sucesso!<br>';
    	echo '</pre>';

    	$salvar = $mysqli->query($query) or die("$mysqli->error");

	}
	}else{
	
	 if($row_produto > 0){
		
		if(isset($_POST['cadastro'])){
   
   	$query = "INSERT INTO os_corpo_produto (id_capa_os,id_produto,descricao_produto,quantidade,valor_unitario) 
   		values ('$id_capa_os','$codigo_produto','$produto','$quantidade','$precovenda_produto')";

    	echo '<pre>Cadastro realizado com sucesso!<br>';
    	echo '</pre>';

    	$salvar = $mysqli->query($query) or die("$mysqli->error");
	 
	 }	

}
}
	mysqli_close($mysqli);
?>

</body>
</html>
