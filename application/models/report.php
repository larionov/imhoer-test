<?php

class Report extends CI_Model {
	function load($id) {
		$this->db->select('query');
		$this->db->where('id', $id);
		$result = $this->db->get('reports', 1);
		if ($result->num_rows === 1) {
			$query = $result->row()->query;

			$result = $this->db->query($query);
			return $result;
		}
		return false;
	}
	function list_all($extra = false) {
		if (!$extra) {
			$this->db->where('is_extra', false);
		}
		return $this->db->get('reports');
	}

	function save() {
		$id = $this->input->post('id');
		
		$data = array (
			"title" => $this->input->post('title'),
			"query" => $this->input->post('query'),
			"is_extra" => $this->input->post('is_extra'),
		);
		if (isset($id) && $id != false) {
			$this->db->where('id', $id);
			$this->db->update('reports', $data);
		} else {
			$this->db->insert('reports', $data);
		}
	}

	function remove() {
		$id = $this->uri->segment(3);
		$this->db->where('id', $id);
		$this->db->delete('reports');
	}

	function get_report($id) {
		$this->db->where('id', $id);
		$result = $this->db->get('reports');
		if ($result->num_rows === 1) {
			return $result->row();
		}
		return false;
	}
}

?>