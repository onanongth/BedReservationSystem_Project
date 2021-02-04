<?php

Class Member_model extends CI_Model {


// Read data from database to show data in admin page
	public function list_member() {

		$this->db->select('id_user,fname_user,lname_user');
		$this->db->from('User');
		$this->db->join('Role as p','Role_user_Role = p.ID_Role');
		$query = $this->db->get();
	}
	public function fetch_user_login($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('tb_user');
		return $query->row();
	}

}

?>
