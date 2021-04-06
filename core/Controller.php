<?php

namespace app\core;

class Controller
{
    public string $layout = 'master';

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view)
    {
        return Application::$app->router->view($view);
    }
}