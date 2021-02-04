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
    		<div class="col-xs-12">
	    		<div class="box box-primary">
	    			<div class="box-header">
	    				<h3 class="box-title "><b>รายละเอียดการจอง</b></h3>
	    				
	    				<!-- ข้อมูลผู้ป่วย -->
	    				<br><br>
	    				<div>
	    					<h4><b>ข้อมูลผู้ป่วย</b></h4><hr>
	    				</div>
	    				<div class="row">
	    					<div class="col-md-6">
                                <!-- วันที่จอง -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>วันที่จอง :&nbsp;</b><br><br>
                                    </div>
                                </div>
	    						<!-- HN -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>HN :&nbsp;</b><br><br>
                                    </div>
                                </div>
                                <!-- ชื่อผู้ป่วย -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>ชื่อ :&nbsp;</b><br><br>
                                    </div>
                                </div>
	    						
	    						<!-- โทรศัพท์ -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>โทรศัพท์ :&nbsp;</b><br><br>
                                    </div>
                                </div>

                                <!-- สถานะ -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>สถานะ :&nbsp;</b>
                                    </div>
                                </div>
	    					</div>

	    					<div class="col-md-6">
                                <!-- วันที่ใช้ -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>วันที่ใช้ :&nbsp;</b><br><br>
                                    </div>
                                </div>
	    						<!-- เลขประจำตัวประชาชน -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>เลขประจำตัวประชาชน :&nbsp;</b><br><br>
                                    </div>
                                </div>

	    						<!-- นามสกุลผู้ป่วย -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>นามสกุล :&nbsp;</b><br><br>
                                    </div>
                                </div>

                                <!-- สิทธิ์การรักษา -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>สิทธิ์การรักษา :&nbsp;</b><br><br>
                                    </div>
                                </div>

                                <!-- หมายเหตุ -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>หมายเหตุ :&nbsp;</b>
                                    </div>
                                </div>

	    					</div>

	    				</div>
	    				<!-- /.row -->

						<!-- รายละเอียดการรักษา -->
	    				<br><br>
	    				<div>
	    					<h4><b>รายละเอียดการรักษา</b></h4><hr>
	    				</div>
	    				<div class="row">
	    					<div class="col-md-6">
	    						<!-- โรค -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>โรค :&nbsp;</b><br><br>
                                    </div>
                                </div>
                                <!-- การวินิจฉัย -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>การวินิจฉัย :&nbsp;
                                    </div>
                                </div>
	    						
	    					</div>

	    					<div class="col-md-6">
	    						<!-- หัตถการ -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>หัตถการ :&nbsp;</b>
                                    </div>
                                </div>
	    					</div>
	    				</div>
	    				<!-- /.row -->

	    				<!-- ข้อมูลผู้จอง -->
	    				<br><br>
	    				<div>
	    					<h4><b>ข้อมูลผู้จอง</b></h4><hr>
	    				</div>
	    				<div class="row">
	    					<div class="col-md-6">
	    						<!-- ชื่อ -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>ชื่อ :&nbsp;</b><br><br>
                                    </div>
                                </div>
                                <!-- โทรศัพท์ -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>โทรศัพท์ :&nbsp;</b>
                                    </div>
                                </div>
	    						
	    					</div>

	    					<div class="col-md-6">
	    						<!-- นามสกุล -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <b>นามสกุล :&nbsp;</b>
                                    </div>
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
			    				<a class="btn btn-primary" href="Allocate" role="button">ย้อนกลับ</a>						
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




<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  
</script>
	
</body>
</html>
