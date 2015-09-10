<?php

return array(
	'db_connection'       => null,
	'db_write_connection' => null,
	'table_name'          => 'teacher',
	'table_columns'       => array('*'),
	'guest_login'         => true,
	'multiple_logins'     => false,
	'remember_me'         => array(
		'enabled'     => false,
		'cookie_name' => 'rmcookie',
		'expiration'  => 86400 * 31,
	),
	'groups'              => array(
		1  => array(
			'name'  => 'teacher',
			'roles' => array('teacher'),
		),
		5  => array(
			'name'  => 'charge',
			'roles' => array('charge'),
		),
		10 => array(
			'name'  => 'admin',
			'roles' => array('admin'),
		),
	),
	'roles'               => array(
		'teacher' => array(
			'teacher' => array('ok'),
		),
		'charge'  => array(
			'teacher' => array('ok'),
			'charge'  => array('ok'),
		),
		'admin'   => array(
			'teacher' => array('ok'),
			'charge'  => array('ok'),
			'admin'   => array('ok'),
		),
	),
	'login_hash_salt'     => 'put_some_salt_in_here',
	'username_post_key'   => 'username',
	'password_post_key'   => 'password',
);
