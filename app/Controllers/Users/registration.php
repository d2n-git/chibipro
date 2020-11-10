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
        }else  $data['user'] = ['Email'=> null,'Permission'=> null,'Gender'=> null];
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
                        $something['user'] == 'painter' ? $something['Permission'] = 1 : $something['Permission'] = 2;
                        $something['gender'] == 'female' ? $something['Gender'] = 1 : $something['Gender'] = 2;
                        $model = new InSertUserModel();
                        if($something['btnSubmit'] == 'Modify')
                        {
                            $result = $model->UpdateUsers($something);
                        }
                        else
                        {
                            $result = $model->InSertUsers($something);
                        }
                        if ($result) {
                            $alert->alert("User saved Success");
                            return redirect()->to(base_url());
                        }
                    } else {
                        $alert->alert('The two passwords not match');
                        return redirect()->to('/Users/registration');
                    }
                } else {
                    $data['validation'] = $error;
                    return redirect()->to('/Users/registration');
                }
            }
        } else {
            return redirect()->to('/Users/registration');
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
