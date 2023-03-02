<?php

namespace App\Controllers;

class AuthenticateController extends Controller
{
    public function index()
    {
        return $this->render('login.twig');
    }

    public function auth()
    {
    }
}