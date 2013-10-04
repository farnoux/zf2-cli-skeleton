<?php
// This makes our life easier when dealing with paths.
// Everything is relative to the application root now.
chdir(__DIR__);

// Define encoding
setlocale(LC_ALL, "fr_FR.UTF-8");

// Setup autoloading.
include 'vendor/autoload.php';

// Setup configuration.
$config = include 'config/application.config.php';

if (($env = getenv('APPLICATION_ENV')) != '') {
	$config = array_merge_recursive(include 'config/application.config.'. $env .'.php', $config);
}

// Run the application.
Zend\Mvc\Application::init($config)->run();
