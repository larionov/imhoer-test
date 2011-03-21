<?php 

class Users_model extends CI_Model {
	function validate() {
		$this->db->select('users.*, roles.role as role');
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$this->db->join('roles', 'roles.id = users.role_id');
		$result = $this->db->get('users');
		if ($result->num_rows === 1) {
			return $result->row();
		}
		return false;
	}

	function create_user() {
		$data = array (
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'role_id' => 1
		);

		$insert = $this->db->insert('users', $data);
		return $insert;
	}

	function list_all() {
		$this->db->select('users.username, users.id, users.role_id, roles.role');
		$this->db->join('roles', 'roles.id = users.role_id');
		return $this->db->get('users');
	}

	function get_user($id) {
		$this->db->where('id', $id);
		$result = $this->db->get('users', 1);
		if ($result->num_rows == 1) {
			return $result->row();
		}
		return false;
	}

	function save_user() {
		$data = array(
			'role_id' => $this->input->post('role_id')
		);		
		$this->db->where('id', $this->input->post('id'));
		$update = $this->db->update('users', $data);
		return $update;
	}

	function remove_user() {
		$id = $this->uri->segment(3);
		$this->db->where('id', $id);
		$this->db->delete('users');

	}
}
?>