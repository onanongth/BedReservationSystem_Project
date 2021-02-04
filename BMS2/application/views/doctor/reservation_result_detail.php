<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<!-- header.php -->
	<?php $this->load->view('template/header_doctor');?>

	<!-- menubar.php -->
	<?php $this->load->view('template/menubar_doctor');?>

	<!-- หัวด้านบน แต่อยู่ใต้ header -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				ระบบจองเตียง
				<small>วอร์ด 3จ</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="index"><i class="fa fa-dashboard"></i> ประวัติ</a></li>
				<li class="active"><a href="index">ประวัติการจอง</a></li>
				<li class="active">รายละเอียดการจอง</li>
			</ol>
		</section>

		<!-- ตรงนี้เอาไว้แก้เนื้อหาที่จะแสดง -->
		<section class="content">
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-10">
					<div class="box box-primary ">
						<div class="box-header">
							<h3 class="box-title"><b>รายละเอียดการจอง</b></h3>


							<!-- ข้อมูลผู้ป่วย -->
							<br><br>
							<div class="row">
								<hr>
								<div class="col-md-4"><h4><b>ข้อมูลผู้ป่วย</b></h4><hr></div>
								<div class="col-md-4"><h4><b>รายละเอียดการรักษา</b></h4><hr></div>
								<div class="col-md-4"><h4><b>ข้อมูลผู้จอง</b></h4><hr></div>
							</div>
							<div class="row">

								<div class="col-md-4">
									<!-- HN -->
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label>HN :</label>
											<span><?php echo $query->HN_patient?></span>
											<br>
										</div>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label>เลขประจำตัวประชาชน :&nbsp;</label>
											<span><?php echo $query->id_card_patient?></span>
											<br>
										</div>
									</div>

									<!-- ชื่อผู้ป่วย -->
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label>ชื่อ :</label>
											<span><?php echo $query->fname_patient?> </b><?php echo $query->lname_patient?></span>
											<br>
										</div>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label >โทรศัพท์ :&nbsp;</label>
											<span ><?php echo $query->tell_patient?></span>
											<br>
										</div>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label >สิทธิ์การรักษา :&nbsp;</label>
											<span ><?php echo $query->name_medicalRight?></span>
											<br>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<!-- รายละเอียดการรักษา -->
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label >วินิจฉัยโรค :&nbsp;</label>
											<span ><?php echo $query->diagnose;?></span>
											<br>
										</div>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label >หัตถการ :&nbsp;</label>
											<span ><?php echo $query->name_operation;?></span>
											<br>
										</div>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label >แผนกการรักษา :&nbsp;</label>
											<span ><?php echo $query->name_unit;?></span>
											<br>
										</div>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label >อาจารย์แพทย์ :&nbsp;</label>
											<span ><?php echo $query->fname_staff;?> <?php echo $query->lname_staff;?></span>
											<br>
										</div>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label >วอร์ด :&nbsp;</label>
											<span ><?php echo $query->name_ward;?></span>
											<br>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label >วันที่จอง :&nbsp;</label>
											<span ><?php echo $query->date_reservation;?> </span>
											<br>
										</div>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label >วันที่ใช้ :&nbsp;</label>
											<span ><?php echo $query->use_date;?></span>
											<br>
										</div>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label >สถานะ :&nbsp;</label>
											<?php if($query->id_status == 1 ) {?>
												<span ><?php echo $query->name_status;?></span>
											<?php }else if ($query->id_status == 2) {?>
												<span ><?php echo $query->name_status;?></span><br>
												<label >หมายเลขเตียง :&nbsp;</label>
												<span ><?php echo $bed->number_bed;?></span>
											<?php } else if ($query->id_status == 3) {?>
												<span ><?php echo $query->name_status;?></span><br>
												<label >หมายเหตุ :&nbsp;</label>
											<?php } else {?>
												<span ><?php echo $query->name_status;?></span>>
											<?php }?>

											<br>
										</div>
									</div>
									<!-- ชื่อ -->
									<div class="input-group-prepend">
										<label >ชื่อผู้จอง :&nbsp;</label>
										<span ><?php echo $query->fname_user;?> <?php echo $query->lname_user;?></span>
										<br>
									</div>
									<!-- โทรศัพท์ -->
									<div class="input-group-prepend">
										<label >เบอร์ผู้จอง :&nbsp;</label>
										<span ><?php echo $query->tell_user;?></span>
										<br>
									</div>
								</div>
							</div>
							<!-- /.row -->

						</div>
						<!-- /.box-header -->

						<!-- ปุ่มย้อนกลับ -->
						<div class="row">
							<div class="col-md-10">

							</div>
							<div class="col-md-2">
								<div class="box-body">
									<a class="btn btn-primary" href="<?php echo site_url('doctor/reservation_result')?>" role="button">ย้อนกลับ</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->

	</div>
	<!-- /.content-wrapper -->

	<!-- footer.php -->
	<?php $this->load->view('template/footer_admin');?>

</div>
</body>
</html>
