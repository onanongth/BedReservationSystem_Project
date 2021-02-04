<?php
class Login extends CI_Controller
{
	function index()
	{
		$this->load->view('admin/login');
	}
	function verify()
	{
		$this->load->model('Admin');
		$check = $this->Admin->validate();
		if($check)
		{

		}else{
			redirect('admin/login');
		}
	}
}
