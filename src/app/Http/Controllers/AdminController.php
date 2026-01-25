<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index()
   {
   $categories = Category::simplePaginate(4);
   return view('admin',['categories'=> $categories]);
   }
}
