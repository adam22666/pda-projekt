<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('prenajom/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($studenti['id'])?$studenti['id']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Sportovisko:</label>
					<p><?php echo !empty($studenti['sportovisko'])?$studenti['sportovisko']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Dátum prenájmu:</label>
					<p><?php echo !empty($studenti['prenajom_datum'])?$studenti['prenajom_datum']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Cena:</label>
					<p><?php echo !empty($studenti['cena'])?$studenti['cena']:''; ?></p>
			</div>
				<div class="form-group">
					<label>Najomca:</label>
					<p><?php echo !empty($studenti['najomca_idnajomca'])?$studenti['najomca_idnajomca']:''; ?></p>
				</div>
				<div class="form-group">
						<label>Kontakt:</label>
						<p><?php echo !empty($studenti['Kontakt_idKontakt'])?$studenti['Kontakt_idKontakt']:''; ?></p>
					</div>
		</div>
		</div>
	</div>
</div>
