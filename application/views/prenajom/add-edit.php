<div class="container">
	<div class="row"><br></div>
	<div class="col-xs-12">
		<?php
		if(!empty($success_msg)){
			echo '<div class="alert alert-success">'.$success_msg.'</div>';
		}elseif(!empty($error_msg)){
			echo '<div class="alert alert-danger">'.$error_msg.'</div>';
		}
		?>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo $action; ?> Študenti <a href="<?php echo site_url('studenti/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">
						<div class="form-group">
							<label for="title">Sportovisko</label>
							<input type="text" class="form-control" name="sportovisko" id="sportovisko" placeholder="Vložte sportovisko" value="<?php echo !empty($post['sportovisko'])?$post['sportovisko']:''; ?>">
							<?php echo form_error('sportovisko','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Dátum prenájmu</label>
							<input type="text" class="form-control" name="prenajom_datum" placeholder="Vložte prenajom_datum" value="<?php echo !empty($post['prenajom_datum'])?$post['prenajom_datum']:''; ?>">
							<?php echo form_error('prenajom_datum','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Cena</label>
							<input type="text" class="form-control" name="cena" placeholder="Vložte cenu" value="<?php echo !empty($post['cena'])?$post['cena']:''; ?>">
							<?php echo form_error('cena','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Najomca</label>
							<input type="text" class="form-control" name="najomca_idnajomca" placeholder="Vložte najomca_idnajomca" value="<?php echo !empty($post['najomca_idnajomca'])?$post['najomca_idnajomca']:''; ?>">
							<?php echo form_error('najomca_idnajomca','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Kontakt</label>
							<input type="text" class="form-control" name="Kontakt_idKontakt" placeholder="Vložte Kontakt_idKontakt" value="<?php echo !empty($post['Kontakt_idKontakt'])?$post['Kontakt_idKontakt']:''; ?>">
							<?php echo form_error('Kontakt_idKontakt','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<input type="submit" name="postSubmit" class="btn btn-primary" value="Poslať"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
