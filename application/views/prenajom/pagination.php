<?php
$this->load->view('templates/header');
?>


<table class="table">

	<tr>
		<th width="5%">ID</th>
		<th width="15%">Sportovisko</th>
		<th width="15%">Dátum prenájmu</th>
		<th width="15%">Cena€</th>
		<th width="20%">Najomca</th>
		<th width="15%">Kontakt</th>
		<th width="15%">Akcia</th>

	</tr>


	<?php if(!empty($prenajom)): foreach($prenajom as $prenajom1): ?>

		<tr>
			<td><?php echo $prenajom1->id ?></td>
			<td><?php echo $prenajom1->sportovisko ?></td>
			<td><?php echo $prenajom1->prenajom_datum ?></td>
			<td><?php echo $prenajom1->cena€ ?></td>
			<td><?php echo $prenajom1->najomca_idnajomca ?></td>
			<td><?php echo $prenajom1->Kontakt_idKontakt ?></td>
			<td><?php echo $prenajom1->description ?></td>
			<td><button class="btn btn-info">View</button></td>
			<td><button class="btn btn-primary">Edit</button></td>
			<td><button class="btn btn-danger">Delete</button></td>


		</tr>
	<?php endforeach?>
		<tr><td colspan="4">......</td></tr>
	<?php endif; ?>

</table>
<?php
echo $this->pagination->create_links();
?>

<?php
$this->load->view('templates/footer');
?>
