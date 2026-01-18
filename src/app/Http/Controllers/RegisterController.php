<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Register;

class RegisterController extends Controller
{
   public function index()
    {
        return view('register');
    }
    public function store(RegisterRequest $request)
    {
        $register=$request->only(['name','email','password']);
        Register::create($register);
    }
}
