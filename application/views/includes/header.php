<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Title</title>

<!-- CSS -->
<link href="<?php echo base_url(); ?>/style/style.css" rel="stylesheet" type="text/css" media="screen" />

<!-- JavaScripts-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

</head>

<body>
<div id='top_bar'>
	<a href='<?=site_url("grid/view");?>'>Data entry</a>
	<a href='<?=site_url("reports/view");?>'>Reports</a>
	<a href='<?=site_url("admin");?>'>Administration</a>
	<div id='top_right'>
		<?php if (isset($user_data)): ?>
			<a href='<?=site_url("login/logout");?>'>Logout</a>
		<?php else: ?>
			<a href='<?=site_url("login");?>'>Login</a>
		<?php endif; ?>
	</div>
</div>
