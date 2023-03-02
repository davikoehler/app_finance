<?php

namespace App\Controllers;
class HomeController extends Controller
{
    public function index(): string
    {
        return $this->render('home.twig', ['name' => 'Davi']);
    }
}