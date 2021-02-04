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
				<li><a href="#"><i class="fa fa-dashboard"></i> ประวัติ</a></li>
				<li class="active">ประวัติการจอง</li>
			</ol>
		</section>

		<!-- ตรงนี้เอาไว้แก้เนื้อหาที่จะแสดง -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title"><b>ประวัติการจอง</b></h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">

							<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div class="row">
									<div class="col-sm-6">
										<div class="dataTables_length" id="example1_length">
											<label>Show
												<select name="example1_length" aria-controls="example1" class="form-control input-sm">
													<option value="10">10</option>
													<option value="25">25</option>
													<option value="50">50</option>
													<option value="100">100</option>
												</select> entries
											</label>
										</div>
									</div>
									<div class="col-sm-6">
										<div id="example1_filter" class="dataTables_filter">
											<label>Search:
												<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
											<thead>
											<tr>
												<th>วันที่จอง</th>
												<th>วันที่ใช้</th>
												<th>ผู้จอง</th>
												<th>ผู้ป่วย</th>
												<th>HN</th>
												<th>สถานะ</th>
												<th>หมายเหตุ</th>
												<th>การดำเนินการ</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td><span class="label label-warning">รอ</span></td>
												<td></td>
												<td>
													<a href="detail_history">
														<button class="btn btn-primary btn-edit btn-sm" name="" id="">
															<i class="glyphicon glyphicon-eye-open"></i> ดูข้อมูล</button>
													</a>
												</td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td><span class="label label-danger">ไม่อนุมัติ</span></td>
												<td></td>
												<td>
													<a href="#">
														<button class="btn btn-primary btn-edit btn-sm" name="" id="">
															<i class="glyphicon glyphicon-eye-open"></i> ดูข้อมูล</button>
													</a>
												</td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td><span class="label label-success">อนุมัติ</span></td>
												<td></td>
												<td>
													<a href="#">
														<button class="btn btn-primary btn-edit btn-sm" name="" id="">
															<i class="glyphicon glyphicon-eye-open"></i> ดูข้อมูล</button>
													</a>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
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
