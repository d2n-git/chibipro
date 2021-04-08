<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Pictures\InSertPictureModel;
use App\Models\Admin\AdminModel;
use App\Libraries\alert;

class Admin extends Controller
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

		$pager = \Config\Services::pager();
		$page = $this->request->getGet('page') ? $this->request->getGet('page') - 1 : 0;
		$offset = $page * LIMITPICTURE;
		$adminModel = new AdminModel();
		$pictures = $adminModel->getPictureForAdmin($offset, $username, $email);
		$data['page'] = $page + 1;
		$data['total'] = $adminModel->getPictureCountAdmin($username, $email);
		$data['pager'] = $pager;
		$data['pictures'] = $pictures;
		$data['viewchild'] = './admin/listImages';
		$data['username'] = $username;
		$data['email'] = $email;
		return view('templates/base_view', $data);
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
		$modePicture = new InSertPictureModel();
		$data['Picture'] = $modePicture->GetPictureById($id);
		$data['viewchild'] = '/admin/detailImgAdmin';
		return view('templates/base_view', $data);
	}
	
	function ListContact()
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

		$pager = \Config\Services::pager();
		$page = $this->request->getGet('page') ? $this->request->getGet('page') - 1 : 0;
		$offset = $page * LIMITPICTURE;
		$adminModel = new AdminModel();
		$offset = 0;
		$contacts = $adminModel->getListContact($offset, $username, $email);
		$data['page'] = $page + 1;
		$data['total'] = $adminModel->getContactCountAdmin($username, $email);
		$data['pager'] = $pager;
		$data['contacts'] = $contacts;
		$data['username'] = $username;
		$data['email'] = $email;
		$data['viewchild'] = './admin/listContacts';
		return view('templates/base_view', $data);
	}
}