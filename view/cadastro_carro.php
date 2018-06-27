<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lemar Sistemas de Gestão</title>
    <link rel="stylesheet" href="../css/cadastro.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>
  <div id="cad_cliente">
  <div id="header">
  <br>
  <div id="home">
		<a href="../index.html">
	 		<img src="../imagens/home.jpeg" width="50" height="50">		
  		</a>
  </div>
  
  </div>
  <div id="conteudo">
  		<form name="cad_cliente" method="POST" action="../controller/gravar_carro.php">

        <h1>Cadastro de Carros</h1>

		  <p class="cliente">                         
         	<label for="cliente">Cliente: </label>
					<?php
						$con_cliente= new mysqli("localhost","root","","chaveroda"); 
						$query_cliente = $con_cliente->query("SELECT nome FROM cliente order by nome"); 
					?>
						<select name="cliente">
						   <option value=""></option>
    						<?php 
    							while($reg_cliente = $query_cliente->fetch_array()) 
    							{ 
    						?>
    						<option>
      						<?php echo $reg_cliente['nome']; ?>
    						</option>
							<?php } ?>
						</select>            
        
		        <label for="ativo">Ativo: </label>            
            	<select id="ativoid" name="ativo">
						<option>Ativo</option>
						<option>Inativo</option>
					</select> 
        </p>
                    
        <p class="carro">
				<label for="carro">Carro: </label>            
            <input type="text" id="carroid" placeholder="Versa 1.6 4portas" name="carro" size="60">
            
        </p>
        
        <p>
        <label for="fabricante">Fabricante: </label>            
            <input type="text" id="fabricanteid" placeholder="Fiat, Nissan, Chevrolet" name="fabricante" size="53">
		  </p>	        
        
        <p class="anomodelo">
				<label for="anomodelo">Ano Modelo: </label>            
            <input type="text" id="anomodeloid" placeholder="2013/2013" name="anomodelo" size="25">        

            <label for="placa">Placa: </label>            
            <input type="placa" id="placaid" placeholder="Informe a placa" name="placa" size="25">    
			
				<label for="cor">Cor: </label>            
            <input type="text" id="corid" placeholder="Prata, Preto, Cinza.." name="cor" size="23">
        
        </p> 
        <p class="submit">
            <input type="submit" value="Cadastrar" name="cadastrar" id="cadastrarid">
        </p>
		    
     </form>
    
    <br>
	 <br>
	 
  
  </div>
				
  </div>


<div id="tabeladados">

<?php
   
$conn= new mysqli("localhost","root","","chaveroda");

if($conn->connect_error){
	echo "Error: ".$conn->connect_error;
}

$result = $conn->query("SELECT cliente, cpfcnpj, carro, fabricante, anomodelo, cor, placa, ativo
from `carro` where ativo = 'Ativo' order by id");

$data = array();

 
      echo '<table width="100%" height="50" border="1" cellspacing="0">';
	 	echo '<tr>';
		echo	'<td bgcolor="lightgray" align="center"><strong>Cliente <strong></td>';		
		echo 	'<td bgcolor="lightgray" align="center"><strong>CPF/CNPJ </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Carro </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Fabricante </strong></td>';
		echo	'<td bgcolor="lightgray" align="center"><strong>Modelo </strong></td>';	   	
		echo	'<td bgcolor="lightgray" align="center"><strong>Cor </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Placa </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Ativo </strong></td>';
	   echo '</tr>';


while ($row = $result->fetch_assoc()){
            
		echo '<tr>';
 		echo '  <td>'.$row["cliente"].'</td>';		
		echo '  <td>'.$row["cpfcnpj"].'</td>';
		echo '  <td>'.$row["carro"].'</td>';
		echo '  <td>'.$row["fabricante"].'</td>';
		echo '  <td>'.$row["anomodelo"].'</td>';
		echo '  <td>'.$row["cor"].'</td>';
		echo '  <td>'.$row["placa"].'</td>';
		echo '  <td>'.$row["ativo"].'</td>';
		echo '</tr>';
	
}	
	   echo '</table>';

?>


</div>
    
</body>
</html>
