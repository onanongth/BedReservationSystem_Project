<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservation_result_model extends CI_Model
{

	public function readReservation()
	{
		$this->db->select('tb_reservation.*,tb_patient.*,tb_ward.*,tb_status.*,tb_operation.*');
		$this->db->from('tb_reservation');
		$array = array(
			'ref_user_id' => $this->session->userdata('id_user'),
		);
		$this->db->where($array);
		$this->db->where('ref_status_id !=' ,4);
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
			'ref_user_id' => $this->session->userdata('id_user'),
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
	public function readBedByIDReservation($id_reservation){
		$this->db->select('tb_approval.*,tb_bed.*');
		$this->db->from('tb_approval');
		$array = array(
			'tb_approval.ref_reservation_id' => $id_reservation,
		);
		$this->db->where($array);
		$this->db->join('tb_bed','tb_bed.id_bed = tb_approval.ref_bed_id');
		$query =$this->db->get();
		$data = $query->row();
		return $data;
	}
	public function updateData()
	{
		//echo 'Hello';
		$update_patient = $this->getDateUpdate();
		$data_patient = array(
			'HN_patient'			=> $this->input->post('HN_patient'),
			'ref_staff_id'			=> $this->input->post('ref_staff_id'),
			'ref_operation_id' 		=> $this->input->post('ref_operation_id'),
			'ref_medicalRight_id'	=> $this->input->post('ref_medicalRight_id'),
			'ref_unit_id' 			=> $this->input->post('ref_unit_id'),
			'tell_patient' 			=> $this->input->post('tell_patient'),
			'id_card_patient' 		=> $this->input->post('id_card_patient'),
			'fname_patient' 		=> $this->input->post('fname_patient'),
			'lname_patient'			=> $this->input->post('lname_patient'),
			'diagnose'				=> $this->input->post('diagnose'),
			'update_patient' 		=> $update_patient,

		);
		$this->db->where('id_patient',$this->input->post('id_patient'));
		$query = $this->db->update('tb_patient',$data_patient);
		if ($query){

			$this->db->select('id_patient');
			$this->db->from('tb_patient');
			$array = array('update_patient' => $update_patient);
			$this->db->where($array);
			$query =$this->db->get();
			$data = $query->row();
			//echo $data->id_patient;

			$data_reservation = array(
				'ref_patient_id' 		=> $data->id_patient,
				'ref_ward_id' 			=> $this->input->post('ref_ward_id'),
				'ref_user_id' 			=> $this->input->post('ref_user_id'),
				'use_date'				=> $this->input->post('use_date'),
				'update_reservation' 	=> $this->getDateUpdate(),
			);
			$this->db->where('id_reservation',$this->input->post('id_reservation'));
			$query = $this->db->update('tb_reservation',$data_reservation);
			if ($query)
			{
				//echo 'edit ok';
			}



		}else{
			echo 'add false';
		}

	}
	public function updateDataCancel($id_reservation)
	{
		$data_cancel = array(
			'ref_status_id'		=> 4,
		);
		$this->db->where('id_reservation',$id_reservation);
		$query = $this->db->update('tb_reservation',$data_cancel);
	}
	public function getDateUpdate(){
		date_default_timezone_set("Asia/Bangkok");
		$create_reservation = time();
		$timestamp =  date("Y-m-d H:i:s", $create_reservation );
		return $timestamp;
	}
}
