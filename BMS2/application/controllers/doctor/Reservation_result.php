<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation_result extends CI_Controller {


	public function __construct(){

		parent::__construct();

		$this->load->model('doctor/Reservation_result_model');
		$this->load->model('doctor/Reservation_model');

	}

	// หน้าดูผลการจอง
	public function index()
	{
		$data['query'] = $this->Reservation_result_model->readReservation();
		//print_r($data);
		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('doctor/reservation_result',$data);

	}

	public function edit($id_reservation)
	{
		$this->load->view('css');
		$this->load->view('js');

		$data['selectOperation']=$this->Reservation_model->getOperation();
		$data['selectStaff']=$this->Reservation_model->getStaff();
		$data['selectMedicalRight']=$this->Reservation_model->getMedicalRight();
		$data['selectWard']=$this->Reservation_model->getWard();
		$data['selectUnit']=$this->Reservation_model->getUnit();
		$data['query']=$this->Reservation_result_model->readReservationById($id_reservation);
		$this->load->view('doctor/reservation_form_edit',$data);

	}
	public function update_data()
	{
		//echo $this->input->post('id_reservation');
		$this->form_validation->set_rules('HN_patient', 'รหัสประจำตัวผู้ป่วย', 'trim|required');
		$this->form_validation->set_rules('id_card_patient', 'รหัสประจำตัวประชาชนผู้ป่วย', 'trim|required|max_length[13]|min_length[13]|is_numeric');
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
			$id_reservation = $this->input->post('id_reservation');
			$data['selectOperation']=$this->Reservation_model->getOperation();
			$data['selectStaff']=$this->Reservation_model->getStaff();
			$data['selectMedicalRight']=$this->Reservation_model->getMedicalRight();
			$data['selectWard']=$this->Reservation_model->getWard();
			$data['selectUnit']=$this->Reservation_model->getUnit();
			$data['query']=$this->Reservation_result_model->readReservationById($id_reservation);
			$this->load->view('doctor/reservation_form_edit_after_check',$data);
		}
		else
		{
			$this->Reservation_result_model->updateData();
			redirect('doctor/reservation_result','refresh');

		}
	}

	// หน้าแสดงรายละเอียดการจอง
	public function detail_show($id_reservation)
	{
		$this->load->view('js');
		$this->load->view('css');
		$data['query']=$this->Reservation_result_model->readReservationById($id_reservation);
		$data['bed']=$this->Reservation_result_model->readBedByIDReservation($id_reservation);
		//print_r($data);
		$this->load->view('doctor/reservation_result_detail',$data);

	}
	public function cancel($id_reservation)
	{
		$this->load->view('js');
		$this->load->view('css');
		$data['query']=$this->Reservation_result_model->readReservationById($id_reservation);
		$this->load->view('doctor/reservation_result_cancel',$data);

	}
	public function cancelUpdateStatus($id_reservation)
	{
		$this->Reservation_result_model->updateDataCancel($id_reservation);
		$data['query'] = $this->Reservation_result_model->readReservation();
		//print_r($data);
		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('doctor/reservation_result',$data);

	}

}
