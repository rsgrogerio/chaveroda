<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lemar Sistemas de Gestão</title>
    <link rel="stylesheet" href="../css/venda.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>
  <div id="cad_cliente">
  <div id="header">
  
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
 
  <div id="geral">
  <div id="topo"> 
  	
  </div>	
		<div id="coluna_esquerda">
			<form name="listar" method="POST" action="../controller/listar_os.php">
        		
        		<h1>Ordem de Serviço à Faturar</h1>
        
<?php
   
$conn= new mysqli("localhost","root","","chaveroda");

if($conn->connect_error){
	echo "Error: ".$conn->connect_error;
}

$result = $conn->query("SELECT os.id, cl.nome, cl.cpfcnpj, os.status,
((s.quantidade*s.valor_unitario)+sum(p.quantidade*p.valor_unitario)) as total_geral from os 
INNER JOIN cliente as cl ON cl.cpfcnpj = os.id_cpfcnpj 
INNER JOIN os_corpo_servico as s ON s.id_capa_os = os.id
INNER JOIN os_corpo_produto as p ON p.id_capa_os = os.id 
where os.status in('Executada') group by cl.cpfcnpj");

$data = array();

 
      echo '<table width="98%" height="50" border="1" cellspacing="0">';
	 	echo '<tr>';
		echo	'<td bgcolor="lightgray" align="center"><strong>OS <strong></td>';		
		echo 	'<td bgcolor="lightgray" align="center"><strong>Cliente </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>CPF/CNPJ </strong></td>';
		echo	'<td bgcolor="lightgray" align="center"><strong>Status </strong></td>';		
		echo	'<td bgcolor="lightgray" align="center"><strong>Total </strong></td>';
		echo '</tr>';


while ($row = $result->fetch_assoc()){
            
		echo '<tr>';
		echo '  <td>'.$row["id"].'</td>'; 		
 		echo '  <td>'.$row["nome"].'</td>';		
		echo '  <td>'.$row["cpfcnpj"].'</td>';
		echo '  <td>'.$row["status"].'</td>';
		echo '  <td>'.$row["total_geral"].'</td>';		
		echo '</tr>';
	
}	
	   echo '</table>';

?>
        
		    
     		</form>
		
		</div>
		
		
	<div id="coluna_direita">
		<form name="venda" method="POST" action="../controller/gravar_venda.php">	
		<h1>Faturar OS</h1>
		
		<p class="codigoos">
			<label for="codigoos">Cod. OS: </label>            
         <input type="text" id="codigoosid" placeholder="Codigo OS" name="codigoos" size="10">		  
	  	</p>
		
		<p class="pagamento">
			
			<label for="pagamento">Forma de Pagamento: </label>
				<?php
					$con_finalizadora= new mysqli("localhost","root","","chaveroda"); 
					$query_finalizadora = $con_finalizadora->query("SELECT finalizadora FROM formapagamento order by id"); 
				?>
					<select name="pagamento">
				   <option value=""></option>
    				<?php 
    					while($reg_finalizadora = $query_finalizadora->fetch_array()) 
    					{ 
    				?>
    					<option>
      				<?php echo $reg_finalizadora['finalizadora']; ?>
    						</option>
						<?php } ?>
					</select>			
					  
	  	</p>
	  	<p class="pagamento">
	  		<label for="desconto">Desconto (%): </label>
				<?php
					$con_desconto= new mysqli("localhost","root","","chaveroda"); 
					$query_desconto = $con_desconto->query("SELECT precototal FROM politicadesconto order by id"); 
				?>
					<select name="desconto">
				   <option value=""></option>
    				<?php 
    					while($reg_desconto = $query_desconto->fetch_array()) 
    					{ 
    				?>
    					<option>
      				<?php echo $reg_desconto['precototal']; ?>
    						</option>
						<?php } ?>
					</select>
      </p> 
      
      <p class="submit">
      	<input type="submit" value="Faturar" name="faturar" id="faturarid">             	 	   	
      </p>   
           	
      </form>  		
	</div>

  </div>
  		
    
    <br>
	 <br>
	
  </div>


<div id="rodape">
<div id="voltar_rodape">			 		
  			<br>
  			<div id="home_rodape">
  			</div>
  		</div>

  		<div id="banner_rodape">
        	<h1>Lemar Sistema de Gestão Comercial</h1>
  		</div>

</div>
    
</body>
</html>
