<?php

class Grid extends CI_Controller {
	function __construct() {
		parent::__construct();

		if (!is_logged_in()) {
			redirect(site_url('login'));
		}

	}

	function view() {		
		$this->load->model('roles');
		if (!$this->roles->can_view(get_role(), 'grid')) {
			return access_denied();
		}
		$this->load->model('Data_grid');
		$offset = $this->uri->segment(3);
		if (!isset($offset)) {
			$offset = 0;
		}
		$rows = $this->Data_grid->rows($offset);
		$data['main_content'] = 'data/view';
		$data['rows'] = $rows;
		$data['can_edit'] = $this->roles->can_edit(get_role(), 'grid');
		$data['can_extra'] = $this->roles->can_extra(get_role(), 'grid');
		$data['num_rows'] = $this->Data_grid->num_rows();
		$data['grid_fields'] = $this->Data_grid->fields();
		$this->load->view('includes/template', $data);

		
	}

	function edit() {
		$this->load->model('roles');
		if (!$this->roles->can_view(get_role(), 'grid')) {
			return access_denied();
		}

		$this->load->model('Data_grid');

		$data['main_content'] = 'data/edit';
		$id = $this->uri->segment(3);
		$data['row'] = $this->Data_grid->row($id);
		$data['grid_fields'] = $this->Data_grid->fields();
		$this->load->view('includes/template', $data);
	}

	function save_row() {
		$this->load->model('roles');
		if (!$this->roles->can_view(get_role(), 'grid')) {
			return access_denied();
		}

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
