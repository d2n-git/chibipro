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
		return view('templates/base_view',$data);
	}
	//--------------------------------------------------------------------

}
