<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct(){

		parent::__construct();

		if ($this->session->userdata('m_level'!=1)){
			redirect('user','refresh');
		}
		$this->load->model('doctor/Reservation_model');

	}

	public function index()
	{
		$data['selectOperation']=$this->Reservation_model->getOperation();
		//print_r($_SESSION);


		$this->load->view('test',$data);



	}

}
