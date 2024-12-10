<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class order extends Controller
{
    public function index()
    {
        
        return view('order/view');
    }
    public function create()
    {
        
        return view('order/create');
    }
}

?>