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
				<div class="panel-heading"><?php echo $action; ?> Nájomca <a href="<?php echo site_url('najomca/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">
						<div class="form-group">
							<label for="title">Meno</label>
							<input type="text" class="form-control" name="meno" id="meno" placeholder="Vložte meno" value="<?php echo !empty($post['meno'])?$post['meno']:''; ?>">
							<?php echo form_error('meno','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Priezvisko</label>
							<input type="text" class="form-control" name="priezvisko" placeholder="Vložte priezvisko" value="<?php echo !empty($post['priezvisko'])?$post['priezvisko']:''; ?>">
							<?php echo form_error('priezvisko','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Mesto</label>
							<input type="text" class="form-control" name="mesto" placeholder="Vložte mesto" value="<?php echo !empty($post['mesto'])?$post['mesto']:''; ?>">
							<?php echo form_error('mesto','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">PSČ</label>
							<input type="text" class="form-control" name="PSČ" placeholder="Vložte PSČ" value="<?php echo !empty($post['PSČ'])?$post['PSČ']:''; ?>">
							<?php echo form_error('PSČ','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Dátum narodenia</label>
							<input type="text" class="form-control" name="datum_narodenia" placeholder="Vložte dátum narodenia" value="<?php echo !empty($post['datum_narodenia'])?$post['datum_narodenia']:''; ?>">
							<?php echo form_error('datum_narodenia','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<input type="submit" name="postSubmit" class="btn btn-primary" value="Poslať"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
