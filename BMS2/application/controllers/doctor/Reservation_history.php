<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation_history extends CI_Controller {

	// หน้าดูผลการจอง
	public function index()
	{
		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('doctor/reservation_history');

	}

	// หน้าแสดงรายละเอียดประวัติการจอง
	public function detail_history(){
		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('doctor/reservation_detail_history');

	}

}
