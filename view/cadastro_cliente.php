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
  		<form name="cad_cliente" method="POST" action="../controller/gravar_cliente.php">
  			     		
        <h1>Cadastro de Clientes</h1>

		  <p class="cpfcnpj">
				<label for="cpfcnpj">CPF/CNPJ: </label>            
            <input type="text" id="cpfcnpjid" required="required" placeholder="Informe o CPF/CNPJ" name="cpfcnpj" size="30" required autofocus>
            
            <label for="ativo">Ativo: </label>            
            	<select id="ativoid" name="ativo">
						<option>Ativo</option>
						<option>Inativo</option>
					</select>	
            
        </p>        
        <p class="nome">
				<label for="nome">Nome: </label>            
            <input type="text" id="nomeid" placeholder="Informe o Nome Completo" name="nome" size="60">
       
         <label for="sexo">Sexo: </label>
				<select id="sexoid" name="sexo">
					<option> </option>					
					<option>M</option>
					<option>F</option>
				</select>
            
        </p>
        
        <p class="endereco">
				<label for="endereco">Endereço: </label>            
            <input type="text" id="enderecoid" placeholder="Rua.. Av.. Praça.." name="endereco" size="56">

				<label for="bairro">Bairro: </label>            
            <input type="text" id="bairroid" placeholder="Informe o Bairro" name="bairro" size="30">

			</p>
			<p>
				<label for="cidade">Cidade: </label>            
            <input type="text" id="cidadeid" placeholder="Informa Cidade" name="cidade" size="30">
    			<label for="uf">UF: </label>            
            	<select id="ufid" name="uf">
						<option> </option>					
						<option>AC</option>
						<option>AL</option>
						<option>AP</option>
						<option>AM</option>
						<option>BA</option>
						<option>CE</option>
						<option>DF</option>
						<option>ES</option>
						<option>GO</option>
						<option>MA</option>
						<option>MT</option>
						<option>MS</option>
						<option>MG</option>
						<option>PA</option>
						<option>PB</option>
						<option>PR</option>
						<option>PE</option>
						<option>PI</option>
						<option>RR</option>
						<option>RO</option>
						<option>RJ</option>
						<option>RN</option>
						<option>RS</option>
						<option>SC</option>
						<option>SP</option>
						<option>SE</option>
						<option>TO</option>
					</select>

        </p>
                
        <p class="telefone">
				<label for="telefone">Telefone: </label>            
            <input type="text" id="telefoneid" placeholder="(xx)xxxx-xxxx" name="telefone" size="20">
        
				<label for="email">Email: </label>            
            <input type="email" id="emailid" placeholder="fulano@mail.com" name="email" size="68">    
            
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

$result = $conn->query("SELECT * FROM cliente where ativo = 'Ativo' order by nome");
$data = array();

 
      echo '<table width="100%" height="50" border="1" cellspacing="0">';
	 	echo '<tr>';
		echo 	'<td bgcolor="lightgray" align="center"><strong>CPF/CNPJ </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Nome <strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Endereco </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Bairro </strong></td>';
		echo	'<td bgcolor="lightgray" align="center"><strong>Cidade </strong></td>';	   	
		echo	'<td bgcolor="lightgray" align="center"><strong>UF </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Telefone </strong></td>';
	   echo	'<td bgcolor="lightgray" align="center"><strong>Sexo </strong></td>';
		echo	'<td bgcolor="lightgray" align="center"><strong>Email </strong></td>';
		echo	'<td bgcolor="lightgray" align="center"><strong>Ativo </strong></td>';
	 	echo '</tr>';


while ($row = $result->fetch_assoc()){
            
		echo '<tr>';
		echo '  <td>'.$row["cpfcnpj"].'</td>';
		echo '  <td>'.$row["nome"].'</td>';
		echo '  <td>'.$row["endereco"].'</td>';
		echo '  <td>'.$row["bairro"].'</td>';
		echo '  <td>'.$row["cidade"].'</td>';
		echo '  <td>'.$row["uf"].'</td>';
		echo '  <td>'.$row["telefone"].'</td>';
		echo '  <td>'.$row["sexo"].'</td>';
		echo '  <td>'.$row["email"].'</td>';
		echo '  <td>'.$row["ativo"].'</td>';
		echo '</tr>';
	
}	
	   echo '</table>';

?>


</div>
    
</body>
</html>
