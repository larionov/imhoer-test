<?php
	function is_logged_in() {
		$CI =& get_instance();

		$is_logged_in = $CI->session->userdata('is_logged_in');
		return (isset($is_logged_in) && $is_logged_in == true);
	}

	function get_role() {
		$CI =& get_instance();

		if (is_logged_in() && $role = $CI->session->userdata('role')) {
			return $role;
		}
		return false;
	}

	function get_username() {
		$CI =& get_instance();
		if (is_logged_in() && $role = $CI->session->userdata('username')) {
			return $role;
		}
		return false;
	}

	function access_denied() {
		$CI =& get_instance();
		$data['main_content'] = 'access_denied';
		$CI->load->view('includes/template', $data);
	}

?>