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
                    'Permission'=> $result['Permission'],
                    'logged_in' => TRUE
            ];
            $session->set($newdata);
            return redirect()->to('/');
            }
            else
            {
                $session = \Config\Services::session();
                $newdata = [
                    'password'  => '',
                    'email'     => '',
                    'idUser'    => '',
                    'Permission'=> '',
                    'logged_in' => FALSE
            ];
            $session->set($newdata);
            return redirect()->to('/Users/Login');
            }
        }
        else
        {
            return redirect()->to('/Users/Login');
        }
    }
}
