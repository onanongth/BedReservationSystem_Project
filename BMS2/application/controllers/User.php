<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Member_model');
	}

	public function index()
	{
		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('login_form');

	}

	public function check()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if(empty($username) OR empty($password))
		{
			redirect('user','refresh');

		}else{
			$result = $this->Member_model->fetch_user_login(
				$this->input->post('username'),
				sha1($this->input->post('password'))
			);
			// check user in database if have will return true
			if(!empty($result)) {
				$sess = array(
					'id_user' 			=> $result->id_user,
					'ref_userType_id' 	=> $result->ref_userType_id,
					'fname_user' 		=> $result->fname_user,
					'lname_user'		=> $result->lname_user,
					'tell_user'			=> $result->tell_user,
					'ref_ward_id'		=> $result->ref_ward_id
				);

				//declaring session

				$this->session->set_userdata($sess);
				$ref_userType_id = $_SESSION['ref_userType_id'];

				if ($ref_userType_id  == 1) {
					//echo "login success";
					redirect('doctor/reservation', 'refresh');
				} else if($ref_userType_id  == 2) {
					redirect('nurse/management', 'refresh');
				}
			}else{

				$this->session->unset_userdata(array('id_user','ref_userType_id','fname_user','lname_user','tell_user'));
				redirect('user');

			}

		}

	}
	public function logout()
	{
		//removing session
		$this->session->unset_userdata('id_user');
		redirect("user",'refresh');
	}
}
