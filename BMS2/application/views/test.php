<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<!-- search select -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />


</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<form>
						<div class="form-group row">
							<label for="" class="col-sm-2 form-control-label">Country</label>
							<div class="col-sm-10">
								<select class="form-control selectpicker" id="select-country" data-live-search="true">
									<option data-tokens="china">China</option>
									<option data-tokens="malayasia">Malayasia</option>
									<option data-tokens="singapore">Singapore</option>
								</select>
								<select class="form-control selectpicker" id="select-country" data-live-search="true">
									<?php foreach ($selectOperation as $row) {?>
										<option data-tokens="malayasia"><?php echo  $row->name_operation;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</form>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</div>
<!-- /.container -->
<!-- search select -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
	$(function() {
		$('.selectpicker').selectpicker();
	});
</script>
</body>
</html>
