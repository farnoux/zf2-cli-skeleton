<?php
return [
	'modules' => [
		'Iadvize\Export',
	],
	'module_listener_options' => [
		// 'config_glob_paths'    => [
		// 	'config/autoload/{,*.}{global,local}.php',
		// 	'config/autoload/{,*.}' . (getenv('APPLICATION_ENV') ?: 'production') . '.php',
		// ],
		'module_paths' => [
			'./module',
			'./vendor',
		],
	],
	'service_manager' => [
	]
];
