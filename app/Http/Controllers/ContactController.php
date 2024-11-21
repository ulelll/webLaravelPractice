<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//contact controller

class ContactController extends Controller
{
    public function index()
    {
        return view('contact' , [
            'title' => 'contact',
            'name'  => 'Aurell FM',
            'kelas' => '11 PPLG 2',
            'linkedin' => 'https://www.linkedin.com/in/aurell-falisha-mecca-5608a2290',
            'repository' => 'https://github.com/ulelll/navphp.git',
        ]);
    }
}
