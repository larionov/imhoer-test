<?php

class Reports extends CI_Controller {
	function __construct() {
		parent::__construct();

		if (!is_logged_in()) {
			redirect(site_url('login'));
		}

	}

	function view() {
		$this->load->model('roles');
		if (!$this->roles->can_view(get_role(), 'reports')) {
			return access_denied();
		}
		$extra = $this->roles->can_extra(get_role(), 'reports');

		$this->load->model('report');
		$data['list'] = $this->report->list_all($extra);	

		$current_report_id = $this->uri->segment(3);
		if (isset($current_report_id) && $current_report_id != false) {
			$current_report = $this->report->load($current_report_id);
		} else {
			$current_report = false;
		}


		$data['current_report_id'] = $current_report_id;
		$data['current_report'] = $current_report;
		$data['can_extra'] = false;
		$data['main_content'] = 'reports/view';
		$this->load->view('includes/template', $data);
	}

}

?>