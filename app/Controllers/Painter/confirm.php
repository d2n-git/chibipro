<?php

namespace App\Controllers\Painter;

use CodeIgniter\Controller;
use App\Models\Pictures\InSertPictureModel;
use App\Models\Confirm\ConfirmModel;

class confirm extends Controller
{
	function Index()
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
		$data['viewchild'] = './painter/confirm';
		return view('templates/base_view', $data);
	}
	function confirmPainter()
	{
		$something = $this->request->getVar();
		$session = \Config\Services::session();
		$idUser = $_SESSION['idUser'];
		$insertConfirm = new ConfirmModel();
		$modelConfirm['idPicture'] = (int)$something['id'];
		$modelConfirm['Price'] = (int)$something['price'];
		$modelConfirm['DateExpiry'] = $something['dateExpiry'];
		$modelConfirm['DateApprove'] = date('Y-m-d h:m:s');
		$modelConfirm['idPainter'] = $idUser;
		$modelConfirm['Note'] = $something['note'];
		$resultInsertPicture = $insertConfirm->InSertConfirm($modelConfirm);
		if ($resultInsertPicture)
		{
			return redirect()->to(base_url("/Painter/Painter"));
		}
	}
}
