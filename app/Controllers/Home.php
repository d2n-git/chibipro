<?php namespace App\Controllers;
use App\Models\ReCaptcha;
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
		$pictures = $pictureModel->orderBy('NumberLike', 'desc')->findAll(LIMITPICTURE,$offset);
		$data['page'] = $page + 1;
		$data['total'] = count($pictureModel->orderBy('NumberLike', 'desc')->findAll());
		$data['pager'] = $pager;
		$data['viewchild'] = 'templates/home';
		$data['pictures'] = $pictures;
		return view('templates/base_view',$data);
	}

	public function Upload()
	{
		$reCaptcha = new ReCaptcha();
		$response = null;
		if ($this->request->getPost('g-recaptcha-response')) {
			$response = $reCaptcha->verifyResponse(
				$this->request->getServer('REMOTE_ADDR'),
				$this->request->getPost('g-recaptcha-response')
			);

			if ($response != null && $response->success) {
				echo 'handle a successful';
			} else {
				echo $response->error;
			}
		}
	}

	//--------------------------------------------------------------------

}
