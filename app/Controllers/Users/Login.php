<?php 
namespace App\Controllers\Users;
use CodeIgniter\Controller;

class login extends Controller
{
    function index()
    {
        $data['viewchild'] = './login/content';
        return view('templates/base_view', $data);
    }
}
