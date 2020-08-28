<?php

namespace App\Controllers\Users;

use CodeIgniter\Controller;
use App\Models\Users\InSertUserModel;
use App\Libraries\alert;
use App\Models\Pictures\InSertPictureModel;

class registration extends Controller
{

    public function index()
    {
        $id = $this->request->getGet('id');
        if(!empty($id))
        {
            $modePicture = new InSertPictureModel();
            $modeUser = new InSertUserModel();
            $idUser = $modePicture->GetIdUser($id);
            $data['user'] = $modeUser->GetUserById( $idUser);
        }else  $data['user'] = ['Email'=> null];
        $data['viewchild'] = './registration/content';
        return view('templates/base_view', $data);
    }

    public function InSertUser()
    {
        $something = $this->request->getVar();
        $alert = new alert();
        if ($something != NULL) {
            $this->CheckValidate();
            if (!$this->validate([])) {
                $error = $this->validator;
                if ($error->getErrors() == null) {
                    if ($something['password'] == $something['confirmPassword']) {
                        $model = new InSertUserModel();
                        $result = $model->InSertUsers($something);
                        if ($result) {
                            $alert->alert("User saved Success");
                            $data['viewchild'] = 'templates/home';
                            return view('templates/base_view', $data);
                        }
                    } else {
                        $alert->alert('The two passwords not match');
                        $data['viewchild'] = './registration/content';
                        return view('templates/base_view', $data);
                    }
                } else {
                    $data['viewchild'] = './registration/content';
                    $data['validation'] = $error;
                    return view('templates/base_view', $data);
                }
            }
        } else {
            $data['viewchild'] = './registration/content';
            return view('templates/base_view', $data);
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
}
