<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Product extends Controller
{
    public function index()
    {
        
        return view('product/view');
    }
    public function create()
    {
        
        return view('product/create');
    }
}

?>