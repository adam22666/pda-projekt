<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('kontakt/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($kontakt['id'])?$kontakt['id']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Mesto:</label>
					<p><?php echo !empty($kontakt['mesto'])?$kontakt['mesto']:''; ?></p>
				</div>
				<div class="form-group">
					<label>PSČ:</label>
					<p><?php echo !empty($kontakt['PSČ'])?$kontakt['PSČ']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<p><?php echo !empty($kontakt['email'])?$kontakt['email']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Mobil:</label>
					<p><?php echo !empty($kontakt['mobil'])?$kontakt['mobil']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>

