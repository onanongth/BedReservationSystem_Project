<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Allocate_model extends CI_Model {


	public function readBed()
	{
		$this->db->select('tb_bed.*');
		$this->db->from('tb_bed');
		$array = array(
			'ref_ward_id' =>$this->session->userdata('ref_ward_id'),
		);
		$this->db->where($array);
		$query =$this->db->get();
		$data = $query->result();
		return $data;
	}

	public function readBedType()
	{
		$this->db->select('tb_bedType.*');
		$this->db->from('tb_bedtype');
		$query =$this->db->get();
		$data = $query->result();
		return $data;
	}
	public function readBedAvaliable()
	{
		$this->db->select('tb_bed.*');
		$this->db->from('tb_bed');
		$array = array(
			'ref_ward_id' =>$this->session->userdata('ref_ward_id'),
			'ref_statusBed_id' => 1,
		);
		$this->db->where($array);
		$query =$this->db->get();
		$data = $query->result();
		return $data;
	}

	public function readReservation()
	{
		$this->db->select('tb_reservation.*,tb_patient.*,tb_ward.*,tb_status.*,tb_operation.*,tb_user.*');
		$this->db->from('tb_reservation');
		$array = array(
			'tb_reservation.ref_ward_id' => $this->session->userdata('ref_ward_id'),
			'ref_status_id !=' => 4,
		);
		$this->db->where($array);
		$this->db->join('tb_user','tb_user.id_user = tb_reservation.ref_user_id');
		$this->db->join('tb_patient','tb_patient.id_patient = tb_reservation.ref_patient_id');
		$this->db->join('tb_operation','tb_operation.id_operation = tb_patient.ref_operation_id');
		$this->db->join('tb_ward','tb_ward.id_ward = tb_reservation.ref_ward_id');
		$this->db->join('tb_status','tb_status.id_status = tb_reservation.ref_status_id');
		$this->db->order_by('tb_reservation.date_reservation','desc');
		$query =$this->db->get();
		$data = $query->result();
		return $data;
	}
	public function readReservationById($id_reservation){
		$this->db->select('tb_reservation.*,tb_patient.*,tb_ward.*,tb_status.*,tb_operation.*,
		tb_medical_right.*,tb_unit.*,tb_staff.*,tb_user.*'

		);
		$this->db->from('tb_reservation');
		$array = array(
			'tb_reservation.ref_ward_id' => $this->session->userdata('ref_ward_id'),
			'id_reservation' => $id_reservation,
		);
		$this->db->where($array);
		$this->db->join('tb_patient','tb_patient.id_patient = tb_reservation.ref_patient_id');
		$this->db->join('tb_medical_right','tb_medical_right.id_medicalRight = tb_patient.ref_medicalRight_id');
		$this->db->join('tb_unit','tb_unit.id_unit = tb_patient.ref_unit_id');
		$this->db->join('tb_staff','tb_staff.id_staff = tb_patient.ref_staff_id');
		$this->db->join('tb_operation','tb_operation.id_operation = tb_patient.ref_operation_id');
		$this->db->join('tb_ward','tb_ward.id_ward = tb_reservation.ref_ward_id');
		$this->db->join('tb_user','tb_user.id_user = tb_reservation.ref_user_id');
		$this->db->join('tb_status','tb_status.id_status = tb_reservation.ref_status_id');
		$this->db->order_by('tb_reservation.date_reservation','desc');
		$query =$this->db->get();
		$data = $query->row();
		return $data;
	}
	public function readBedByIdReservation($id_reservation){
		$this->db->select('tb_reservation.*,tb_approval.*,tb_bed.*'
		);
		$this->db->from('tb_reservation');
		$array = array(
			'tb_reservation.ref_ward_id' => $this->session->userdata('ref_ward_id'),
			'id_reservation' => $id_reservation,
		);
		$this->db->where($array);
		$this->db->join('tb_approval','tb_approval.ref_reservation_id = tb_reservation.id_reservation');
		$this->db->join('tb_bed','tb_bed.id_bed = tb_approval.ref_bed_id');
		$this->db->order_by('tb_reservation.date_reservation','desc');
		$query =$this->db->get();
		$data = $query->row();
		return $data;
	}

	public function updateStatusReservation($id_reservation)
	{
		$data = array('ref_status_id' => 2,);
		$this->db->where('id_reservation',$id_reservation);
		$query = $this->db->update('tb_reservation',$data);
	}
	public function updateStatusReservationCancel($id_reservation)
	{
		$data = array('ref_status_id' => 3,);
		$this->db->where('id_reservation',$id_reservation);
		$query = $this->db->update('tb_reservation',$data);
	}
	public function updateStatusBed($id_bed)
	{
		$data = array('ref_statusBed_id' => 2,);
		$this->db->where('id_bed',$id_bed);
		$query = $this->db->update('tb_bed',$data);
	}
	public function updateStatusBedCancel($id_bed)
	{
		$data = array('ref_statusBed_id' => 1,);
		$this->db->where('id_bed',$id_bed);
		$query = $this->db->update('tb_bed',$data);
	}
	public function addApproval($id_bed,$id_reservation)
	{
		$creat_approval = $this->getDateCreate();
		$data = array(
			'ref_user_id'			=> $this->session->userdata('id_user'),
			'ref_bed_id'			=> $id_bed,
			'ref_reservation_id' 	=> $id_reservation,
			'create_approval' 		=> $creat_approval,
			'update_approval' 		=> $creat_approval,

		);
		$query = $this->db->insert('tb_approval',$data);
	}
	public function getDateCreate(){
		date_default_timezone_set("Asia/Bangkok");
		$create_reservation = time();
		$timestamp =  date("Y-m-d H:i:s", $create_reservation );
		return $timestamp;
	}


}
