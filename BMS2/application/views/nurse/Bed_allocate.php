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
        <li class="active">ดูข้อมูล</li>
      </ol>
    </section>

    <!-- ตรงนี้เอาไว้แก้เนื้อหาที่จะแสดง -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>รายการจองเตียง</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <!-- กล่อง -->
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

                      <!-- ตาราง -->
                      <div class="row">
                        <div class="col-sm-12">
                          <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
							  <tr>
								  <th>#</th>
								  <th>วันที่จอง</th>
								  <th>วันที่ใช้</th>
								  <th>HN ผู้ป่วย</th>
								  <th>ชื่อผู้ป่วย</th>
								  <th>ชื่อผู้จอง</th>
								  <th>สถานะ</th>
								  <th style="width: 13%">การดำเนินการ</th>
							  </tr>
                          </thead>
                          <tbody>
						  <?php $i=1; foreach ($query as $row) {?>
							  <tr class="odd gradeX">
								  <td><?php echo $i++?></td>
								  <td><?php echo  $row->date_reservation;?></td>
								  <td><?php echo  $row->use_date;?></td>
								  <td><?php echo  $row->HN_patient;?></td>
								  <td><?php echo  $row->fname_patient;?> <?php echo  $row->lname_patient;?></td>
								  <td><?php echo  $row->fname_user;?> <?php echo  $row->lname_user;?></td>
								  <?php if($row->id_status == 1 ) {?>
									  <td><label class="label label-warning"  ><?php echo  $row->name_status;?></label></td>
								  <?php }else if ($row->id_status == 2) {?>
									  <td><label class="label label-success"><?php echo  $row->name_status;?></label></td>
								  <?php } else {?>
									  <td><label class="label label-danger"><?php echo  $row->name_status;?></label></td>
								  <?php }?>
								  <td>
									  <a href="<?php echo site_url('nurse/management/manageReservation/').$row->id_reservation;?>" <button class="btn btn-primary"><i class="fa fa-pencil "></i> manage</button></a>
								  </td>
							  </tr>
						  <?php } ?>
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
