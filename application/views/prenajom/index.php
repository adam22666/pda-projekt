<div class="container">
	<?php if(!empty($success_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-success"><?php echo $success_msg; ?></div>
		</div>
	<?php }elseif(!empty($error_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-danger"><?php echo $error_msg; ?></div>
		</div>
	<?php } ?>
	<div class="row">
		<h1>Zoznam Prenájmov</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Prenájom <a href="<?php echo site_url('prenajom/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="5%">ID</th>
						<th width="15%">Sportovisko</th>
						<th width="15%">Dátum prenájmu</th>
						<th width="15%">Cena€</th>
						<th width="20%">Najomca</th>
						<th width="15%">Kontakt</th>
						<th width="15%">Akcia</th>

					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($prenajom)): foreach($prenajom as $prenajom1): ?>
						<tr>
							<td><?php echo '#'.$prenajom1['id']; ?></td>
							<td><?php echo $prenajom1['sportovisko']; ?></td>
							<td><?php echo $prenajom1['prenajom_datum']; ?></td>
							<td><?php echo $prenajom1['cena€']; ?></td>
							<td><?php echo $prenajom1['najomca_idnajomca']; ?></td>
							<td><?php echo $prenajom1['Kontakt_idKontakt']; ?></td>
							<td>
								<a href="<?php echo site_url('prenajom/view/'.$prenajom1['id']); ?>"class="glyphicon glyphicon-eye-open">View</a>
								<a href="<?php echo site_url('prenajom/edit/'.$prenajom1['id']); ?>"class="glyphicon glyphicon-edit">Edit</a>
								<a href="<?php echo site_url('prenajom/delete/'.$prenajom1['id']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')">Delete</a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Žiadne prenájmi ......</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
