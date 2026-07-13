<?php
require_once __DIR__ . '/config.php';

$controllerName = isset($_GET['c']) ? $_GET['c'] : 'dashboard';
$action = isset($_GET['a']) ? $_GET['a'] : 'index';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

$controllerClass = ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClass)) {
	$ctrl = new $controllerClass();
	if (method_exists($ctrl, $action)) {
		$ctrl->{$action}($id);
		exit;
	}
}

// fallback
http_response_code(404);
echo "Not Found";

