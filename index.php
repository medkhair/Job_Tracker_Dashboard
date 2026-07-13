<?php
require_once __DIR__ . '/config.php';

$route = isset($_GET['route']) ? $_GET['route'] : 'dashboard';

switch ($route) {
	case 'dashboard':
	default:
		$controller = new DashboardController();
		$controller->index();
		break;
}

