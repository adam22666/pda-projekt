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
				<div class="panel-heading"><?php echo $action; ?> Prenájom <a href="<?php echo site_url('prenajom/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">

						<div class="form-group">
							<label for="title">Sportovisko</label>
							<input type="text" class="form-control" name="sportovisko" id="sportovisko" placeholder="Vložte športovisko" value="<?php echo !empty($post['sportovisko'])?$post['sportovisko']:''; ?>">
							<?php echo form_error('sportovisko','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Dátum prenájmu</label>
							<input type="text" class="form-control" name="prenajom_datum" placeholder="Vložte dátum prenájmu" value="<?php echo !empty($post['prenajom_datum'])?$post['prenajom_datum']:''; ?>">
							<?php echo form_error('prenajom_datum','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Cena</label>
							<input type="text" class="form-control" name="cena€" placeholder="Vložte cenu" value="<?php echo !empty($post['cena€'])?$post['cena€']:''; ?>">
							<?php echo form_error('cena€','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Nájomca</label>
							<?php echo form_dropdown('idnajomca', $najomca, $vybrany_najomca, 'class="form-control"'); ?>
							<?php echo form_error('idnajomca','<p class="help-block text-danger">','</p>'); ?>
						</div>

						<div class="form-group">
							<label for="title">Kontakt</label>
							<?php echo form_dropdown('idKontakt', $kontakt, $vybrany_kontakt, 'class="form-control"'); ?>
							<?php echo form_error('idKontakt','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<input type="submit" name="postSubmit" class="btn btn-primary" value="Poslať"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
