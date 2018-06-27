<!DOCTYPE html>
<html>

<body>
		<a href="../view/venda.php">
		<img src="../imagens/botao_voltar.jpg" width="50" height="50">		
		</a>
		
<?php

	$conn= new mysqli("localhost","root","","chaveroda");

	if($conn->connect_error){
		echo "Error: ".$conn->connect_error;
	}

   include_once("../controller/conexao.php");


   $codigoos = $_POST['codigoos'];
   $pagamento = $_POST['pagamento'];
	$desconto = $_POST['desconto'];
		
	$conn= new mysqli("localhost","root","","chaveroda");


	$result = $conn->query("SELECT os.id, p.quantidade,p.id_produto from os
									INNER JOIN os_corpo_produto as p on p.id_capa_os = os.id
									WHERE os.id = '$codigoos'");    
   $row = $result->fetch_assoc();
   
   
	$result2 = $conn->query("SELECT os.id, cl.nome, cl.cpfcnpj, os.status, os.datainicial,
((s.quantidade*s.valor_unitario)+sum(p.quantidade*p.valor_unitario)) as total_geral from os 
INNER JOIN cliente as cl ON cl.cpfcnpj = os.id_cpfcnpj 
INNER JOIN os_corpo_servico as s ON s.id_capa_os = os.id
INNER JOIN os_corpo_produto as p ON p.id_capa_os = os.id 
where os.id = '$codigoos'");
   $row2 = $result2->fetch_assoc();
   

	$quantidade = $row['quantidade'];
	$id_produto = $row['id_produto'];
	$total_geral = $row2['total_geral'];
	$datainicial = $row2['datainicial'];

	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d H:i:s');
	
	if($row['id'] > 0) {
		
		
		if($total_geral < 1000) {
			
			$subtotal = $total_geral * 0.05;
		
			$total = $total_geral - $subtotal;
			
			echo '<br><h2>Total : R$ <label style="font-size: 40px; color: lightgrey">'.$total_geral.'</label></h2>';
			echo '<h2>Desconto de 5% : R$ <label style="font-size: 40px; color: lightgrey">'.$subtotal.'</label></h2>';
			echo '<h2>Total com Desconto : R$ <label style="font-size: 40px; color: blue">'.$total.'</label></h2>';

		
			$query ="UPDATE produto SET saldo = (saldo-'$quantidade') WHERE id=$id_produto";
			$query2 ="UPDATE os set status = 'Fechado' where id=$codigoos";
			$query3 ="UPDATE os set datafinal = '$date', datainicial = '$datainicial' where id=$codigoos";
			

	   	$atualizar = $mysqli->query($query) or die("$mysqli->error");
	   	$atualizar2 = $mysqli->query($query2) or die("$mysqli->error");
	   	$atualizar3 = $mysqli->query($query3) or die("$mysqli->error");
	  

   		echo '<pre>Venda Finalizada com sucesso.<br>';
   		echo '<pre>Obrigado, volte sempre!!!</pre>';
   		echo '<pre>Agradecemos a Preferencia.</pre>';		
		}else{
			
			$subtotal = $total_geral * 0.10;
		
			$total = $total_geral - $subtotal;
			
			echo '<br><h2>Total : R$ <label style="font-size: 40px; color: lightgrey">'.$total_geral.'</label></h2>';
			echo '<h2>Desconto de 10% : R$ <label style="font-size: 40px; color: lightgrey">'.$subtotal.'</label></h2>';
			echo '<h2>Total com Desconto : R$ <label style="font-size: 40px; color: blue">'.$total.'</label></h2>';

				
			$query ="UPDATE produto SET saldo = (saldo-'$quantidade') WHERE id=$id_produto"; 
			$query2 ="UPDATE os set status = 'Fechado' where id=$codigoos";
			$query3 ="UPDATE os set datafinal = '$date', datainicial = '$datainicial' where id=$codigoos";
					   
		   $atualizar = $mysqli->query($query) or die("$mysqli->error"); 	
			$atualizar2 = $mysqli->query($query2) or die("$mysqli->error");
	   	$atualizar3 = $mysqli->query($query3) or die("$mysqli->error");
	  

   		echo '<pre>Venda Finalizada com sucesso.<br>';
   		echo '<pre>Obrigado, volte sempre!!!</pre>';
   		echo '<pre>Agradecemos a Preferencia.</pre>';
}
}
    	mysqli_close($mysqli);

?>

</body>
</html>


