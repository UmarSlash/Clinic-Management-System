<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public $username = 'zul';
    public $password = 'gay';

    public function index()
    {
        return 'gay';
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        return $validatedData['username'];
        
    }
}
