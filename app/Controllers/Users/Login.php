<?php 
namespace App\Controllers\Users;
use CodeIgniter\Controller;
use App\Models\Users\CheckUser;

class login extends Controller
{
    function index()
    {
        $data['viewchild'] = './login/content';
        $session = \Config\Services::session();
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'])
        {
            $session->destroy();
            return redirect()->to(base_url());
        }
        else return view('templates/base_view', $data);
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
                    'Name'      => str_replace("*-*-"," ",$result['Name']),
                    'Permission'=> $result['Permission'],
                    'Gender'=> $result['Gender'],
                    'logged_in' => TRUE
            ];
            $session->set($newdata);
            return redirect()->to(base_url());
            }
            else
            {
                $session = \Config\Services::session();
                $newdata = [
                    'password'  => '',
                    'email'     => '',
                    'idUser'    => '',
                    'Name'    => '',
                    'Permission'=> '',
                    'Gender'=> '',
                    'logged_in' => FALSE
            ];
            $session->set($newdata);
            return redirect()->to(base_url('/Users/Login'));
            }
        }
        else
        {
            return redirect()->to(base_url('/Users/Login'));
        }
    }
}
