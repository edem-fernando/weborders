<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request) 
    {
        return view('menu.index');
    }
    
    public function edit(Request $request)
    {
        return view('menu.save');
    }
    
    public function save(Request $request)
    {
        
    }
    
    public function filter(Request $request) 
    {
    }
}
