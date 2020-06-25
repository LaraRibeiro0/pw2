
<tr style="font-color:">
	<td style="background-color: #e61500;"><FONT COLOR="#fff">Primeiro Nome</FONT></td>
	<td style="background-color: #e61500"><FONT COLOR="#fff">Ultimo Nome</FONT></td>
	<td style="background-color: #e61500"><FONT COLOR="#fff">Ano Nascimento</td>
	<td style="background-color: #e61500"><FONT COLOR="#fff">Eliminar</FONT></td>
	<td style="background-color: #e61500"><FONT COLOR="#fff">Alterar</FONT></td>
</tr>
<?php //$textoPesquisa = listarPessoas();
 if($listaPessoas->num_rows>0){
	while($row = $listaPessoas->fetch_assoc()){ ?>
		<tr>
			<td>
				<?php echo $row['primeiroNome'];?>
			</td>
			<td>
				<?php echo $row['ultimoNome'];?>
			</td>
			<td>
				<?php echo $row['anoNascimento'];?>
			</td>
			<td>
				<a href="view.php?eliminarID=<?php echo $row['id']; ?>">Eliminar</a>
			</td>
			<td>
				<a href="view.php?alterarID=<?php echo $row['id']; ?>">Alterar</a>
			</td>
		</tr>
	<?php }
	//$listaPessoas->free();
} 
?>