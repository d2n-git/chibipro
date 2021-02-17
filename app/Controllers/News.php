<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PictureModel;
use App\Libraries\alert;
use App\Models\Pictures\InSertPictureModel;

class News extends Controller
{
	public function Index()
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
		// $data['pager'] = $pager;
		$data['pictures'] = $pictures;
		$data['show_flg'] = 'News';
		$data['type'] = '0';
		$data['viewchild'] = './user/content';
		return view('templates/base_view', $data);
	}

	public function setting()
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
		$data['viewchild'] = '/new/setting';
		return view('templates/base_view', $data);
	}

	public function updateImage(){
		$session = \Config\Services::session();
		if(!isset($_SESSION['logged_in']))
		{
			return redirect() -> to(base_url('/Users/Login'));
		}
		else if (!$_SESSION['logged_in']) return redirect() -> to(base_url('/Users/Login'));
		$id = $this->request->getGet('id');
		$type = $this->request->getPost('type');
		$param = array();
		$modePicture = new InSertPictureModel();
		if($type == '0'){
			$param['idPictures']=$id;
			$param['Title'] = $this->request->getPost('title');
			$param['Note'] = $this->request->getPost('message');
			if($this->request->getPost('mode') == '0'){
				$param['idStatusPicture'] = '8';
			}else{
				$param['idStatusPicture'] = '9';
			}
			$modePicture->UpdatePicture($param);
		}
		else if($type == '1'){ 
			$param['idPictures']=$id;
			$param['Picturesflg'] = '1';
			$modePicture->UpdatePicture($param);
		}
		return redirect() -> to(base_url('/News'));
	}


}