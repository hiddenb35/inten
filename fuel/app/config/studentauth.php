<?php

return array(
	'db_connection'       => null,
	'db_write_connection' => null,
	'table_name'          => 'student',
	'table_columns'       => array('*'),
	'guest_login'         => true,
	'multiple_logins'     => false,
	'remember_me'         => array(
		'enabled'     => false,
		'cookie_name' => 'rmcookie',
		'expiration'  => 86400 * 31,
	),
	'groups'              => array(
		1 => array(
			'name'  => 'admin',
			'roles' => array('admin'),
		),

	),
	'roles'               => array(
		'admin' => array(
			'user' => array('read', 'create'),
		),
	),
	'login_hash_salt'     => 'put_some_salt_in_here',
	'username_post_key'   => 'username',
	'password_post_key'   => 'password',
);
