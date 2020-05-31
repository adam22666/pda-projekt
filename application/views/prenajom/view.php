<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('prenajom/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($prenajom['id'])?$prenajom['id']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Sportovisko:</label>
					<p><?php echo !empty($prenajom['sportovisko'])?$prenajom['sportovisko']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Dátum prenájmu:</label>
					<p><?php echo !empty($prenajom['prenajom_datum'])?$prenajom['prenajom_datum']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Cena€:</label>
					<p><?php echo !empty($prenajom['cena€'])?$prenajom['cena€']:''; ?></p>
			</div>

				<div class="form-group">
					<label>Najomca:</label>
					<p><?php echo !empty($prenajom['najomca_idnajomca'])?$prenajom['najomca_idnajomca']:''; ?></p>
				</div>

				<div class="form-group">
					<label>Kontakt:</label>
					<p><?php echo !empty($prenajom['Kontakt_idKontakt'])?$prenajom['Kontakt_idKontakt']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Description:</label>
					<p><?php echo !empty($prenajom['description'])?$prenajom['description']:''; ?></p>
				</div>
		</div>
		</div>
	</div>
</div>
