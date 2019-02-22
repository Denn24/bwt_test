<?php

return [

	'index' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'account/login' => [
		'controller' => 'account',
		'action' => 'login',
	],

    'account/login-signing' => [
        'controller' => 'account',
        'action' => 'signing',
    ],

	'account/register' => [
		'controller' => 'account',
		'action' => 'register',
	],
    'comment/comment' => [
        'controller' => 'comment',
        'action' => 'comment',
    ],

    'account/register-save' => [
        'controller' => 'account',
        'action' => 'register_new_user',
    ],
    'comment/comment-save' => [
        'controller' => 'comment',
        'action' => 'register_new_comment',
    ],
];