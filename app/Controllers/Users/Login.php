<?php 
namespace App\Controllers\Users;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\Users\CheckUser;

class login extends BaseController
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
        $dataSubmit = (array)json_decode( $this->request->getBody());
        if(!empty( $dataSubmit))
        {
            $checkUser=new CheckUser();
            $result=$checkUser->GetUser($dataSubmit);
            if(!empty($result))
            {
                $newdata = [
                    'password'  => $result['Password'],
                    'email'     => $result['Email'],
                    'idUser'    => $result['idUser'],
                    'Name'      => str_replace("*-*-"," ",$result['Name']),
                    'Permission'=> $result['Permission'],
                    'Phone'=> $result['Phone'],
                    'Gender'=> $result['Gender'],
                    'logged_in' => TRUE
            ];
            $session = \Config\Services::session();
            $session->set($newdata);
            $json = ["message" => "Login successfully !", "status" => true];
            echo json_encode($json);
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
                    'Phone'=> '',
                    'Gender'=> '',
                    'logged_in' => FALSE
            ];
            $session->set($newdata);
            $json = ["message" => "Login failed ! user or password incorrect.", "status" => false];
            echo json_encode($json);
            }
        }
        else
        {
            $json = ["message" => "Input login info please !", "status" => false];
            echo json_encode($json);
        }
    }
}
