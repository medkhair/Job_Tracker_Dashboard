<?php
class Controller
{
    protected function render($view, $params = [])
    {
        extract($params);
        include __DIR__ . '/views/header.php';
        include __DIR__ . '/views/' . $view . '.php';
        include __DIR__ . '/views/footer.php';
    }
}
