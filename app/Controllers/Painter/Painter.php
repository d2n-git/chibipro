<?php
namespace App\Controllers\Painter;

use CodeIgniter\Controller;

class Painter extends Controller
{
    function Index()
    {
        $data['viewchild'] = './painter/content';
        return view('templates/base_view', $data);
    }
}