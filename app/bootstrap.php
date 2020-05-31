<?php

// Load Config
require_once 'config/config.php';

// Load url helper
require_once 'helpers/url_helper.php';

// Session helper
require_once 'helpers/session_helper.php';

// Autoload Core Libraries
spl_autoload_register(function($className) {
	require_once 'libs/' . $className . '.php';
});