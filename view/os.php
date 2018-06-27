<!DOCTYPE html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lemar Sistemas de Gestão</title>
    <link rel="stylesheet" href="../css/os.css" media="screen" title="no title" charset="utf-8">
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
  		<form name="cad_os" method="POST" action="../controller/gravar_os.php">

        <h1>Lançamento Ordem de Serviço</h1>
		  
  		  <p class="datainicial">
				<label for="datainicial">Abertura: </label> 
				
				<?php
					date_default_timezone_set('America/Sao_Paulo');
					$date = date('Y-m-d H:i:s');				
				?>
				
            <input type="text" id="datainicialid" name="datainicial" value="<?php echo $date ?>" readonly>				
								
        		<label for="datafinal">Fechamento: </label>            
         	<input type="text" id="datafinalid" placeholder="0000/00/00 00:00:00" name="datafinal" readonly>    			
				
        </p>        
        <p class="cpfcnpj">
		  	<label for="cpfcnpj">Cod.Cliente: </label>            
         	<input type="text" id="cpfcnpjid" required="required" placeholder="CPF/CNPJ" name="cpfcnpj" size="10" required autofocus>
				<label for="status">Status: </label>            
			         	<select name="status">
								<option>Esboco </option>					
								<option>Execucao</option>
								<option>Cancelada</option>
								<option>Executada</option>
							</select>         	
         	
        </p>
        <p class="tecnico">
        
				<label for="placa">Placa Carro: </label>
							<?php
								$con_placa= new mysqli("localhost","root","","chaveroda"); 
								$query_placa = $con_placa->query("SELECT placa FROM carro order by placa"); 
							?>
							<select name="placa">
							   <option value=""></option>
    							<?php 
    								while($reg_placa = $query_placa->fetch_array()) 
    								{ 
    							?>
    							<option>
      							<?php echo $reg_placa['placa']; ?>
    							</option>
								<?php } ?>
							</select>			
			        
                                 
         	<label for="tecnico">Técnico: </label>
							<?php
								$con_tecnico= new mysqli("localhost","root","","chaveroda"); 
								$query_tecnico = $con_tecnico->query("SELECT nome FROM funcionario order by nome"); 
							?>
							<select name="tecnico">
							   <option value=""></option>
    							<?php 
    								while($reg_tecnico = $query_tecnico->fetch_array()) 
    								{ 
    							?>
    							<option>
      							<?php echo $reg_tecnico['nome']; ?>
    							</option>
								<?php } ?>
							</select>            
         
        </p>
        
        <p class="defeito">
		  	<label for="defeito">Defeito Relatado: </label>            
         	<input type="text" id="defeito" placeholder="Informe o defeito" name="defeito" size="55">        
        </p>
        
        <p class="submit">
        	<input type="submit" value="Cadastrar / Atualizar" name="cadastrar" id="cadastrarid" style="width: 140px">
        </p>
		    
      </form>
      
  	</div>
  		
      
	<div id="coluna_direita">
		
		<form name="cad_os_itens" method="POST" action="../controller/gravar_corpo_os.php">

			<h1>Itens Ordem de Serviço</h1>
				  <p class="codigoos">
					<label for="codigoos">Cod. OS: </label>            
           			<input type="text" id="codigoosid" placeholder="Pesquisar OS" name="codigoos" size="10">		  
	  			  </p>
	  			  
				  <p class="servico">
				  	<label for="servico">Serviço: </label>
				 	<?php
							$con_servico= new mysqli("localhost","root","","chaveroda"); 
							$query_servico = $con_servico->query("SELECT descricao FROM servico order by id"); 
						?>
						<select name="servico">
						   <option value=""></option>
  							<?php 
  								while($reg_servico = $query_servico->fetch_array()) 
  								{ 
  							?>
  							<option>
     							<?php echo $reg_servico['descricao']; ?>
  							</option>
							<?php } ?>
						</select>
					
					</p>	   
					 		<label for="produto">Produto: </label>            
								<?php
									$con_produto= new mysqli("localhost","root","","chaveroda"); 
									$query_produto = $con_produto->query("SELECT descricao FROM produto order by id"); 
								?>
								<select name="produto">
						   	<option value=""></option>
  								<?php 
	  								while($reg_produto = $query_produto->fetch_array()) 
  									{ 
  								?>
  								<option>
     							<?php echo $reg_produto['descricao']; ?>
  									</option>
								<?php } ?>
								</select>
               
               <p class="quantidade">	
						<label for="quantidadeos">Quantidade: </label>            
           			<input type="text" id="quantidadeid" placeholder="Quantidade" name="quantidade" size="15">					
					</p>

					
	  			  	<p class="submit">
           	 	   <input type="submit" value="Inserir" name="cadastro" id="cadastroid">             	 	   	
           	 	</p>   
           	
					
				  <br>
 				  <br>

		</form>
			
	</div>   

  	<br>
	<br>
	   
  </div>		
  
<div id="tabeladados">
<div id="voltar_rodape">			 		
  			<br>
  			<div id="home_rodape">
  			</div>
  		</div>
<?php
   
$conn= new mysqli("localhost","root","","chaveroda");

if($conn->connect_error){
	echo "Error: ".$conn->connect_error;
}

$result = $conn->query("SELECT os.id, cl.nome, cl.cpfcnpj, cl.endereco, os.tecnico, os.defeito, os.status, os.datainicial, os.datafinal, ca.carro from os 
INNER JOIN cliente as cl ON cl.cpfcnpj = os.id_cpfcnpj  
INNER JOIN carro as ca ON ca.id = os.id_carro where os.status in('Esboco','Execucao')");

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
