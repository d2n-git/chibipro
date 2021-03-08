<?php

namespace App\Controllers\Upload;

use CodeIgniter\Controller;
use App\Models\Users\InSertUserModel;
use App\Libraries\alert;
use App\Libraries\ConfigEmail;
use App\Models\Pictures\InSertPictureModel;
use App\Models\LikeModel\likeModel;
use App\Models\ReCaptcha;
use Config\Encryption;
use Exception;
use App\Models\PictureModel;
use App\Controllers\Home;
use App\Models\Confirm\ConfirmModel;

class UploadFile extends Controller
{
    function index()
    {
         $data['viewchild'] = './templates/detailFile';
         return view('templates/base_view', $data);
    }
    function UpImagine()
    {
        $alert = new alert();
        $target_dir = "assets/img/upload/";
        $target_file = $target_dir . basename($_FILES["images"]["name"]);
        $uploadOk = 1;
        $MesError = '';
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $insertPicture = new InSertPictureModel();
        $result = $insertPicture->GetMaxIdPictures();
        $nameNewPicture =  $result . '_' . basename($_FILES["images"]["name"]);

        $reCaptcha = new ReCaptcha();
        $response = null;
        if ($this->request->getPost('g-recaptcha-response')) {
            $response = $reCaptcha->verifyResponse(
                $this->request->getServer('REMOTE_ADDR'),
                $this->request->getPost('g-recaptcha-response')
            );

            if ($response != null && $response->success) {
                $uploadOk = 1;
            } else {
                $MesError = "Click checkbox robot .";
                $uploadOk = 0;
            }
        }

        // var_dump($_FILES);
        // exit;

        //check file upload
        if($_FILES["images"]["tmp_name"]=="" && $uploadOk == 1){
            $MesError = "Bạn chưa chọn ảnh để Upload.";
            $uploadOk = 0;
        }

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"]) && $uploadOk == 1) {
            $check = getimagesize($_FILES["images"]["tmp_name"]);
            if ($check === false) {
                $MesError = "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($nameNewPicture) && $uploadOk == 1) {
            $MesError = $MesError . "File already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["images"]["size"] > 5000000 && $uploadOk == 1) {
            $MesError = $MesError . "Your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $uploadOk == 1
        ) {
            $MesError = $MesError . "Only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 1) {
            $modelInsertUser = new InSertUserModel();
            try {
                $something = $this->request->getVar();
                $resultUser = $modelInsertUser->GetUser($something['email']);
                if (empty($resultUser)) {
                    helper('text');
                    $passWord = random_string('alnum', 6);
                    $something['firstName'] = '';
                    $something['lastName'] = '';
                    $something['txtEmpPhone'] = '';
                    $something['txtAddress'] = '';
                    $something['password'] = $passWord;
                    $something['Permission'] = 1; // 1: User thường. 2: Painter
                    $something['Gender'] = 1;
                    $resultInsertUser = $modelInsertUser->InSertUsers($something);
                    if ($resultInsertUser) {
                        $sendMail = new ConfigEmail();
                        $sendMail->SendEmail('Password login for Upload Page is below:'.'<br>'.'<br>'.$passWord.'<br>'.'<br>'.'Lest go link : http://chibipro.top/', 'Send Password', $something['email']);
                        $modelPicture['idUser'] = (int)$modelInsertUser->GetMaxIdUser();
                        $modelPicture['idStatusPicture'] = 1;
                        $modelPicture['Name'] = $nameNewPicture;
                        $modelPicture['Title'] = 'Bên nào cũng chất';
                        $modelPicture['NumberLike'] = 0;
                        $modelPicture['DateUp'] = date('Y-m-d h:m:s');
                        $modelPicture['StatusSendEmail'] = 0;
                        $resultInsertPicture = $insertPicture->InSertPicture($modelPicture);
                        if ($resultInsertPicture) {
                            $target_dir = $target_dir.$modelPicture['idUser'].'/';
                            if (!file_exists($target_dir)) {
                                mkdir($target_dir, 0777, true);
                            }
                            if (move_uploaded_file($_FILES['images']['tmp_name'], $target_dir . $nameNewPicture)){
                                $MesError = 'Uploaded Success';
                                $uploadOk = 1;
                            }else{
                                $MesError = 'Uploaded Failed';
                                $uploadOk = 0;
                            }
                            $json = ["message" => $MesError, "status" => $uploadOk,"id" => $resultInsertPicture];
                            $resultGetUser = $modelInsertUser->GetUser($something['email']);
                            $session = \Config\Services::session();
                            $newdata = [
                                'password'  => $resultGetUser['Password'],
                                'email'     => $resultGetUser['Email'],
                                'idUser'    => $resultGetUser['idUser'],
                                'Permission' => $resultGetUser['Permission'],
                                'Gender' => $resultGetUser['Gender'],
                                'logged_in' => TRUE
                            ];
                            $session->set($newdata);
                            echo json_encode($json);
                        } else {
                            $uploadOk = 0;
                            $MesError = 'Uploaded Failed';
                            unlink($target_dir . $nameNewPicture);
                            $json = ["message" => $MesError, "status" => $uploadOk];
                            echo json_encode($json);
                        }
                    } else {
                        $MesError = 'Uploaded Failed';
                        unlink($target_dir . $nameNewPicture);
                        $json = ["message" => $MesError, "status" => $uploadOk];
                        echo json_encode($json);
                    }
                } else {
                    $session = \Config\Services::session();
                    if(isset($_SESSION['logged_in']) && !$_SESSION['logged_in'])
                    {
                        $MesError = 'E-Mail này đã được sử dụng. Bạn phải đăng nhập mới tiếp tục tải ảnh';
                        unlink($target_dir . $nameNewPicture);
                        $json = ["message" => $MesError, "status" => 0];
                        echo json_encode($json);
                        return;
                    }
                    $modelPicture['idUser'] = (int)$resultUser['idUser'];
                    $modelPicture['idStatusPicture'] = 1;
                    $modelPicture['Name'] = $nameNewPicture;
                    $modelPicture['Title'] = 'Bên nào cũng chất';
                    $modelPicture['NumberLike'] = 0;
                    $modelPicture['DateUp'] = date('Y-m-d h:m:s');
                    $modelPicture['StatusSendEmail'] = 0;
                    $resultInsertPicture = $insertPicture->InSertPicture($modelPicture);
                    if ($resultInsertPicture) {
                        $target_dir = $target_dir.$resultUser['idUser'].'/';
                        if (!file_exists($target_dir)) {
                            mkdir($target_dir, 0777, true);
                        }
                        if (move_uploaded_file($_FILES['images']['tmp_name'], $target_dir . $nameNewPicture)){
                            $MesError = 'Uploaded Success';
                            $uploadOk = 1;
                        }else{
                            $MesError = 'Uploaded Failed';
                            $uploadOk = 0;
                        }
                        $json = ["message" => $MesError, "status" => $uploadOk, "id" => $resultInsertPicture];
                        $session = \Config\Services::session();
                        $newdata = [
                            'password'  => $resultUser['Password'],
                            'email'     => $resultUser['Email'],
                            'idUser'    => $resultUser['idUser'],
                            'Permission' => $resultUser['Permission'],
                            'Gender' => $resultUser['Gender'],
                            'logged_in' => TRUE
                        ];
                        $session->set($newdata);
                        echo json_encode($json);
                    } else {
                        $uploadOk = 0;
                        $MesError = 'Uploaded Failed';
                        unlink($target_dir . $nameNewPicture);
                        $json = ["message" => $MesError, "status" => $uploadOk];
                        echo json_encode($json);
                    }
                }
            } catch (Exception $e) {
                $json = ["message" => $MesError, "status" => $uploadOk];
                echo json_encode($json);
            }
        } else {
            $json = ["message" => $MesError, "status" => $uploadOk];
            echo json_encode($json);
        }
    }

    function detail(){
        $session = \Config\Services::session();
        if(!isset($_SESSION['logged_in']))
        {
            return redirect() -> to(base_url('/Users/Login'));
        }
        else if (!$_SESSION['logged_in']) return redirect() -> to(base_url('/Users/Login'));
        $id = $this->request->getGet('id');
        $modePicture = new InSertPictureModel();
        $modelConfirm = new ConfirmModel();
        $data['Picture'] = $modePicture->GetPictureById($id);
        $data['Confirm'] = $modelConfirm->GetConfirmById($id);
        $data['viewchild'] = '/upload/detail';
        return view('templates/base_view', $data);
    }

    function LikeImagine(){
        $session = \Config\Services::session();
        $modePicture = new InSertPictureModel();
        $modeLike = new likeModel();
        $id = $this->request->getBody();
        $dataPicture = $modePicture->GetPictureById($id);
        $idUser = $_SESSION['idUser'];
        $dataLike['idUser'] = $idUser;
        $dataLike['idPicture'] = $dataPicture['idPictures'];
        $resultLike = $modeLike -> GetLikeByUserId($dataLike);
        if($resultLike)
        {
            $value['NumberLike'] = $dataPicture['NumberLike'] - 1;
            $modeLike -> DeleteLike($dataLike);
        }else 
        {
            $value['NumberLike'] = $dataPicture['NumberLike'] + 1;
            $modeLike -> InSertLike($dataLike);
        }
        $value['idPictures'] = $dataPicture['idPictures'];
        $result = $modePicture->UpdatePicture($value);
        if($result)
        {
            $MesError = 'success';
            $json = ["message" => $MesError, "response" => $value];
            echo json_encode($json); 
        }else
        {
            $MesError = 'fail';
            $json = ["message" => $MesError];
            echo json_encode($json); 
        }
    }

    function updatePictures(){
        $param = array();
        $session = \Config\Services::session();
        $idUser = $_SESSION['idUser'];
        if($_FILES["fileToUpload"]["tmp_name"]!=""){
            $target_dir = "assets/img/upload/".$idUser.'/';
            $nameNewPicture =  $this->request->getGet('id'). '_' . basename($_FILES["fileToUpload"]["name"]);
            if (file_exists($nameNewPicture)) {
                $nameNewPicture =  $this->request->getGet('id'). '_' . $nameNewPicture;
            }
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir . $nameNewPicture);
        }
        $itype = $this->request->getPost('itype');
        $id = $this->request->getGet('id');
        if($itype == '1'){ 
            $modePicture = new InSertPictureModel();
            $param['idPictures']=$id;
            $param['Picturesflg'] = '1';
            $modePicture->UpdatePicture($param);
            return redirect() -> to(base_url('/Users/Userpage'));
        }
        else if($itype == '2'){
            $modePicture = new InSertPictureModel();
            $status = $this->request->getPost('status');
            $param['idPictures']=$id;
            $param['idStatusPicture'] = $status;
            $modePicture->UpdatePicture($param);
            $json = ["message" => "Success!"];
            echo json_encode($json); 
        }
        else{
            $param['idPicture']=$this->request->getGet('id');
            $param['standarprice'] = $this->request->getPost('standarprice');
            $param['priceofuser'] = $this->request->getPost('priceofuser') == "" ? 0 : str_replace(",", "", $this->request->getPost('priceofuser'));
            $param['dateExpiry'] = $this->request->getPost('dateExpiry');
            $param['backgroundid'] = $_FILES["fileToUpload"]["tmp_name"] != "" ? $nameNewPicture : $this->request->getPost('ch1');
            $param['message'] = $this->request->getPost('message');
            $modePicture = new PictureModel();
            $result = $modePicture->updatePictures($param);
            $newdata = [
                'numberMyChibi' => count($modePicture->getAllPictureCount($idUser))
            ];
            $session->set($newdata);
            return redirect()->to(base_url('/Users/Userpage'));
        }
    }
}
