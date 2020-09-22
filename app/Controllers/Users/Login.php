<?php 
namespace App\Controllers\Users;
use CodeIgniter\Controller;
use App\Models\Users\CheckUser;

class login extends Controller
{
    function index()
    {
        $data['viewchild'] = './login/content';
        return view('templates/base_view', $data);
    }
    function login()
    {
        $dataSubmit=$this->request->getVar();
        if(!empty( $dataSubmit))
        {
            $checkUser=new CheckUser();
            $result=$checkUser->GetUser($dataSubmit);
            if(!empty($result))
            {
                $session = \Config\Services::session();
                $newdata = [
                    'password'  => $result['Password'],
                    'email'     => $result['Email'],
                    'idUser'    => $result['idUser'],
                    'logged_in' => TRUE
            ];
            $session->set($newdata);
            }
            else
            {
                $session = \Config\Services::session();
                $newdata = [
                    'password'  => '',
                    'email'     => '',
                    'idUser'    => '',
                    'logged_in' => FALSE
            ];
            $session->set($newdata);
            }
        }
        else
        {
            return redirect()->to('/Users/Login');
        }
    }
}
