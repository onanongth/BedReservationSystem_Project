<header class="main-header">

	<!-- Logo -->
	<a href="index2.html" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>B</b>MS</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>BMS</b>  </span>
	</a>

	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<!-- Navbar Right Menu -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">

				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa  fa-user"></i>
						<span class="hidden-xs"><?php echo $this->session->userdata('fname_user');?></span>
						<span class="hidden-xs"><?php echo $this->session->userdata('lname_user');?></span>
					</a>
				</li>
			</ul>
		</div>
	</nav>
</header>
