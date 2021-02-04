<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->model('doctor/Reservation_model');

	}
	public function index()
	{
		$this->load->view('css');
		$this->load->view('js');

		$data['selectOperation']=$this->Reservation_model->getOperation();
		$data['selectStaff']=$this->Reservation_model->getStaff();
		$data['selectMedicalRight']=$this->Reservation_model->getMedicalRight();
		$data['selectWard']=$this->Reservation_model->getWard();
		$data['selectUnit']=$this->Reservation_model->getUnit();
		$this->load->view('doctor/reservation_form',$data);
	}
	public function formReservation()
	{
		$this->load->view('doctor/reservation_form');
		$this->load->view('css');
		$this->load->view('js');

	}

	public function edit($id_reservation)
	{
		$data['query']=$this->Reservation_model->read($id_reservation);
		$this->load->view('doctor/reservation_form',$data);
		$this->load->view('css');
		$this->load->view('js');
	}

	public function adding(){

		$this->form_validation->set_rules('HN_patient', 'รหัสประจำตัวผู้ป่วย', 'trim|required');
		$this->form_validation->set_rules('id_card_patient', 'รหัสประจำตัวประชาชนผู้ป่วย', 'trim|required|max_length[13]|min_length[13]');
		$this->form_validation->set_rules('fname_patient', 'ชื่อผู้ป่วย', 'trim|required');
		$this->form_validation->set_rules('lname_patient', 'นามสกุลผู้ป่วย', 'trim|required');
		$this->form_validation->set_rules('tell_patient', 'เบอร์ผู้ป่วย', 'trim|required|is_numeric');
		$this->form_validation->set_rules('ref_medicalRight_id', 'สิทธฺ์การรักษาพยาบาลผู้ป่วย', 'trim|required');
		$this->form_validation->set_rules('diagnose', 'การวินัจฉัยโรค', 'trim|required');
		$this->form_validation->set_rules('use_date', 'วันที่จอง', 'trim|required');
		$this->form_validation->set_rules('use_date', 'วันที่จอง', 'trim|required');
		$this->form_validation->set_rules('ref_ward_id', 'วอร์ด', 'trim|required');
		$this->form_validation->set_rules('ref_unit_id', 'แผนกการรักษา', 'trim|required');
		$this->form_validation->set_rules('ref_operation_id', 'หัตถการ', 'trim|required');
		$this->form_validation->set_rules('ref_staff_id', 'อาจารย์แพทย์', 'trim|required');
		$this->form_validation->set_message('required', 'กรุณากรอก%s');
		$this->form_validation->set_message('is_numeric', 'กรุณากรอก%sเป็นตัวเลข');
		$this->form_validation->set_message('max_length', 'กรุณากรอกเลข%s %dหลัก');
		$this->form_validation->set_message('min_length', 'กรุณากรอกเลข%s %dหลัก');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('css');
			$this->load->view('js');

			$data['selectOperation']=$this->Reservation_model->getOperation();
			$data['selectStaff']=$this->Reservation_model->getStaff();
			$data['selectMedicalRight']=$this->Reservation_model->getMedicalRight();
			$data['selectWard']=$this->Reservation_model->getWard();
			$data['selectUnit']=$this->Reservation_model->getUnit();
			$this->load->view('doctor/reservation_form',$data);
		}
		else
		{
			$this->Reservation_model->addReservation();
			redirect('doctor/reservation','refresh');

		}
	}
	public function addingWithSearch(){

		$this->form_validation->set_rules('tell_patient', 'เบอร์ผู้ป่วย', 'trim|required|is_numeric|max_length[10]|min_length[10]');
		$this->form_validation->set_rules('ref_madicalRight_id', 'สิทธฺ์การรักษาพยาบาลผู้ป่วย', 'trim|required');
		$this->form_validation->set_rules('diagnose', 'การวินัจฉัยโรค', 'trim|required');
		$this->form_validation->set_rules('use_date', 'วันที่ใช้', 'trim|required');
		$this->form_validation->set_rules('ref_ward_id', 'วอร์ด', 'trim|required');
		$this->form_validation->set_rules('ref_unit_id', 'แผนกการรักษา', 'trim|required');
		$this->form_validation->set_rules('ref_operation_id', 'หัตถการ', 'trim|required');
		$this->form_validation->set_rules('ref_staff_id', 'อาจารย์แพทย์', 'trim|required');

		$this->form_validation->set_message('required', 'กรุณากรอก%s');
		$this->form_validation->set_message('is_numeric', 'กรุณากรอก%sเป็นตัวเลข');
		$this->form_validation->set_message('max_length', 'กรุณากรอกเลข%s %dหลัก');
		$this->form_validation->set_message('min_length', 'กรุณากรอกเลข%s %dหลัก');

		if ($this->form_validation->run() == FALSE)
		{
			$HN_patient = $this->input->post('HN_patient');
			$data['selectOperation']=$this->Reservation_model->getOperation();
			$data['selectStaff']=$this->Reservation_model->getStaff();
			$data['selectWard']=$this->Reservation_model->getWard();
			$data['selectUnit']=$this->Reservation_model->getUnit();
			$data['selectMDRight']=$this->Reservation_model->getMedicalRight();
			$data['query']=$this->Reservation_model->readPatient($HN_patient);
			$this->load->view('css');
			$this->load->view('js');
			$this->load->view('doctor/reservation_form_after_search_patient',$data);

		}
		else
		{
			//$this->Reservation_model->addReservation();
			//redirect('doctor/reservation','refresh');

		}


	}
	public function editdata(){

		$this->Reservation_model->editReservation();
		redirect('doctor/reservation','refresh');

	}
	public function delete($id_reservation){

		$this->Reservation_model->deleteReservation($id_reservation);
		redirect('doctor/reservation','refresh');

	}
	public function searchPatient(){

		$this->form_validation->set_rules('HN_patient', 'รหัสประจำตัวผู้ป่วย', 'trim|required');
		$this->form_validation->set_message('required', 'กรุณากรอก%s');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('css');
			$this->load->view('js');
			$data['selectOperation']=$this->Reservation_model->getOperation();
			$data['selectStaff']=$this->Reservation_model->getStaff();
			$data['selectMedicalRight']=$this->Reservation_model->getMedicalRight();
			$data['selectWard']=$this->Reservation_model->getWard();
			$data['selectUnit']=$this->Reservation_model->getUnit();
			$this->load->view('doctor/reservation_form',$data);
		}
		else
		{
			$HN_patient = $this->input->post('HN_patient');
			if($this->Reservation_model->searchPatientByHN($HN_patient)){

				$data['selectOperation']=$this->Reservation_model->getOperation();
				$data['selectStaff']=$this->Reservation_model->getStaff();
				$data['selectWard']=$this->Reservation_model->getWard();
				$data['selectUnit']=$this->Reservation_model->getUnit();
				$data['selectMDRight']=$this->Reservation_model->getMedicalRight();
				$data['query']=$this->Reservation_model->readPatient($HN_patient);

				/*echo "<pre>";
				print_r($data);
				echo "</pre>";
				exit();*/

				$this->load->view('css');
				$this->load->view('js');
				$this->load->view('doctor/reservation_form_after_search_patient',$data);


			}else{
				redirect('doctor/reservation','refresh');
			}

		}



	}



}
