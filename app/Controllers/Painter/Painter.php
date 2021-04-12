<?php
namespace App\Controllers\Painter;

use CodeIgniter\Controller;
use App\Models\PictureModel;
use App\Models\Confirm\ConfirmModel;
use App\Models\Pictures\InSertPictureModel;
use App\Libraries\alert;

class Painter extends Controller
{
	function Index()
	{
		$session = \Config\Services::session();
		if(!isset($_SESSION['idUser']) || $_SESSION['idUser'] == '')
		{
			return redirect() -> to(base_url('/Users/Login'));
		}else{
			$idUser = $_SESSION['idUser'];
		}
		$page = $this->request->getGet('page') ? $this->request->getGet('page') - 1 : 0;
		$offset = $page * LIMITPICTURE;
		$pictureModel = new PictureModel();
		$pictures = $pictureModel->getAllPicture($offset, '', '2,3,4,5');

		//Get thông tin báo giá của Painter theo từng Picture
		$getConfirm = new ConfirmModel();
		foreach ($pictures as $key => $pic) {
			$data_get = $getConfirm->GetConfirm($pic['idPictures'], $idUser);
			$pictures[$key]['Confirm_info'] = $data_get;
			if($pic['idPainter'] == $idUser){
				$pictures[$key]['MyPaint'] = TRUE;
			}else{
				$pictures[$key]['MyPaint'] = FALSE;
			}
		}

		$data['page'] = $page + 1;
		$data['total'] = count($pictureModel->getAllPictureCount());
		$data['pager'] = $pager;
		$data['pictures'] = $pictures;
		$data['viewchild'] = './painter/content';
		return view('templates/base_view', $data);
	}
	function Chibi()
	{
		$session = \Config\Services::session();
		if(!isset($_SESSION['logged_in']))
		{
			return redirect() -> to(base_url('/Users/Login'));
		}
		else if (!$_SESSION['logged_in'] || $_SESSION['Permission'] =='1') return redirect() -> to(base_url(''));
		$id = $this->request->getGet('id');
		$idPainter = $_SESSION['idUser'];
		$modePicture = new InSertPictureModel();
		$data['Picture'] = $modePicture->GetConfirmPainter($id, $idPainter);
		if(in_array($data['Picture']['idStatusPicture'],['1','5','7','8','9','10'])){
			return redirect() -> to(base_url(''));
		}
		$data['viewchild'] = './painter/upchibi';
		return view('templates/base_view', $data);
	}

	function uploadChibi()
	{
		$session = \Config\Services::session();
		if(!isset($_SESSION['logged_in']))
		{
			return redirect() -> to(base_url('/Users/Login'));
		}
		else if (!$_SESSION['logged_in'] || $_SESSION['Permission'] =='1') return redirect() -> to(base_url(''));
		$alert = new alert();
		$target_dir = "assets/img/upload/";
		$target_file = $target_dir . basename($_FILES["images"]["name"]);
		$uploadOk = 1;
		$MesError = '';
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		$something = $this->request->getVar();
		$idPainter = $_SESSION['idUser'];
		$chibiFileName =  $idPainter . '_cbi_' . basename($_FILES["images"]["name"]);
		// var_dump($_FILES);
		// exit;

		//check file upload
		if($_FILES["images"]["tmp_name"]=="" && $uploadOk == 1 && $something['itype'] == "end"){
			$MesError = "Bạn chưa chọn ảnh để Upload.";
			$uploadOk = 0;
		}

		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"]) && $uploadOk == 1 && $_FILES["images"]["tmp_name"]!="") {
			$check = getimagesize($_FILES["images"]["tmp_name"]);
			if ($check === false) {
				$MesError = "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($chibiFileName) && $uploadOk == 1 && $_FILES["images"]["tmp_name"]!="") {
			$MesError = $MesError . "File already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["images"]["size"] > 5000000 && $uploadOk == 1 && $_FILES["images"]["tmp_name"]!="") {
			$MesError = $MesError . "File Upload có dung lượng vượt quá 5Mb.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $uploadOk == 1 && $_FILES["images"]["tmp_name"]!="") {
			$MesError = $MesError . "Only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 1) {
			try {
				// Save file
				if($_FILES["images"]["tmp_name"]!=""){
					$target_dir = $target_dir.$something['idUser'].'/';
					if (!file_exists($target_dir)) {
						mkdir($target_dir, 0777, true);
					}
					if (move_uploaded_file($_FILES['images']['tmp_name'], $target_dir . $chibiFileName)){
						$MesError = 'Uploaded Success';
						$uploadOk = 1;
					}else{
						$MesError = 'Uploaded Failed';
						$uploadOk = 0;
					}
					$modelPicture['chibiFileName'] = $chibiFileName;
				}
				//Update data pictures
				$insertPicture = new InSertPictureModel();
				$modelPicture['idPictures'] = $something['idPictures'];
				if($something['itype'] == 'end'){
					$modelPicture['idStatusPicture'] = 7; //Admin Reject
				}
				$modelPicture['ExtraDetail'] = $something['note_painter'];
				$resultInsertPicture = $insertPicture->UpdatePicture($modelPicture);
				$json = ["message" => 'Uploaded Success', "status" => $uploadOk];
				echo json_encode($json);
			} catch (Exception $e) {
				$json = ["message" => $MesError, "status" => $uploadOk];
				echo json_encode($json);
			}
		} else {
			$json = ["message" => $MesError, "status" => $uploadOk];
			echo json_encode($json);
		}
	}
}