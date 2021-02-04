<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<!-- header.php -->
	<?php  $this->load->view('template/header_admin');?>
	<!-- menubar.php -->
	<?php  $this->load->view('template/menubar_admin');?>

  <!-- หัวด้านบน แต่อยู่ใต้ header -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  </div>
  <!-- /.content-wrapper -->
	<!-- footer.php -->
	<?php  $this->load->view('template/footer_admin');?>

</div>
	
</body>
</html>
