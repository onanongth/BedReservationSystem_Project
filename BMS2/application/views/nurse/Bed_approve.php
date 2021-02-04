<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style type="text/css">
    a.btn{
      margin-top: 0;
      margin-bottom: 1em;
      margin-left: 1em;
      margin-right: 0;
    }
  </style>
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
        <li><a href="#"><i class="fa fa-dashboard"></i> จัดการเตียง</a></li>
        <li class="active">จัดสรรเตียง</li>
        <li class="active">อนุมัติ</li>
      </ol>
    </section>
	  <br>
	  <div class="container">
		  <div class="col-md-12">
			  <div class="callout callout-info">
				  <h4> กรุณาเลือกเตียงที่ต้องการจัดสรร!</h4>

			  </div>
		  </div>
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
										  <a href="<?php echo site_url('nurse/management/selectBed/').$row->id_bed."/".$query->id_reservation;?>" class="btn btn-app" >
											  <p><?php echo $row->number_bed; ?></p>
											  <p>ว่าง</p>
										  </a>
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
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<!-- footer.php -->
	<?php $this->load->view('template/footer_admin');?>

</div>


  
</body>
</html>
