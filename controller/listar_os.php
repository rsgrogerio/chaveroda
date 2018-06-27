<?php

  
	$conn= new mysqli("localhost","root","","chaveroda");

	if($conn->connect_error){
		echo "Error: ".$conn->connect_error;
	}
	
	
	$result = $conn->query("SELECT cl.nome, o.id, o.datainicial, o.defeito, o.status, fun.nome as tecnico from os as o 
									INNER JOIN cliente as cl ON o.id_cpfcnpj = cl.cpfcnpj 
									INNER JOIN funcionario as fun ON o.id_funcionario = fun.id 
									where o.status = 'Esboco'");
	while($row = $result->fetch_assoc()) {
		var_dump($row);
	}									
									
									
/*
	if($status = @$_GET['os']){
			$result = $conn->query("SELECT cl.nome, o.id, o.datainicial, o.defeito, o.status, fun.nome as tecnico from os as o 
									INNER JOIN cliente as cl ON o.id_cpfcnpj = cl.cpfcnpj 
									INNER JOIN funcionario as fun ON o.id_funcionario = fun.id 
									where o.status = $status");
			$data = array();
      	
      echo '<table width="900" height="50" border="1" cellspacing="0">';
	 	echo '<tr>';		
      echo	'<td bgcolor="lightgray" align="center"><strong>OS .........</strong></td>';
		echo 	'<td bgcolor="lightgray" align="center"><strong>Cliente ...........................................</strong></td>';	   	   	   	
	   echo	'<td bgcolor="lightgray" align="center"><strong>Abertura ..............................</strong></td>';
		echo	'<td bgcolor="lightgray" align="center"><strong>Defeito ........................................................................................</strong></td>';		
		echo	'<td bgcolor="lightgray" align="center"><strong>Status ...............</strong></td>';			   
	   echo	'<td bgcolor="lightgray" align="center"><strong>Tecnico ....................................</strong></td>';
	   echo '</tr>';

		while ($row = $result->fetch_assoc()){      
			echo '<tr>'; 		
			echo '  <td>'.$row["id"].'</td>';
 			echo '  <td>'.$row["nome"].'</td>';		
			echo '  <td>'.$row["datainicial"].'</td>';
			echo '  <td>'.$row["defeito"].'</td>';		
			echo '  <td>'.$row["status"].'</td>';		
			echo '  <td>'.$row["tecnico"].'</td>';
			echo '</tr>';
		}		   
	   echo '</table>';
	}else {
		echo "Erro! Nenhuma OS foi selecionado";
      echo "<br>";
		var_dump($status);
      echo "<br>"; 
      }
      
      
*/      
      
?>
