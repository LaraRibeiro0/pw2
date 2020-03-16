<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Exercicio 4</title>
<style>
	table{
		border-collapse: collapse;
	}

	table, tr, td{
		border: 1px solid black;
	}

	td{
		width: 80px;
		height: 25px;
		text-align: center;
		background-color: yellow;
	}
</style>
<body>
	<?php 
		echo "<table>";
		for ($row=1; $row <= 7; $row++) { 
			echo "<tr> \n";
			for ($col=1; $col <= 7; $col++) { 
			   $p = $col * $row;
			   echo "<td>$p</td> \n";
			}
		    echo "</tr>";
		}
		echo "</table>";
	?>
</body>
</html>

