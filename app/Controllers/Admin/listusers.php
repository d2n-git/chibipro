<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Users\InSertUserModel;
use App\Models\Admin\AdminModel;
use App\Libraries\alert;

class Listusers extends Controller
{
	function Index()
	{
		$session = \Config\Services::session();
		if(!isset($_SESSION['logged_in']))
		{
			return redirect() -> to(base_url('/Users/Login'));
		}
		else if (!$_SESSION['logged_in']) return redirect() -> to(base_url('/Users/Login'));
		if(isset($_SESSION['Permission']) && $_SESSION['Permission'] != '0'){
			return redirect() -> to(base_url('/Users/Login'));
		}
		//data search
		if(isset($_POST['username'])){
			$username = htmlspecialchars($_POST['username']);
		}else{
			$username = '';
		}
		if(isset($_POST['email'])){
			$email = htmlspecialchars($_POST['email']);
		}else{
			$email = '';
		}

		$adminModel = new AdminModel();
		$offset = 0;
		$allusers = $adminModel->getUsersAdmin($offset, $username, $email);
		$data['total'] = $adminModel->getUsersCountAdmin($username, $email);
		$data['allusers'] = $allusers;
		$data['viewchild'] = './admin/listUsers';
		$data['username'] = $username;
		$data['email'] = $email;
		return view('templates/base_view', $data);
	}

	public function UpdateStatusUserAdmin(){
		$session = \Config\Services::session();
		if(!isset($_SESSION['logged_in']))
		{
			return redirect() -> to(base_url('/Users/Login'));
		}
		else if (!$_SESSION['logged_in']) return redirect() -> to(base_url('/Users/Login'));
		if(isset($_SESSION['Permission']) && $_SESSION['Permission'] != '0'){
			return redirect() -> to(base_url('/Users/Login'));
		}
		$requestDt = $this->request->getPost();
		if(!empty($requestDt)){
			$adminModel = new AdminModel();
			$result = $adminModel->updateSttImgAdmin($requestDt);
			$json = ["message" => $result ? "Update Status Image Completed." : "error", "status" => $result ? 1 : 0 ];
			echo json_encode($json);
		}
	}

	function detailAdmin()
	{
		$session = \Config\Services::session();
		if(!isset($_SESSION['logged_in']))
		{
			return redirect() -> to(base_url('/Users/Login'));
		}
		else if (!$_SESSION['logged_in']) return redirect() -> to(base_url('/Users/Login'));
		if(isset($_SESSION['Permission']) && $_SESSION['Permission'] != '0'){
			return redirect() -> to(base_url('/Users/Login'));
		}
		$id = $this->request->getGet('id');
		$modeInSertUser = new InSertUserModel();
		$data['user'] = $modeInSertUser->GetUserById($id);
		$data['viewchild'] = '/admin/detailUserAdmin';
		return view('templates/base_view', $data);
	}
}