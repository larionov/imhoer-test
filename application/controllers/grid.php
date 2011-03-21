
<?php

class Grid extends CI_Controller {
	function view() {		
		$this->load->model('Data_grid');
		$offset = $this->uri->segment(3);
		if (!isset($offset)) {
			$offset = 0;
		}
		$rows = $this->Data_grid->rows($offset);
		$data['main_content'] = 'data/view';
		$data['rows'] = $rows;
		$data['num_rows'] = $this->Data_grid->num_rows();
		$data['grid_fields'] = $this->Data_grid->fields();
		$this->load->view('includes/template', $data);

		
	}

	function edit() {
		$this->load->model('Data_grid');

		$data['main_content'] = 'data/edit';
		$id = $this->uri->segment(3);
		$data['row'] = $this->Data_grid->row($id);
		$data['grid_fields'] = $this->Data_grid->fields();
		$this->load->view('includes/template', $data);
	}

	function save_row() {
		$this->load->library('form_validation');
		$this->load->model('Data_grid');
		$data['grid_fields'] = $this->Data_grid->fields();


		foreach ($data['grid_fields'] as $field => $info) {
			if ($field != 'id') {
				$this->form_validation->set_rules($field, $field, 'trim|required|min_length[1]');
			}
		}

		
		if (FALSE == $this->form_validation->run()) {
			$data['main_content'] = 'data/edit';
			$this->load->view('includes/template', $data);
		} else {
			$this->Data_grid->save();
		}
	}
}

?>
