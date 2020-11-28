<?php

namespace App\Controllers\Users;

use CodeIgniter\Controller;
use App\Models\Users\InSertUserModel;
use App\Libraries\alert;
use App\Models\Pictures\InSertPictureModel;
use Config\Encryption;

class registration extends Controller
{

    public function index()
    {
        $id = $this->request->getGet('id');
        if(!empty($id))
        {
            $modeUser = new InSertUserModel();
            $data['user'] = $modeUser->GetUserById($id);
        }else {
            $data['user'] = ['firstName'=> null, 'lastName'=> null,
             'Permission'=> null, 'Gender'=> null, 'Email'=> null, 'Phone'=> null,
             'Address'=> null, 'Password'=> null, 'idUser'=> null];
        }
        $data['viewchild'] = './registration/content';
        return view('templates/base_view', $data);
    }

    public function InSertUser()
    {
        $something = (array)json_decode($this->request->getBody());
        if ($something != NULL) {
            if ($something['password'] == $something['confirmPassword']) {
                $something['user'] == 'painter' ? $something['Permission'] = 1 : $something['Permission'] = 2;
                $something['gender'] == 'female' ? $something['Gender'] = 1 : $something['Gender'] = 2;
                $model = new InSertUserModel();
                if ($something['btnSubmit'] == 'Modify') {
                    $result = $model->UpdateUsers($something);
                } else {
                    $result = $model->InSertUsers($something);
                }
                if ($result) {
                    $resultGetUser = $model->GetUser($something['email']);
                    $session = \Config\Services::session();
                    $newdata = [
                        'password'  => $resultGetUser['Password'],
                        'email'     => $resultGetUser['Email'],
                        'idUser'    => $resultGetUser['idUser'],
                        'Permission' => $resultGetUser['Permission'],
                        'Gender' => $resultGetUser['Gender'],
                        'logged_in' => TRUE
                    ];
                    $session->set($newdata);
                    $json = ["message" => "Register success", "status" => true];
                    echo json_encode($json);
                }
            } else {
                $json = ["message" => "The two passwords not match", "status" => false];
                echo json_encode($json);
            }
        } else {
            $json = ["message" => "Data is not be empty", "status" => false];
            echo json_encode($json);
        }
    }
    private function CheckValidate()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'password' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'confirmPassword' => 'required',
            'email' => 'required'
        ]);
        $validation->withRequest($this->request)
            ->run();
    }
    public function CheckEmailValidate()
    {
        $model = new InSertUserModel();
        $something = $this->request->getBody();
        $result = $model->GetUser($something);
        if(!empty($result)){
            $json = ["message" => "User already exist ", "status" => false];
            echo json_encode($json);
        } else{
            $json = ["message" => "", "status" => true];
            echo json_encode($json);
        }
    }
}
