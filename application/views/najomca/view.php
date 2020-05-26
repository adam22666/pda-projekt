<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('najomca/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($najomca['id'])?$najomca['id']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Meno:</label>
					<p><?php echo !empty($najomca['meno'])?$najomca['meno']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Priezvisko:</label>
					<p><?php echo !empty($najomca['priezvisko'])?$najomca['priezvisko']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Mesto:</label>
					<p><?php echo !empty($najomca['mesto'])?$najomca['mesto']:''; ?></p>
				</div>
				<div class="form-group">
					<label>PSČ:</label>
					<p><?php echo !empty($najomca['PSČ'])?$najomca['PSČ']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Dátum_narodenia:</label>
					<p><?php echo !empty($najomca['datum_narodenia'])?$najomca['datum_narodenia']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
