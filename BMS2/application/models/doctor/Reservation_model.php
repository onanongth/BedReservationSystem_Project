<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservation_model extends CI_Model {

	public function addReservation(){

		//echo $this->input->post('ref_ward_id');
		$creat_patient = $this->getDateCreate();
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
			'create_patient' 		=> $creat_patient,
			'update_patient' 		=> $this->getDateCreate(),

		);
		$query = $this->db->insert('tb_patient',$data_patient);
		if ($query){

			$this->db->select('id_patient');
			$this->db->from('tb_patient');
			$array = array('create_patient' => $creat_patient);
			$this->db->where($array);
			$query =$this->db->get();
			$data = $query->row();
			//echo $data->id_patient;
			$data_reservation = array(
				'ref_patient_id'		=> $data->id_patient,
				'ref_ward_id' 			=> $this->input->post('ref_ward_id'),
				'ref_user_id' 			=> $this->input->post('ref_user_id'),
				'date_reservation' 		=> $this->getDateCreate(),
				'use_date'				=> $this->input->post('use_date'),
				'ref_status_id'				=> '1',
				'create_reservation' 	=> $this->getDateCreate(),
				'update_reservation' 	=> $this->getDateCreate(),

			);
			$query = $this->db->insert('tb_reservation',$data_reservation);

			if ($query){
				//echo "add ok";
			}
			//
			//echo redirect('doctor/reservation','refresh');
		}else{
			echo 'add false';
		}

	}

	public function getDateCreate(){
		date_default_timezone_set("Asia/Bangkok");
		$create_reservation = time();
		$timestamp =  date("Y-m-d H:i:s", $create_reservation );
		return $timestamp;
	}
	public function searchPatientByHN($HN_patient)
	{
		$this->db->where('HN_patient',$HN_patient);
		$query = $this->db->get('tb_patient');
		return $query->row();
	}
	public function readPatient($HN_patient){
		$this->db->select('HN_patient,id_card_patient,fname_patient,lname_patient, tell_patient,ref_medicalRight_id');
		$this->db->from('tb_patient');
		$array = array('HN_patient' => $HN_patient);
		$this->db->where($array);
		$query =$this->db->get();
		if($query->num_rows() >0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
	public function getMedicalRight(){

		$query = $this->db->get('tb_medical_right');
		return $query->result();

	}
	public function getWard(){

		$query = $this->db->get('tb_ward');
		return $query->result();

	}
	public function getOperation(){

		$query = $this->db->get('tb_operation');
		return $query->result();

	}
	public function getUnit(){

		$query = $this->db->get('tb_unit');
		return $query->result();
	}
	public function getStaff(){

		$query = $this->db->get('tb_staff');
		return $query->result();

	}

	public function editReservation(){
		$data = array(
			'date_reservation'=> $this->input->post('date_reservation'),
			'use_date'=> $this->input->post('use_date'),
			'diagnose'=> $this->input->post('diagnose'),
			'create_reservation'=> $this->input->post('create_reservation'),
			'ref_ward_id'=> $this->input->post('ref_ward_id'),
			'ref_user_id' => $this->input->post('ref_user_id'),
			'ref_staff_id'=> $this->input->post('ref_staff_id'),
			'ref_patient_id'=> $this->input->post('ref_patient_id'),
			'fanme_patient'=> $this->input->post('fanme_patient'),
			'lname_patient' => $this->input->post('lname_patient'),
			'tell_patient'=> $this->input->post('tell_patient'),
		);
		$this->db->where('id_reservation',$this->input->post('id_reservation'));
		$query = $this->db->upadate('tb_reservation',$data);
		if ($query){
			echo redirect('doctor/reservation','refresh');
		}else{
			echo 'add false';
		}
	}
	public function deleteReservation($id_reservation){

		$query = $this->db->delete('tb_reservation',array('id_reservation'=>$id_reservation));

	}
	public function showdata(){

		$query = $this->db->get('tb_reservation');
		return $query->result();

	}

	public function read($id_reservation){
		$this->db->select('*');
		$this->db->from('tb_reservation');
		$array = array('id_reservation' => $id_reservation);
		$this->db->where($array);
		$query =$this->db->get();

		if($query->num_rows() >0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}


}
