<?php
$config = [
		'add_user_rules'		=>	[
														[
															'field'	=>	'username',
															'label'	=>	'Username',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'email',
															'label'	=>	'E-mail',
															'rules'	=>	'required|valid_email'
														],
														[
															'field'	=>	'password',
															'label'	=>	'Password',
															'rules'	=>	'required|min_length[8]'
														],
														[
															'field'	=>	'pass2',
															'label'	=>	'Verify Password',
															'rules'	=>	'trim|required|matches[password]'
														],
														[
															'field'	=>	'firstname',
															'label'	=>	'First name',
															'rules'	=>	'required|alpha_dash',
															'errors' => array(
															'alphadash' => 'Firstname must be alphabetic.')
														],
														[
															'field'	=>	'phone',
															'label'	=>	'Phone',
															'rules'	=>	'trim|required|numeric'
														]
														
									],
		'add_new_role'		=>	[
														[
															'field'	=>	'name',
															'label'	=>	'Name',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'permissions',
															'label'	=>	'Permissions',
															'rules'	=>	'required'
														]
								],
		'add_user_rules_front'		=>	[
														[
															'field'	=>	'username',
															'label'	=>	'Username',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'email',
															'label'	=>	'E-mail',
															'rules'	=>	'required|valid_email'
														],
														[
															'field'	=>	'password',
															'label'	=>	'Password',
															'rules'	=>	'required|min_length[8]'
														]
										],
		'add_message_rules'		=>	[
														[
															'field'	=>	'message',
															'label'	=>	'Message',
															'rules'	=>	'required'
														]
								]
								
];
$config['error_prefix'] = '<div style="color:red">';
$config['error_suffix'] = '</div>';