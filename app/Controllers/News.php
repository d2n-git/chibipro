<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PictureModel;
use App\Libraries\alert;
use App\Models\CommentModel;
use App\Models\Pictures\InSertPictureModel;

class News extends Controller
{
	public function Index()
	{
		$session = \Config\Services::session();
		$page = $this->request->getGet('page') ? $this->request->getGet('page') - 1 : 0;
		$offset = $page * LIMITPICTURE;
		$pictureModel = new PictureModel();
		$pictures = $pictureModel->getAllPicture($offset, '', '8');
		$data['page'] = $page + 1;
		$data['total'] = count($pictureModel->getAllPictureCount());
		// $data['pager'] = $pager;
		$data['pictures'] = $pictures;
		$data['show_flg'] = 'News';
		$data['itype'] = '0';  // ???
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
		if(!in_array($data['Picture']['idStatusPicture'],['8','9'])){
			return redirect() -> to(base_url());
		}
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
		$itype = $this->request->getPost('itype');
		$param = array();
		$modePicture = new InSertPictureModel();
		// $itype = 0 :
		if($itype == '0'){
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
		else if($itype == '1'){ 
			$param['idPictures']=$id;
			$param['Picturesflg'] = '1';
			$modePicture->UpdatePicture($param);
		}
		return redirect() -> to(base_url('/News'));
	}

	public function getCommemt(){
		$id = $this->request->getGet('id');
		$modePicture = new InSertPictureModel();
		$modelComment = new CommentModel();
		$resultComment = $modelComment->getCommemtByIdPicture($id);
		$resultPicture = $modePicture->GetPictureById($id);
		$response = [
			"comments"=>$resultComment,
			"total"=> count($resultComment),
			"picture" => $resultPicture
		];
		echo json_encode($response);
	}

	public function postCommemt(){
		$session = \Config\Services::session();
		$idPicture = $this->request->getPost('idPicture');
		$text = $this->request->getPost('text');
		$param = [
			'idPicture' => $idPicture,
			'idUser' =>  $_SESSION['idUser'],
			'comment' => $text,
		];
		$modelComment = new CommentModel();
		$resultComment = $modelComment->insertComment($param);
		if($resultComment > 0){
			$res = $modelComment->getCommemtById($resultComment);
			$json = ["status" => 200,"message" => "OK", "comment" => $res];
		}else{
			$json = ["status" => 999,"message" => "Fail"];
		}
		echo json_encode($json);
	}



}