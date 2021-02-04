<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<!-- header.php -->
	<?php $this->load->view('template/header_doctor');?>

	<!-- menubar.php -->
	<?php $this->load->view('template/menubarNurse');?>


	<!-- หัวด้านบน แต่อยู่ใต้ header -->
  	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        สถานะเตียง
	        <small>วอร์ด 3จ</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> สถานะเตียง</a></li>
	      </ol>
	   	</section>

	    <!-- ตรงนี้เอาไว้แก้เนื้อหาที่จะแสดง -->
	    <section class="content">
	    	<div class="container">
	    		<!-- ตรงนี้กรอบของแต่ละสาย -->
				<?php foreach ($bedType as $row2) {?>
	    		<div class="col-md-12">
	    			<!-- แบ่งตามสาย A สีน้ำเงิน-->
	    			<div class="box box-primary">
	    				<div class="box-header">
	    					<h3 class="box-title"><b><?php echo $row2->name_bedType; ?><b></h3>
	    				</div>
						<div class="box-body">
							<div class="row">.
								<?php foreach ($bed as $row) {?>
									<?php if($row->ref_bedType_id == $row2->id_bedType ) {?>
										<!-- เตียง 1  -->
										<div class="col-md-2 col-md-12">
											<!-- small box -->
											<?php if($row->ref_statusBed_id==1) {?>
											<div class="small-box bg-blue" id="">
												<div class="inner">
													<h3><?php echo $row->number_bed; ?></h3>
												</div>
												<div class="icon">
													<i class="fa fa-bed"></i>
												</div>
											</div>
											<?php }else {?>
												<div class="small-box bg-red" id="">
													<div class="inner">
														<h3><?php echo $row->number_bed; ?></h3>
													</div>
													<div class="icon">
														<i class="fa fa-bed"></i>
													</div>
												</div>
											<?php }?>
										</div>
									<?php } else {?>

									<?php }?>
								<?php } ?>

							</div>
						</div>
	    			</div>
	    		</div>
	    		<!-- จบสาย A -->
				<?php } ?>


	    	</div>
	    </section>
	</div>

	<!-- footer.php -->
	<?php $this->load->view('template/footer_admin');?>
</div>

</body>
</html>
