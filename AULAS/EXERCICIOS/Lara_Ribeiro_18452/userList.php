<tr>
	<td style="background-color: #b10708; color: #fff;">
		First Name
	</td>
	<td style="background-color: #b10708; color: #fff;">
		Last Name
	</td>
	<td style="background-color: #b10708; color: #fff;">
		Year
	</td>
	<td style="background-color: #b10708; color: #fff;">
		Delete
	</td>
	<td style="background-color: #b10708; color: #fff;">
		Edit
	</td>
</tr>


<?php 
require("process.php");
if($listaUtilizadores->num_rows>0){
	while ($row = $listaUtilizadores->fetch_assoc()) { ?>
		<tr>
			<td>
				<?php echo $row['firstname']; ?>
			</td>
			<td>
				<?php echo $row['lastname']; ?>
			</td>
			<td>
				<?php echo $row['anoN']; ?>
			</td>
			<td>
				<a href="view.php?eliminarID=<?php echo $row['id']; ?>">Delete</a>
			</td>
			<td>
				<a href="view.php?alterarID=<?php echo $row['id']; ?>">Edit</a>
			</td>
		</tr>
	<?php  }
	$listaUtilizadores->free();

} ?>