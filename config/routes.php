<?php

return [
	'home' => [
		[
			'url' => 'dashboard',
			'action' => 'dashboard',
			'method' => 'get',
		],
	],
	'password' => [
		[
			'url' => 'password',
			'action' => 'password',
			'method' => 'get',
		],
		[
			'url' => 'change',
			'action' => 'change',
			'method' => 'put',
		],
	],
	'log' => [
		[
			'url' => 'list',
			'action' => 'list',
			'method' => 'get',
		],
	],
	'user' => [
		[
			'url' => 'list',
			'action' => 'list',
			'method' => 'get',
		],
		[
			'url' => 'edit/{id}',
			'action' => 'edit',
			'method' => 'get',
		],
	],
];