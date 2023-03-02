<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller
{
    private const DIRECTORY = '../resources/views/';

    protected function render(string $view, array $data = [])
    {
        $loader = new FilesystemLoader(self::DIRECTORY);
        $environment = new Environment($loader);
        return $environment->render($view, $data);
    }

}