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
  		<form name="cad_cliente" method="POST" action="../controller/gravar_politicadesconto.php">

        <h1>Cadastro Politica Desconto</h1>

		  <p class="precototal">
				<label for="precototal">Preco Total: </label>            
            <input type="text" id="precototalid" required="required" placeholder="Informe o Preco Total" name="precototal" size="40" required autofocus>
            
        </p>        
        <p class="desconto">
				<label for="desconto">Desconto %: </label>            
            <input type="text" id="descontoid" required="required" placeholder="Informe o desconto" name="desconto" size="56">
            
            <label for="ativo">Ativo: </label>            
            	<select id="ativoid" name="ativo">
						<option>Ativo</option>
						<option>Inativo</option>
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

$result = $conn->query("SELECT * FROM `politicadesconto` where ativo = 'Ativo'");
$data = array();

 
      echo '<table width="100%" height="50" border="1" cellspacing="0">';
	 	echo '<tr>';
		echo 	'<td bgcolor="lightgray" align="center"><strong>Preço Total </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Desconto % <strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Ativo <strong></td>';
		echo '</tr>';


while ($row = $result->fetch_assoc()){
            
		echo '<tr>';
		echo '  <td>'.$row["precototal"].'</td>';
		echo '  <td>'.$row["desconto"].'</td>';
		echo '  <td>'.$row["ativo"].'</td>';
		echo '</tr>';
}	
	   echo '</table>';

?>

</div>
    
</body>
</html>
