<?php
namespace App\Controllers;

use App\Models\Users\CheckUser;
use App\Models\Users\InSertUserModel;

class User extends BaseController{
    private $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function profile(){
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in'])
        {
            $this->session->destroy();
            return redirect()->to(base_url());
        }
        $user = new CheckUser();
        $data['viewchild'] = 'user/profile';
        $data['user'] = $user->getUserByEmail($_SESSION['email']);
		return view('templates/base_view',$data);
    }

    public function updateProfile(){
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in'])
        {
            $this->session->destroy();
            return redirect()->to(base_url());
        }
        if($this->request->getPost('name')){
            $user = new InSertUserModel();
            $result = $user->updateUser($this->request->getPost());
            $json = ["message" => $result ? "Success!" : "Fail", "status" => $result ? 1 : 0 ];
            echo json_encode($json);
        }
    }
}

?>