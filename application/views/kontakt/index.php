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
		<h1>Zoznam Kontaktov</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Kontakt <a href="<?php echo site_url('kontakt/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="10%">ID</th>
						<th width="30%">Mesto</th>
						<th width="30%">PSČ</th>
						<th width="20%">Email</th>
						<th width="10%">Mobil</th>


					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($kontakt)): foreach($kontakt as $kontakt1): ?>
						<tr>
							<td><?php echo '#'.$kontakt1['idKontakt']; ?></td>
							<td><?php echo $kontakt1['mesto']; ?></td>
							<td><?php echo $kontakt1['PSČ']; ?></td>
							<td><?php echo $kontakt1['email']; ?></td>
							<td><?php echo $kontakt1['mobil']; ?></td>

							<td>
								<a href="<?php echo site_url('kontakt/view/'.$kontakt1['idKontakt']); ?>"class="glyphicon glyphicon-eye-open">View</a>
								<a href="<?php echo site_url('kontakt/edit/'.$kontakt1['idKontakt']); ?>"class="glyphicon glyphicon-edit">Edit</a>
								<a href="<?php echo site_url('kontakt/delete/'.$kontakt1['idKontakt']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')">Delete</a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Žiadne kontakty ......</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
