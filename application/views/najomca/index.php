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
		<h1>Zoznam Nájomcov</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Nájomca <a href="<?php echo site_url('najomca/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="5%">ID</th>
						<th width="20%">Meno</th>
						<th width="20%">Priezvisko</th>
						<th width="15%">Mesto</th>
						<th width="15%">PSČ</th>
						<th width="15%">Dátum_narodenia</th>
						<th width="10%">Akcia</th>


					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($najomca)): foreach($najomca as $najomca1): ?>
						<tr>
							<td><?php echo '#'.$najomca1['idnajomca']; ?></td>
							<td><?php echo $najomca1['meno']; ?></td>
							<td><?php echo $najomca1['priezvisko']; ?></td>
							<td><?php echo $najomca1['mesto']; ?></td>
							<td><?php echo $najomca1['PSČ']; ?></td>
							<td><?php echo $najomca1['datum_narodenia']; ?></td>
							<td>
								<a href="<?php echo site_url('najomca/view/'.$najomca1['idnajomca']); ?>"class="glyphicon glyphicon-eye-open">View</a>
								<a href="<?php echo site_url('najomca/edit/'.$najomca1['idnajomca']); ?>"class="glyphicon glyphicon-edit">Edit</a>
								<a href="<?php echo site_url('najomca/delete/'.$najomca1['idnajomca']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')">Delete</a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Žiadni nájomcovia ......</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
