<div id='login_form'>
	<h1>Please login</h1>
	<?php 
		echo form_open('login/process_login'); 
		echo form_input(array('name' => 'username', 'placeholder' => 'Username'));
		echo form_password(array('name' => 'password', 'placeholder' => 'Password'));
		echo form_submit('submit', 'Login');

		echo anchor('login/signup', 'Create Account');
	?>
</div>