<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller
{
	//ของพยาบาลทั้งหมด

	// หน้าแรกของพยาบาล

	public function __construct()
	{
		parent::__construct();
		$this->load->model('nurse/Allocate_model');

	}

	public function index()
	{

		$data['bed'] = $this->Allocate_model->readBed();
		$data['bedType'] = $this->Allocate_model->readBedType();
		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('nurse/Bed_status', $data);

	}

	// จัดสรรเตียง
	public function Allocate()
	{
		$data['query'] = $this->Allocate_model->readReservation();
		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('nurse/Bed_allocate', $data);

	}

	// ข้อมูลผู้ป่วยในหน้าจัดสรรเตียง
	public function Allocate_detail()
	{

		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('nurse/Bed_allocate_detail');

	}

	//ยืนยัน
	public function approve($id_reservation)
	{
		$data['query'] = $this->Allocate_model->readReservationById($id_reservation);
		$data['bed'] = $this->Allocate_model->readBedAvaliable();
		$data['bedType'] = $this->Allocate_model->readBedType();
		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('nurse/Bed_approve', $data);
	}
	public function notApprove($id_reservation)
	{
		$data['query'] = $this->Allocate_model->readReservationById($id_reservation);
		$data['bed'] = $this->Allocate_model->readBedAvaliable();
		$data['bedType'] = $this->Allocate_model->readBedType();
		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('nurse/Bed_approve', $data);
	}

	public function cancelApprove($id_reservation,$id_bed)
	{
		//update tb_reservation
		//update tb_bed
		$this->Allocate_model->updateStatusReservationCancel($id_reservation);
		$this->Allocate_model->updateStatusBedCancel($id_bed);
		redirect('nurse/management/Allocate');
		//echo $id_reservation;
	}
	public function noApprove($id_reservation)
	{
		$this->Allocate_model->updateStatusReservationCancel($id_reservation);
		redirect('nurse/management/Allocate');
	}

	public function selectBed($id_bed,$id_reservation)
	{
		$this->Allocate_model->addApproval($id_bed,$id_reservation);
		$this->Allocate_model->updateStatusReservation($id_reservation);
		$this->Allocate_model->updateStatusBed($id_bed);
		$data['query'] = $this->Allocate_model->readReservation();
		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('nurse/Bed_allocate', $data);


	}

	public function manageReservation($id_reservation)
	{
		$this->load->view('js');
		$this->load->view('css');
		$data['query'] = $this->Allocate_model->readReservationById($id_reservation);
		$data['bed'] = $this->Allocate_model->readBedByIdReservation($id_reservation);
		//echo $id_reservation;
		$this->load->view('nurse/Bed_allocate_manage', $data);

	}

}
