<?php
class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();

		if (!is_logged_in()) {
			redirect(site_url('login'));
		}
	}

	function has_access() {
		$this->load->model('roles');
		if ($this->roles->can_extra(get_role(), 'admin')) {
			return true;
		} else {
			access_denied();
			return false;
		}
	}

	function index() {
		if ($this->has_access()) {
			$this->load->model('users_model');
			$this->load->model('roles');
			$this->load->model('report');
			$data['users'] = $this->users_model->list_all();
			$data['roles'] = $this->roles->list_roles();
			$data['list_roles'] = $this->roles->list_roles();
			$data['list_access'] = $this->roles->list_access();
			$data['list_reports'] = $this->report->list_all(true);
			$data['main_content'] = 'admin/dashboard';
			$this->load->view('includes/template', $data);
		}
	}
	function report_edit() {
		if ($this->has_access()) {
			$this->load->model('report');
			$id = $this->uri->segment(3);
			$data['report_data'] = $this->report->get_report($id);
			$data['main_content'] = 'admin/report_edit';
			$this->load->view('includes/template', $data);
		}
	}

	function save_report() {
		if ($this->has_access()) {
			$this->load->model('report');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('query', 'Query', 'trim|required|min_length[5]');
			
			if (FALSE == $this->form_validation->run()) {
				$data['main_content'] = 'admin/report_edit';
				$this->load->view('includes/template', $data);
			} else {
				$this->report->save();
				redirect (site_url('admin'));
			}
		}
	}
	
	function report_remove() {
		if ($this->has_access()) {
			$this->load->model('report');
			$this->report->remove();
			redirect (site_url('admin'));
		}
	}

	function user_edit() {
		if ($this->has_access()) {
			$this->load->model('users_model');
			$this->load->model('roles');
			$id = $this->uri->segment(3);
			$data['user'] = $this->users_model->get_user($id);
			$data['list_roles'] = $this->roles->list_roles();
			$data['main_content'] = 'admin/user_edit';
			$this->load->view('includes/template', $data);
		}
	}

	function role_edit() {
		if ($this->has_access()) {
			$this->load->model('users_model');
			$this->load->model('roles');
			$data['list_roles'] = $this->roles->list_roles();
			$data['list_access'] = $this->roles->list_access();
			$data['main_content'] = 'admin/role_edit';
			$this->load->view('includes/template', $data);
		}
	}

	function role_remove() {
		if ($this->has_access()) {
			$this->load->model('roles');
			$this->roles->remove();
			redirect (site_url('admin'));
		}
	}

	function save_user() {
		if ($this->has_access()) {
			$this->load->model('users_model');
			$this->users_model->save_user();
			redirect (site_url('admin'));
		}
	}

	function user_remove() {
		if ($this->has_access()) {
			$this->load->model('users_model');
			$this->users_model->remove_user();
			redirect (site_url('admin'));
		}
	}

	function save_role() {
		if ($this->has_access()) {
			$this->load->model('users_model');
			$this->load->model('roles');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name', 'Role name', 'trim|required|min_length[2]');
			
			if (FALSE == $this->form_validation->run()) {
				$data['main_content'] = 'admin/role_edit';
				$this->load->view('includes/template', $data);
			} else {
				$this->roles->save();
				redirect (site_url('admin'));
			}
		}

	}
}
?>