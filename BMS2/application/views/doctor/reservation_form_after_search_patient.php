<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
        การจองเตียง
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> จองเตียง</a></li>
      </ol>
    </section>

    <!-- ตรงนี้เอาไว้แก้เนื้อหาที่จะแสดง -->
    <section class="content">
		<form role="form"  method="post" name="form1">
    	<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-md-5">
				  <div class="box box-success">
					  <div class="box-header with-border">
					  		<h3 class="box-title">ข้อมูลผู้ป่วย</h3>

					  </div>
					  <br>
					  <!-- HN $$ เลขประจำตัวประชาชน -->
					  <div class="box-body">
						  <div class="row">
							  <!-- col ขวา -->
							  <div class="col-sm-12">
								  <div class="form-group">
									  <label>รหัส HN ผู้ป่วย:</label>
									  <div class="input-group ">
										  <div class="input-group-addon">
											  <i class="fa  fa-wheelchair"></i>
										  </div>
										  <input class="form-control" type="text" id="HN_Patient" name="HN_patient" value="<?php echo $query->HN_patient;?>" disabled>
										  <input class="form-control" type="hidden" id="HN_Patient" name="HN_patient" value="<?php echo $query->HN_patient;?>" >
										  <span class="input-group-btn">
											  <!--<button type="submit" class="btn btn-info btn-flat" >ค้นหา</button>-->
                      						<button type="submit" class="btn btn-info btn-flat" name="search" disabled>ค้นหา</button>
										  </span>
									  </div>
								  </div>
								  <div class="form-group">
									  <label>เลขประจำตัวประชาชน:</label>
									  <div class="input-group">
										  <div class="input-group-addon">
											  <i class="fa fa-credit-card"></i>
										  </div>
										  <input class="form-control" type="text" id="id_card_patient"  value="<?php echo $query->id_card_patient;?>" disabled>
									  </div>
								  </div>
								  <div class="form-group">
									  <label>ชื่อ:</label>
									  <div class="input-group date">
										  <div class="input-group-addon">
											  <i class="fa  fa-pencil"></i>
										  </div>
										  <input class="form-control" type="text" id="FName_Patient"  value="<?php echo $query->fname_patient;?>" disabled>
									  </div>
								  </div>
								  <div class="form-group">
									  <label>นามสกุล:</label>
									  <div class="input-group date">
										  <div class="input-group-addon">
											  <i class="fa  fa-pencil"></i>
										  </div>
										  <input class="form-control" type="text" id="LName_Patient" value="<?php echo $query->lname_patient;?>" disabled>
									  </div>
								  </div>
								  <div class="form-group">
									  <label>โทรศัพท์:</label>
									  <div class="input-group">
										  <div class="input-group-addon">
											  <i class="fa fa-phone"></i>
										  </div>
										  <input class="form-control" type="text" name="tell_patient"  id="tell_patient"  value="<?php echo $query->tell_patient;?>" maxlength="10"  >
									  </div>
									  <?php echo form_error('tell_patient','<div class="error" style="color: #990000">', '</div>');?>
								  </div>

								  <!-- ชื่อผู้ป่วย  && นามสกุลผู้ป่วย-->
								  <div class="form-group">
									  <label>สิทธิ์การรักษา:</label>
									  <select class="form-control" name="ref_medicalRight_id" >
										  <option disabled selected value> -- เลือกสิทธิ์การรักษา -- </option>
										  <?php foreach ($selectMDRight as $row) {?>
											  <option value="<?php echo $row->id_medicalRight; ?>" <?php echo  set_select('ref_medicalRight_id', $row->id_medicalRight, FALSE);?> ><?php echo  $row->name_medicalRight;?></option>
										  <?php } ?>
									  </select>
									  <?php echo form_error('ref_medicalRight_id','<div class="error" style="color: #990000">', '</div>');?>
								  </div>
								  <!-- การวินิจฉัย -->
								  <div class="form-group">
									  <label>วินิจฉัยโรค:</label>
									  <div class="input-group">
										  <div class="input-group-addon">
											  <i class="fa fa-file-text-o"></i>
										  </div>
										  <textarea class="form-control pull-right" id="diagnose" name="diagnose" ><?php echo set_value('diagnose'); ?></textarea>
									  </div>
									  <?php echo form_error('diagnose','<div class="error" style="color: #990000">', '</div>');?>
								  </div>
							  </div>
						  </div>
						  <!-- / row -->
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box success -->

				</div>
				<!-- /col5 -->

				<div class="col-md-5">
				  <div class="box box-primary">
					<div class="box-header with-border">
					  <h2 class="box-title">รายละเอียดการรักษา</h2>
					</div>
					  <br>
					<div class="box-body">

						<!-- วันจอง && วันใช้-->
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>วันที่จอง:</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" id="datepicker"  value="<?php echo date('d/m/Y'); ?>" disabled>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>วันที่ใช้งาน:</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="date" class="form-control pull-right" id="datepicker" name="use_date" value="<?php echo set_value('use_date'); ?>">
									</div>
									<?php echo form_error('use_date','<div class="error" style="color: #990000">', '</div>');?>
								</div>
							</div>
						</div>
						<!-- วอร์ด -->
						<div class="form-group">
							<label>วอร์ด:</label>
							<select class="form-control"  name="ref_ward_id">
								<option disabled selected value> -- เลือกวอร์ด -- </option>
								<?php foreach ($selectWard as $row) {?>
									<option value="<?php echo $row->id_ward; ?>"  <?php echo  set_select('ref_ward_id', $row->id_ward, FALSE); ?> ><?php echo  $row->name_ward;?></option>
								<?php } ?>
							</select>
							<?php echo form_error('ref_ward_id','<div class="error" style="color: #990000">', '</div>');?>
						</div>
						<!-- แผนกการรักษา -->
					  <div class="form-group">
						<label>แผนกการรักษา:</label>
						<div id="myDropdown" class="dropdown-content">
							<select class="form-control" name="ref_unit_id">
								<option disabled data-tokens="-- เลือกแผนกการรักษา --" selected value> -- เลือกแผนกการรักษา -- </option>
								<?php foreach ($selectUnit as $row) {?>
									<option value="<?php echo $row->id_unit; ?>" <?php echo  set_select('ref_unit_id', $row->id_unit, FALSE); ?>><?php echo  $row->name_unit;?></option>
								<?php } ?>
							</select>
							<?php echo form_error('ref_unit_id','<div class="error" style="color: #990000">', '</div>');?>
						</div>
					  </div>
					  <!-- หัตถการ -->
					  <div class="form-group">
						<label>หัตถการ:</label>
						<div id="myDropdown" class="dropdown-content" name="ref_operation_id">
							<select class="form-control" name="ref_operation_id">
								<option disabled selected value> -- เลือกหัตถการ -- </option>
								<?php foreach ($selectOperation as $row) {?>
									<option value="<?php echo $row->id_operation; ?>"  <?php echo  set_select('ref_operation_id', $row->id_operation, FALSE); ?>><?php echo  $row->name_operation;?></option>
								<?php } ?>
							</select>
							<?php echo form_error('ref_operation_id','<div class="error" style="color: #990000">', '</div>');?>
						</div>
					  </div>
						<!-- อาจารย์แพทย์ -->
						<div class="form-group">
							<label>อาจารย์แพทย์:</label>
							<div id="myDropdown" class="dropdown-content" >
								<select class="form-control" name="ref_staff_id">
									<option disabled selected value> -- เลือกอาจารย์แพทย์ -- </option>
									<?php foreach ($selectStaff as $row) {?>
										<option value="<?php echo $row->id_staff; ?>" <?php echo  set_select('ref_staff_id', $row->id_staff, FALSE); ?>><?php echo  $row->fname_staff;?> <?php echo  $row->fname_staff;?></option>
									<?php } ?>
								</select>
								<?php echo form_error('ref_staff_id','<div class="error" style="color: #990000">', '</div>');?>
							</div>
						</div>
						<div class="form-group">
							<label>ผู้ดำเนินการจอง :</label>
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input type="text" class="form-control pull-right"  "
									   value="<?php echo $this->session->userdata('fname_user');?>  <?php echo $this->session->userdata('lname_user');?>" disabled>
								<input type="hidden" class="form-control pull-right"  name="ref_user_id" value="<?php echo $this->session->userdata('id_user');?>" >
							</div>
						</div>
						<div class="form-group">
							<label>เบอร์ผู้ดำเนินการจอง :</label>
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-phone-square" ></i>
								</div>
								<input type="text" class="form-control pull-right" id="datepicker" name="ref_user-id"
									   value="<?php echo $this->session->userdata('tell_user');?>" disabled>
							</div>
						</div>
						<br>
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->
				</div>
				<!-- /col -->
    		</div>
			<!-- / row -->
			<div class="row">
				<div class="col-sm-5"></div>
				<a class="btn btn-app btn-primary" onClick="JavaScript:fncSubmit('back')" >
					<i class="fa fa-arrow-circle-left"></i> ย้อนกลับ
				</a>
				<a class="btn btn-app btn-info" onClick="JavaScript:fncSubmit('adding')">
					<i class="fa fa-save"></i>บันทึก
				</a>

			</div>
			<!-- /.row -->
		</form>
      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

	<!-- footer.php -->
	<?php $this->load->view('template/footer_admin');?>

</div>
<script language="javascript">
	function fncSubmit(strPage)
	{

		if(strPage == "adding")
		{
			document.form1.action="<?php echo site_url('doctor/reservation/addingWithSearch')?>";
		}
		if(strPage == "back")
		{
			document.form1.action="<?php echo site_url('doctor/reservation')?>";
		}
		document.form1.submit();
	}
</script>
</body>
</html>
