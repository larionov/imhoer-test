<?php

class Reports extends CI_Controller {
	function view() {
		$this->load->view('reports/view');
	}

	function is_logged_in() {
		
	}

	function can_read($page) {
		$level = $this->session->user_data('level');
	}

	function can_write($page) {
		
	}

	function can_extra($page) {
		
	}
}

?>