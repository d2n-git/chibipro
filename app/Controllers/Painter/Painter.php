<?php
namespace App\Controllers\Painter;

use CodeIgniter\Controller;
use App\Models\PictureModel;
use App\Libraries\alert;

class Painter extends Controller
{
	function Index()
	{
		$pager = \Config\Services::pager();
		$page = $this->request->getGet('page') ? $this->request->getGet('page') - 1 : 0;
		$offset = $page * LIMITPICTURE;
		$pictureModel = new PictureModel();
		$pictures = $pictureModel->getAllPicture($offset,'','8,9');
		$data['page'] = $page + 1;
		$data['total'] = count($pictureModel->getAllPictureCount('','8,9'));
		$data['pager'] = $pager;
		$data['pictures'] = $pictures;
		$data['viewchild'] = './painter/content';
		return view('templates/base_view', $data);
    }
}