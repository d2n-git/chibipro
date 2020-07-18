<?php 
namespace App\Controllers\Users;
use CodeIgniter\Controller;
use App\Models\Users\CheckUser;
use Config\Encryption;

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
                $encrypter = new Encryption();
                $session = \Config\Services::session();
                $newdata = [
                    'password'  => $result['Password'],
                    'email'     => $result['Email'],
                    'logged_in' => TRUE
            ];
            $session->set($newdata);
            }
            else
            {

            }
        }
        else
        {

        }
    }
}
