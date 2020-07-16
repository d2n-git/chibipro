<?php

namespace App\Controllers\Users;

use CodeIgniter\Controller;
use App\Models\Users\InSertUserModel;
use Config\Encryption;

class registration extends Controller
{

    public function index()
    {
        $data['viewchild'] = './registration/content';
        return view('templates/base_view', $data);
    }

    public function InSertUser()
    {
        $something = $this->request->getVar();
        if ($something != NULL) {
            $this->CheckValidate();
            if (!$this->validate([])) {
                $error = $this->validator;
                if ($error->getErrors() == null) {
                    if ($something['password'] == $something['confirmPassword']) {
                        $model = new InSertUserModel();
                        $result = $model->InSertUsers($something);
                        if ($result)
                            echo "User saved Success";
                    } else
                        echo 'The two passwords not match';
                } else {
                    $data['viewchild'] = './registration/content';
                    $data['validation'] = $error;
                    return view('templates/base_view', $data);
                }
            } else {
                echo view('Success');
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
