<?php

class Reports extends CI_Controller {
	function view() {		
		$data['main_content'] = 'reports/view';
		$this->load->view('includes/template', $data);
	}


}

?>