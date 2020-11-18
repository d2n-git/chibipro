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

		$pager = \Config\Services::pager();
		$page = $this->request->getGet('page') ? $this->request->getGet('page') - 1 : 0;
		$offset = $page * LIMITPICTURE;
		$adminModel = new AdminModel();
		$pictures = $adminModel->getPictureForAdmin($offset);
		$data['page'] = $page + 1;
		$data['total'] = count($adminModel->getAllPictureCountAdmin());
		$data['pager'] = $pager;
		$data['pictures'] = $pictures;
		$data['viewchild'] = './admin/listImages';
		return view('templates/base_view', $data);
	}

	public function UpdateStatusPicturesAdmin(){
		$session = \Config\Services::session();
		if(!isset($_SESSION['logged_in']))
		{
			return redirect() -> to(base_url('/Users/Login'));
		}
		else if (!$_SESSION['logged_in']) return redirect() -> to(base_url('/Users/Login'));

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

		$id = $this->request->getGet('id');
		$modePicture = new InSertPictureModel();
		$data['Picture'] = $modePicture->GetPictureById($id);
		$data['viewchild'] = '/admin/detailImgAdmin';
		return view('templates/base_view', $data);
	}
}