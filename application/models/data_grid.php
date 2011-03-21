<?php
class Data_grid extends CI_Model {
	function fields() {
		$fields_data = $this->db->field_data('data');
		$res = array();
		foreach ($fields_data as $field) {
			$res[$field->name] = array(
				'type' => $field->type,
				'max_length' => $field->max_length
			);
		}
		return $res;
	}

	function num_rows() {
		$query = $this->db->query('select count(*) as cnt FROM `data`;');
		$num = $query->row();
		return $num->cnt;
	}
	function rows($offset = 0) {
		$fields = $this->db->list_fields('data');

		$this->db->limit(20);
		$this->db->select(implode(',', $fields));
		$result = $this->db->get('data', 20, $offset);

		return $result;
	}

	function row($id) {
		$this->db->limit(1);
		$this->db->where('id', $id);
		$result = $this->db->get('data');

		if ($result->num_rows == 1) {
			return $result->row();
		} else {
			return false;
		}
	}

	function save() {
		$fields = $this->db->field_data('data');
		$id = $this->input->post('id');
		$data = array();

		foreach ($fields as $field) {
			if ($field->name != 'id') {
				if ($field->type == 'int') {
					$data[$field->name] = (int)$this->input->post($field->name);
				} else if ($field->type == 'real') {
					$data[$field->name] = (float)$this->input->post($field->name);
				} else {
					$data[$field->name] = $this->input->post($field->name);
				}

				
			}
		}

		if ($id !== FALSE) {
			$this->db->limit(1);
			$this->db->where('id', $id);
			$this->db->update('data', $data);
		} else {
			$this->db->insert('data', $data);
		}
		redirect (site_url('grid/view'));
	}
}
?>