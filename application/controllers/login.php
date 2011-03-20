<?php

class Login extends CI_Controller {
	function index() {
		$data['main_content'] = 'login_form';
		$this->load->view('includes/template', $data);
	}

	function process_login() {
		$this->load->model('users_model');
		$result = $this->users_model->validate();
		if ($result) { // Auth succeeded
			$data = Array (
			  'username' => $this->input->post('username'),
			  'is_logged_in' => true
			);

			$this->session->set_userdata($data);
			redirect('reports/view');
		} else {
			$this->index();
		}
	}

	function signup() {
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}

	function register() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|min_length[4]|matches[password]');
		
		if (FALSE == $this->form_validation->run()) {
			$data['main_content'] = 'signup_form';
			$this->load->view('includes/template', $data);
		} else {
			$this->load->model('users_model');
			if ($result = $this->users_model->create_user()) {
				$data['main_content'] = 'login_form';
				$this->load->view('includes/template', $data);
			} else {
				$data['main_content'] = 'signup_form';
				$this->load->view('includes/template', $data);
			}
		}
	}
}

?>