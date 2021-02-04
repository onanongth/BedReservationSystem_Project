<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" >
		  <div class="pull-left image">
			  <img src="<?php echo base_url('img/profile2.png');?>" class="img-circle" alt="User Image">
		  </div>
		  <div class="pull-left info">
			  <span class="hidden-xs"><?php echo $this->session->userdata('fname_user');?></span>
			  <span class="hidden-xs"><?php echo $this->session->userdata('lname_user');?></span>
			  <br>
			  <br>
			  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		  </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">จองเตียง</li>
        <li><a href="<?php echo site_url('doctor/reservation');?>"><i class="fa fa-calendar-plus-o text-red"></i> <span>จองเตียง</span></a></li>
        <li><a href="<?php echo site_url('doctor/reservation_result');?>"><i class="glyphicon glyphicon-eye-open text-yellow"></i> <span>ดูผลการจองเตียง</span></a></li>
        <li class="header">ประวัติ</li>
        <li><a href="<?php echo site_url('doctor/reservation_history');?>"><i class="fa fa-list-alt text-red"></i> <span>ประวัติการจอง</span></a></li>
        <li><a href="<?php echo site_url('doctor/profile_doctor');?>"><i class="fa fa-user text-blue"></i> <span>ประวัติผู้ใช้งาน</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
