<?php namespace App\Controllers;
use App\Models\PictureModel;

class Home extends BaseController
{
	public function __construct() {
	}
	public function index()
	{
		$pager = \Config\Services::pager();
		$page = $this->request->getGet('page') ? $this->request->getGet('page') - 1 : 0;
		$offset = $page * LIMITPICTURE;
		$pictureModel = new PictureModel();
		$pictures = $pictureModel->getAllPicture($offset);
		$data['page'] = $page + 1;
		$data['total'] = count($pictureModel->getAllPictureCount());
		$data['pager'] = $pager;
		$data['viewchild'] = 'templates/home';
		$data['pictures'] = $pictures;
		$session = \Config\Services::session();
		if (!isset($_SESSION['logged_in'])) {
			$newdata = [
				'password'  => '',
				'email'     => '',
				'idUser'    => '',
				'Permission' => '',
				'Gender' => '',
				'logged_in' => FALSE
			];
			$session->set($newdata);
		}
		return view('templates/base_view',$data);
	}

	public function likeImage(){
		$pictureModel = new PictureModel();
		$id = $this->request->getPost('idPicture');
		$result = $pictureModel->updateNumberLike($id);
		$json = ["message" => $result ? "Thank you!" : "error"];
		echo json_encode($json);
	}

}
