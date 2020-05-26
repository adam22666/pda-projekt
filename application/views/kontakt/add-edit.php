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
				<div class="panel-heading"><?php echo $action; ?> Kontakt <a href="<?php echo site_url('kontakt/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">
						<div class="form-group">
							<label for="title">Mesto</label>
							<input type="text" class="form-control" name="mesto" id="mesto" placeholder="Vložte mesto" value="<?php echo !empty($post['mesto'])?$post['mesto']:''; ?>">
							<?php echo form_error('mesto','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">PSČ</label>
							<input type="text" class="form-control" name="PSČ" placeholder="Vložte PSČ" value="<?php echo !empty($post['PSČ'])?$post['PSČ']:''; ?>">
							<?php echo form_error('PSČ','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Email</label>
							<input type="text" class="form-control" name="email" placeholder="Vložte email" value="<?php echo !empty($post['email'])?$post['email']:''; ?>">
							<?php echo form_error('email','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Mobil</label>
							<input type="text" class="form-control" name="mobil" placeholder="Vložte mobil" value="<?php echo !empty($post['mobil'])?$post['mobil']:''; ?>">
							<?php echo form_error('mobil','<p class="help-block text-danger">','</p>'); ?>
						</div>

						<input type="submit" name="postSubmit" class="btn btn-primary" value="Poslať"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
