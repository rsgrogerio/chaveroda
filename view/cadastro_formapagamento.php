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
  		<form name="cad_cliente" method="POST" action="../controller/gravar_formapagamento.php">

        <h1>Cadastro Formas de Pagamento</h1>

		  <p class="codigo">
				<label for="codigo">Código: </label>            
            <input type="text" id="codigoid" placeholder="Informe o Código" name="codigo" size="40" required autofocus>
            
            <label for="ativo">Ativo: </label>            
            	<select id="ativoid" name="ativo">
						<option>Ativo</option>
						<option>Inativo</option>
					</select>	
            
        </p>        
        <p class="finalizadora">
				<label for="finalizadora">Nome: </label>            
            <input type="text" id="finalizadoraid" placeholder="Informe o Nome da finalizadora" name="finalizadora" size="56">
       
         <label for="Tipo">Tipo: </label>
				<select id="tipoid" name="tipo">
					<option> </option>					
					<option>Vista</option>
					<option>Prazo</option>
				</select>
           
           <label for="parcela">Parcela: </label>            
            <select id="parcelaid" name="parcela">
					<option> </option>					
					<option>30 dias</option>
					<option>2x</option>
					<option>3x</option>
				</select>
 
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

$result = $conn->query("SELECT * FROM `formapagamento` where ativo = 'Ativo' order by id");
$data = array();

 
      echo '<table width="100%" height="50" border="1" cellspacing="0">';
	 	echo '<tr>';
		echo 	'<td bgcolor="lightgray" align="center"><strong>Código </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Finalizadora <strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Tipo </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Parcela </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Ativo </strong></td>';
		echo '</tr>';


while ($row = $result->fetch_assoc()){
            
		echo '<tr>';
		echo '  <td>'.$row["codigo"].'</td>';
		echo '  <td>'.$row["finalizadora"].'</td>';
		echo '  <td>'.$row["tipo"].'</td>';
		echo '  <td>'.$row["parcela"].'</td>';
		echo '  <td>'.$row["ativo"].'</td>';
		echo '</tr>';
	
}	
	   echo '</table>';

?>


</div>
    
</body>
</html>
