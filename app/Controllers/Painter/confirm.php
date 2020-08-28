<?php

namespace App\Controllers\Painter;

use CodeIgniter\Controller;
use App\Models\Pictures\InSertPictureModel;

class confirm extends Controller
{
	function Index()
	{
		$id = $this->request->getGet('id');
		$modePicture = new InSertPictureModel();
		$data['Picture'] = $modePicture->GetPictureById($id);
		$data['viewchild'] = './painter/confirm';
		return view('templates/base_view', $data);
	}
}
