<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PictureModel;
use App\Libraries\alert;

class News extends Controller
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
		$pictures = $pictureModel->getAllPicture($offset, '', '8');
		$data['page'] = $page + 1;
		$data['total'] = count($pictureModel->getAllPictureCount());
		$data['pager'] = $pager;
		$data['pictures'] = $pictures;
		$data['show_flg'] = 'News';
		$data['viewchild'] = './user/content';
		return view('templates/base_view', $data);
	}
}