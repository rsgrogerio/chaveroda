<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <title>Listagem da OS</title>
    <link rel="stylesheet" href="../css/listagem_os.css" media="screen" title="no title" charset="utf-8">
	</head>

<body>

<?php
	
	$codigoos = $_POST['codigoos'];
	

	$conn= new mysqli("localhost","root","","chaveroda");

	if($conn->connect_error){
		echo "Error: ".$conn->connect_error;
	}

	$result = $conn->query("select o.id as codigo_os, o.datafinal, o.datainicial, o.status, o.tecnico, o.defeito, cli.cpfcnpj, cli.nome as cliente, 
		cli.endereco, cli.telefone, cli.bairro, cli.cidade, cli.email, car.carro, car.fabricante, 
		car.anomodelo, car.placa, car.cor from os AS o 
		INNER JOIN cliente as cli ON cli.cpfcnpj = o.id_cpfcnpj 
		INNER JOIN carro as car ON car.id = o.id_carro  
		where o.id = $codigoos ");
	$row = $result->fetch_assoc();
	$data = array();

?>

<div id="corpo">
	<div id="ordem_servico">
  		<h1>Ordem de Serviço</h1>
	</div>
	
	<div id="dados_empresa">
		<div id="dados_empresa_esquerda">
			<label>OFICINA MECANICA CHAVE DE RODAS </label><br>
			<label>Endereço: Rua João Pereira Amorim, 450, Centro - Sete Lagoas/MG </label>
			<label>Telefone: (31)2121-2121 </label>
			<label>Emissão: </label>
			<input type="" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['datainicial']; ?>"> 
		</div>
		
		<div id="logo">
			<img src="../imagens/logo_chaveroda3.png" width="200" height="100">
		</div>
		
		<div id="dados_empresa_direita">
			<label>Número da OS: </label>
			<input type="" style="border:0; font-size: 18px; text-align: center; color: blue" size="12" value="<?php echo $row['codigo_os']; ?>">

			<label>Data Entrega: </label>
			<input type="" style="border:0; font-size: 18px; text-align: center; color: blue" size="15" value="<?php echo $row['datafinal']; ?>">
			
			<label>Status: </label>
			<input type="" style="border:0; font-size: 18px; text-align: center; color: blue" size="15" value="<?php echo $row['status']; ?>">
		</div>	
	</div>
	
	<div id="primeiro_separador">
	</div>
		
	<div id="dados_cliente_esquerda">
		<label for="nome">Cliente: </label>            
      <input type="text" id="nomeid" name="nome" size="50" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['cliente']; ?>">
		
		<label for="cpfcnpj">CPF/CNPJ: </label>            
      <input type="text" id="cpfcnpjid" name="cpfcnpj" size="15" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['cpfcnpj']; ?>">
      
      <label for="telefone">Telefone: </label>            
      <input type="text" id="telefoneid" name="telefone" size="15" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['telefone']; ?>">
      
		<br>
		
		<label for="endereco">Endereço: </label>            
      <input type="text" id="enderecoid" name="endereco" size="48" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['endereco']; ?>">

		<label for="bairro">Bairro: </label>            
      <input type="text" id="bairroid" name="bairro" size="17" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['bairro']; ?>">

		<label for="cidade">Cidade: </label>            
      <input type="text" id="cidadeid" name="cidade" size="17" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['cidade']; ?>">      
   	
   	<br>
   	
   	<label for="email">Email: </label>            
      <input type="email" id="emailid" name="email" size="51" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['email']; ?>">
   	      
	</div>
		
	<div id="segundo_separador">
	</div>

	<div id="dados_carro_esquerda">
		<label style="font-size: 20px"><font color="grey">Dados do Carro</font></label>
	
		<br>

		<label for="carro">Carro: </label>            
      <input type="text" id="carroid" name="carro" size="25" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['carro']; ?>">
         
      <label for="fabricante">Fabricante: </label>            
      <input type="text" id="fabricanteid" name="fabricante" size="20" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['fabricante']; ?>">      
   	
   	<label for="anomodelo">Ano Modelo: </label>            
      <input type="text" id="anomodeloid" name="anomodelo" size="5" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['anomodelo']; ?>">        

      <label for="placa">Placa: </label>            
      <input type="placa" id="placaid" name="placa" size="8" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['placa']; ?>">    
			
		<label for="cor">Cor: </label>            
      <input type="text" id="corid" name="cor" size="15" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['cor']; ?>">

		<br>
		
		<label style="font-size: 20px"><font color="grey">Defeitos Relatados</font></label>
		<br>
		<label></label>
		<input type="text" id="defeitoid" name="defeito" size="100" style="border:0; font-size: 18px; color: blue" value="<?php echo $row['defeito']; ?>">
		
		
				
	</div>
	
	<div id="terceiro_separador">
	</div>

	<div id="tabela_servicos">
		<label style="font-size: 20px"><font color="grey">Servicos</font></label>
	
		<br>
		<?php  
		
		$conn= new mysqli("localhost","root","","chaveroda");

		if($conn->connect_error){
		echo "Error: ".$conn->connect_error;
		}

		$result = $conn->query("SELECT descricao_servico, quantidade, valor_unitario, (quantidade*valor_unitario) as total_servico
		from os_corpo_servico where id_capa_os = $codigoos ");
		$data = array();


     		echo '<table width="1320" height="50" border="1" cellspacing="0">';
	 		echo '<tr>';
	   	echo	'<td bgcolor="lightgray" align="center"><strong>Descrição <strong></td>';
	   	echo	'<td bgcolor="lightgray" align="center"><strong>Quantidade </strong></td>';
	   	echo	'<td bgcolor="lightgray" align="center"><strong>Preço(R$) </strong></td>';
	   	echo	'<td bgcolor="lightgray" align="center"><strong>Total(R$) </strong></td>';
			echo '</tr>';


			while ($row = $result->fetch_assoc()){
            
				echo '<tr>';
				echo '  <td style="text-align: center">'.$row["descricao_servico"].'</td>';
				echo '  <td style="text-align: center">'.$row["quantidade"].'</td>';
				echo '  <td style="text-align: center">'.$row["valor_unitario"].'</td>';
				echo '  <td style="text-align: center">'.$row["total_servico"].'</td>';
				echo '</tr>';
			}	
	   	echo '</table>';
?>
		
		
	</div>

	<div id="tabela_pecas">
		<label style="font-size: 20px"><font color="grey">Peças</font></label>
	
		<br>
<?php
   
	$conn= new mysqli("localhost","root","","chaveroda");

	if($conn->connect_error){
		echo "Error: ".$conn->connect_error;
	}

	$result = $conn->query("SELECT descricao_produto, quantidade, valor_unitario, (quantidade*valor_unitario) as total_produto
		from os_corpo_produto where id_capa_os = $codigoos ");
		$data = array();

 
      echo '<table width="1320" height="50" border="1" cellspacing="0">';
	 	echo '<tr>';
		echo 	'<td bgcolor="lightgray" align="center"><strong>Código </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Produto <strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Preço(R$) </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Total(R$) </strong></td>';
		echo '</tr>';


	while ($row = $result->fetch_assoc()){
            
		echo '<tr>';
		echo '  <td style="text-align: center">'.$row["descricao_produto"].'</td>';
		echo '  <td style="text-align: center">'.$row["quantidade"].'</td>';
		echo '  <td style="text-align: center">'.$row["valor_unitario"].'</td>';
		echo '  <td style="text-align: center">'.$row["total_produto"].'</td>';
		echo '</tr>';
	
	}	
	   echo '</table>';

?>

	</div>
	
	<br>
	
	<div id="totais_esquerda">
	
<?php
	
	$codigoos = $_POST['codigoos'];
	

	$conn= new mysqli("localhost","root","","chaveroda");

	if($conn->connect_error){
		echo "Error: ".$conn->connect_error;
	}

	$result = $conn->query("select tecnico from os where id = $codigoos ");
	$row = $result->fetch_assoc();
	
	

	$conn1= new mysqli("localhost","root","","chaveroda");

	if($conn1->connect_error){
		echo "Error: ".$conn1->connect_error;
	}
	
	$result1 = $conn1->query("select sum(quantidade*valor_unitario) as subtotal_servico from os_corpo_servico where id_capa_os = $codigoos ");
	$row1 = $result1->fetch_assoc();
	
	
	$conn2= new mysqli("localhost","root","","chaveroda");

	if($conn2->connect_error){
		echo "Error: ".$conn2->connect_error;
	}
	$result2 = $conn2->query("select sum(quantidade*valor_unitario) as subtotal_produto from os_corpo_produto where id_capa_os = $codigoos ");
	$row2 = $result2->fetch_assoc();
	


	$conn3= new mysqli("localhost","root","","chaveroda");

	if($conn3->connect_error){
		echo "Error: ".$conn2->connect_error;
	}
	$result3 = $conn3->query("select corpos.quantidade, corpop.quantidade, corpos.valor_unitario,
	corpop.valor_unitario, ((corpos.quantidade*corpos.valor_unitario)+sum(corpop.quantidade*corpop.valor_unitario)) as total_geral from os 
	inner join os_corpo_servico as corpos ON corpos.id_capa_os = os.id
	inner join os_corpo_produto as corpop ON corpop.id_capa_os = os.id	  	
	where os.id = $codigoos ");
	$row3 = $result3->fetch_assoc();
	
	$data = array();

?>	
	
		<label style="font-size: 25px"><font color="grey">Tecnico Responsável:</font></label>
		<input type="text" id="tecnicoid" name="tecnico" size="30" style="border:0 ; font-size: 18px; text-align: center; color: blue" value="<?php echo $row['tecnico']; ?>"><br>
	</div>	
	
	<div id="totais_direita">
		<label style="font-size: 25px"><font color="grey">Total do Serviço: R$</font></label>
		<input type="text" id="totalservicoid" name="totalservico" size="14" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row1['subtotal_servico']; ?>"><br>
		
		<label style="font-size: 25px"><font color="grey">Total das Peças: R$</font></label>
		<input type="text" id="pecasid" name="pecas" size="15" style="border:0; font-size: 18px; text-align: center; color: blue" value="<?php echo $row2['subtotal_produto']; ?>"><br>
		
		<label style="font-size: 25px"><font color="grey">Total Geral: R$</font></label>
		<input type="text" id="totalgeralid" name="totalgeral" size="10" style="border:0; font-size: 30px; text-align: center; color: blue" value="<?php echo $row3['total_geral']; ?>"><br>
	</div>
	
	<br>

	<div id="rodape">
		<label style="font-size: 20px"><font color="grey">DOCUMENTO DESTINADO PARA USO INTERNO</font></label><br>
		<label style="font-size: 20px"><font color="grey">********* NÃO É DOCUMENTO FISCAL *********</font></label><br>
				<label style="font-size: 20px"><font color="grey">****** Lemar Sistema de Gestão Comercial ******</font></label>
	</div>
</div>

</body>
</html>

