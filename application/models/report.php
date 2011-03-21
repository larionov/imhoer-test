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
		
	}

	function remove() {
		
	}
}

?>