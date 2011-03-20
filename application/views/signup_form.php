<div id='register_form'>
<h1>Register</h1>
<fieldset>
<legend>Login info</legend>
<?php 
echo form_open('login/register'); 
echo form_input(Array('placeholder' => 'Username', 'name' => 'username', 'value' => set_value('username', '')));
echo form_password(Array('placeholder' => 'Password', 'name' => 'password'));
echo form_password(Array('placeholder' => 'Password confirm', 'name' => 'password2'));

echo form_submit('submit', 'Register');

?>
</fieldset>

<?php echo validation_errors(); ?>
</div>