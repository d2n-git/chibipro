<?php

namespace App\Controllers\Painter;

use CodeIgniter\Controller;
use App\Models\Pictures\InSertPictureModel;
use App\Models\Confirm\ConfirmModel;

class Confirm extends Controller
{
	function Index()
	{
		$session = \Config\Services::session();
		if(!isset($_SESSION['logged_in']))
		{
			return redirect() -> to(base_url('/Users/Login'));
		}
		else if (!$_SESSION['logged_in'] || $_SESSION['Permission'] == '1') return redirect() -> to(base_url(''));
		$id = $this->request->getGet('id');
		$idPainter = $_SESSION['idUser'];
		$modePicture = new InSertPictureModel();
		$data['Picture'] = $modePicture->GetConfirmPainter($id, $idPainter);
		if(in_array($data['Picture']['idStatusPicture'],['1','4','7','8','9','10'])){
			return redirect() -> to(base_url(''));
		}
		$data['viewchild'] = './painter/confirm';
		return view('templates/base_view', $data);
	}
	function confirmPainter()
	{
		$something = $this->request->getVar();
		$session = \Config\Services::session();
		$idUser = $_SESSION['idUser'];
		if(in_array($something['picStatus'],['1','4','7','8','9','10'])){
			return redirect() -> to(base_url(''));
		}
		$insertConfirm = new ConfirmModel();
		$modelConfirm['idPicture'] = (int)$something['id'];
		$modelConfirm['Price'] = (int)$something['price'];
		$modelConfirm['DateExpiry'] = $something['dateExpiryPainter'];
		$modelConfirm['DateApprove'] = date('Y-m-d h:m:s');
		$modelConfirm['idPainter'] = $idUser;
		$modelConfirm['Note'] = $something['note_painter'];
		//Check exist
		$chk_exist = $insertConfirm->GetConfirm($modelConfirm['idPicture'], $idUser);
		if(count($chk_exist) == 0){
			$resultInsertPicture = $insertConfirm->InSertConfirm($modelConfirm);
		} else {
			$resultInsertPicture = $insertConfirm->UpdateConfirm($modelConfirm);
		}
		if ($resultInsertPicture && $something['picStatus'] != '5'){
			//Update status for Picture
			$param = array();
			$modePicture = new InSertPictureModel();
			$param['idPictures'] = (int)$something['id'];
			$param['idStatusPicture'] = '3';
			$modePicture->UpdatePicture($param);
		}
		return redirect()->to(base_url("/Painter/Painter"));
	}
}
