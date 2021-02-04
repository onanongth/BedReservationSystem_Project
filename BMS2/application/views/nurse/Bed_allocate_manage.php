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
	<?php $this->load->view('template/menubarNurse');?>

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
				<div class="col-xs-9">
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

									<!-- โทรศัพท์ -->
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
									<!-- การวินิจฉัย -->
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
									<?php if($query->ref_status_id == 2){?>
										<div class="input-group-prepend">
											<label >หมายเลขเตียง :&nbsp;</label>
											<span ><?php echo $bed->number_bed;?> </span>
											<br>
										</div>
									<?php}else {?>

									<?php } ?>
								</div>
							</div>
							<!-- /.row -->
						</div>
						<!-- /.box-header -->

						<!-- ปุ่มย้อนกลับ -->
						<div class="row">
							<hr>
							<div class="col-md-10">
							</div>
							<div class="col-md-4"></div>
							<div class="col-md-5">
								<div class="box-body">
									<?php if ($query->ref_status_id ==1) {?>
										<a href="<?php echo site_url('nurse/management/approve/').$query->id_reservation;?>">
											<button class="btn btn-success btn-edit btn-sm" name="" id="">
												<i class="fa fa-check"></i> อนุมัติ</button>
										</a>
											<button class="btn btn-danger btn-edit btn-sm" name="" id="" data-toggle="modal" data-target="#noApproveModal">
												<i class="fa fa-close"></i> ไม่อนุมัติ</button>
										</a>
										<a class="btn btn-primary" href="<?php echo site_url('nurse/management/Allocate')?>" role="button">ย้อนกลับ</a>
									<?php }else if ($query->ref_status_id ==2) {?>
										<button class="btn btn-danger btn-edit btn-sm" name="" id="" data-toggle="modal" data-target="#cancelModal">
										<i class="fa fa-close"></i> ยกเลิก</button>
										</a>
										<a class="btn btn-primary" href="<?php echo site_url('nurse/management/Allocate')?>" role="button">ย้อนกลับ</a>
									<?php } else {?>
										<a class="btn btn-primary" href="<?php echo site_url('nurse/management/Allocate')?>" role="button">ย้อนกลับ</a>
									<?php }?>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
		<!-- cancel model -->
		<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLabel" style="color: red"><i class="fa fa-warning"></i>  ยกเลิกรายการอนุมัตินี้ ?</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<!-- HN -->
							<div class="col-md-6">
									<div class="input-group-prepend">
											<label>HN :</label>
											<span><?php echo $query->HN_patient?></span>
											<br>
									</div>
									<div class="input-group-prepend">
										<label >หัตถการ :&nbsp;</label>
										<span ><?php echo $query->name_operation;?></span>
										<br>
									</div>
										<div class="input-group-prepend">
										<label >วันที่ใช้ :&nbsp;</label>
										<span ><?php echo $query->use_date;?></span>
										<br>
									</div>
							</div>
							<div class="col-md-6">
									<div class="input-group-prepend">
										<label>ชื่อ :</label>
										<span><?php echo $query->fname_patient?> </b><?php echo $query->lname_patient?></span>
										<br>
									</div>
									<div class="input-group-prepend">
										<label >แผนกการรักษา :&nbsp;</label>
										<span ><?php echo $query->name_unit;?></span>
										<br>
									</div>
									<div class="input-group-prepend">
										<label >ชื่อผู้จอง :&nbsp;</label>
										<span ><?php echo $query->fname_user;?> <?php echo $query->lname_user;?></span>
										<br>
									</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<a href="<?php echo site_url('nurse/management/cancelApprove/').$query->id_reservation."/".$bed->ref_bed_id;?>">
							<button type="button" class="btn btn-primary">save</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- no approve modal-->
		<div class="modal fade" id="noApproveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLabel" style="color: red"><i class="fa fa-warning"></i>  ไม่อนุมัติรายการจองนี้ ?</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<!-- HN -->
							<div class="col-md-6">
								<div class="input-group-prepend">
									<label>HN :</label>
									<span><?php echo $query->HN_patient?></span>
									<br>
								</div>
								<div class="input-group-prepend">
									<label >หัตถการ :&nbsp;</label>
									<span ><?php echo $query->name_operation;?></span>
									<br>
								</div>
								<div class="input-group-prepend">
									<label >วันที่ใช้ :&nbsp;</label>
									<span ><?php echo $query->use_date;?></span>
									<br>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group-prepend">
									<label>ชื่อ :</label>
									<span><?php echo $query->fname_patient?> </b><?php echo $query->lname_patient?></span>
									<br>
								</div>
								<div class="input-group-prepend">
									<label >แผนกการรักษา :&nbsp;</label>
									<span ><?php echo $query->name_unit;?></span>
									<br>
								</div>
								<div class="input-group-prepend">
									<label >ชื่อผู้จอง :&nbsp;</label>
									<span ><?php echo $query->fname_user;?> <?php echo $query->lname_user;?></span>
									<br>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<a href="<?php echo site_url('nurse/management/noApprove/').$query->id_reservation;?>">
							<button type="button" class="btn btn-primary">save</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!--/ no approve modal -->

	</div>
	<!-- /.content-wrapper -->
	<!-- footer.php -->
	<?php $this->load->view('template/footer_admin');?>

</div>
</body>
</html>
