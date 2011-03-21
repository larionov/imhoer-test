<?php
	function is_logged_in() {
		
		$is_logged_in = $CI->session->user_data('is_logged_in');
		return (isset($is_logged_in) && $is_logged_in == true);
	}

	function can_read($page) {
		$CI = get_instance();
		$level = $CI->session->user_data('level');
	}

	function can_write($page) {
		$CI = get_instance();
		
	}

	function can_extra($page) {
		$CI = get_instance();
		
	}
?>