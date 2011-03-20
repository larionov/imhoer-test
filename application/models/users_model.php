<?php 

class Users_model extends CI_Model {
	function validate() {
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$result = $this->db->get('users');
		if ($result->num_rows === 1) {
			return true;
		}
	}

	function create_user() {
		$data = array (
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'level' => 0
		);

		$insert = $this->db->insert('users', $data);
		return $insert;
	}

	function has_access_to($page) {
		return true;
		
	}
}
?>