<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lemar Sistemas de Gestão</title>
    <link rel="stylesheet" href="../css/itens_os.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>

  
  <div id="cad_cliente">
  <div id="header">
  <br>
	  <div id="voltar">			 		
  			<br>
  			<div id="home">
				<a href="../index.html">
	 			<img src="../imagens/home.jpeg" width="50" height="50">
  				</a>
  			</div>
  		</div>
  		<div id="banner">
        	<h1>Oficina Chave de Rodas</h1>
  		</div>
  </div>
  
  </div>
  
  <div id="geral">
     
	<div id="coluna_esquerda">
		<form name="listagem_os" method="POST" action="../controller/listagem_os.php">

			<h1 style="margin-left: 20px">Itens Ordem de Serviço</h1>
				  
				  <p class="codigoos">
					<label for="codigoos">Cod. OS: </label>            
           			<input type="text" id="codigoosid" placeholder="Pesquisar OS" name="codigoos" size="10">		  
	  			  </p>
	  			  
	  			  	<p class="submit">
						<input type="submit" value="Listagem OS" name="listagem_os" id="listagem_osid" style="width: 120px">		             	 	   	
           	 	</p>   
           	
		</form>	 			
	 		
	</div>   

  	<br>
	<br>

<?php
   
$conn= new mysqli("localhost","root","","chaveroda");

if($conn->connect_error){
	echo "Error: ".$conn->connect_error;
}

$result = $conn->query("SELECT os.id, cl.nome, cl.cpfcnpj, cl.endereco, os.tecnico, os.defeito, os.status, os.datainicial, os.datafinal, ca.carro from os 
INNER JOIN cliente as cl ON cl.cpfcnpj = os.id_cpfcnpj  
INNER JOIN carro as ca ON ca.id = os.id_carro where os.status in('Esboco','Execucao','Executada')");

$data = array();

 
      echo '<table width="100%" height="50" border="1" cellspacing="0">';
	 	echo '<tr>';
		echo	'<td bgcolor="lightgray" align="center"><strong>OS <strong></td>';		
		echo 	'<td bgcolor="lightgray" align="center"><strong>Cliente </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>CPF/CNPJ </strong></td>';
		echo	'<td bgcolor="lightgray" align="center"><strong>Endereço </strong></td>';	   
      echo	'<td bgcolor="lightgray" align="center"><strong>Tecnico </strong></td>';	   	   	
	   echo	'<td bgcolor="lightgray" align="center"><strong>Abertura </strong></td>';
		echo	'<td bgcolor="lightgray" align="center"><strong>Status </strong></td>';		
		echo	'<td bgcolor="lightgray" align="center"><strong>Defeito </strong></td>';	   
	   echo	'<td bgcolor="lightgray" align="center"><strong>Fechamento </strong></td>';
	   echo '</tr>';


while ($row = $result->fetch_assoc()){
            
		echo '<tr>';
		echo '  <td>'.$row["id"].'</td>'; 		
 		echo '  <td>'.$row["nome"].'</td>';		
		echo '  <td>'.$row["cpfcnpj"].'</td>';
		echo '  <td>'.$row["endereco"].'</td>';
		echo '  <td>'.$row["tecnico"].'</td>';
		echo '  <td>'.$row["datainicial"].'</td>';
		echo '  <td>'.$row["status"].'</td>';		
		echo '  <td>'.$row["defeito"].'</td>';		
		echo '  <td>'.$row["datafinal"].'</td>';

		echo '</tr>';
	
}	
	   echo '</table>';

?>



	   
  </div>		
  

    
</body>
</html>
