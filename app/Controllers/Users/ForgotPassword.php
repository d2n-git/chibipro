<?php 
namespace App\Controllers\Users;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\Users\CheckUser;
use App\Models\Users\InSertUserModel;
use App\Libraries\alert;
use App\Libraries\ConfigEmail;

class ForgotPassword extends BaseController
{
    function index()
    {
        $data['viewchild'] = './login/forgotPassword';
       return view('templates/base_view', $data);
    }
    function resetPassword()
    {
        $alert = new alert();
        $model = new InSertUserModel();
        $something = $this->request->getBody();
        $result = $model->GetUser($something);
        if(isset($result)){
            helper('text');
            $Password = random_string('alnum', 6);
            $name = explode('*-*-',$result['Name']);
            $result['firstName'] = $name[0];
            $result['lastName'] = $name[1];
            $result['Permission'] = $result['Permission'];
            $result['Gender'] = $result['Gender'];
            $result['email'] = $result['Email'];
            $result['txtEmpPhone'] = $result['Phone'];
            $result['txtAddress'] = $result['Address'];
            $result['password'] = $Password;
            $resultUpdate = $model->UpdateUsers($result);
            if ($resultUpdate) {
                $sendMail = new ConfigEmail();
                $sendMail->SendEmail('Password login for Upload Page is below:' . '<br>' . '<br>' . $Password . '<br>' . '<br>' . 'Lest go link : http://chibipro.top/', 'Send Password', $result['email']);
                $json = ["message" => "Reset successfully password", "status" => true];
                echo json_encode($json);
            } else {
                $json = ["message" => "Reset failed password", "status" => false];
                echo json_encode($json);
            }
        } else {

            $json = ["message" => "Email does not exist", "status" => false];
            echo json_encode($json);
        }
    }
}
