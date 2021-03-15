<?php
namespace App\Controllers\Painter;

use CodeIgniter\Controller;
use App\Models\PictureModel;
use App\Models\Confirm\ConfirmModel;
use App\Libraries\alert;

class Painter extends Controller
{
	function Index()
	{
		$session = \Config\Services::session();
		if(!isset($_SESSION['idUser']))
		{
			return redirect() -> to(base_url('/Users/Login'));
		}else{
			$idUser = $_SESSION['idUser'];
		}
		$page = $this->request->getGet('page') ? $this->request->getGet('page') - 1 : 0;
		$offset = $page * LIMITPICTURE;
		$pictureModel = new PictureModel();
		$pictures = $pictureModel->getAllPicture($offset, '', '1,2,3,4');

		//Get thông tin báo giá của Painter theo từng Picture
		$getConfirm = new ConfirmModel();
		foreach ($pictures as $key => $pic) {
			$data_get = $getConfirm->GetConfirm($pic['idPictures'], $idUser);
			$pictures[$key]['Confirm_info'] = $data_get;
		}

		$data['page'] = $page + 1;
		$data['total'] = count($pictureModel->getAllPictureCount());
		$data['pager'] = $pager;
		$data['pictures'] = $pictures;
		$data['viewchild'] = './painter/content';
		return view('templates/base_view', $data);
	}
}