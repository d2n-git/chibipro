<?php

namespace App\Controllers\Upload;

use CodeIgniter\Controller;
use App\Models\Users\InSertUserModel;
use App\Libraries\alert;
use App\Libraries\ConfigEmail;
use App\Models\Pictures\InSertPictureModel;
use App\Models\LikeModel\likeModel;
use App\Models\ReCaptcha;
use Exception;
use App\Models\PictureModel;
use App\Controllers\Home;

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
        $target_dir = "assets/img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $MesError = '';
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $insertPicture = new InSertPictureModel();
        $result = $insertPicture->GetMaxIdPictures();
        $nameNewPicture =  $result . '_' . basename($_FILES["fileToUpload"]["name"]);

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

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check === false) {
                $MesError = "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($nameNewPicture)) {
            $MesError = $MesError . "File already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            $MesError = $MesError . "Your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $MesError = $MesError . "Only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 1) {
            $modelInsertUser = new InSertUserModel();
            try {
                if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir . $nameNewPicture)) {
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
                        $something['Permission'] = 2;
                        $resultInsertUser = $modelInsertUser->InSertUsers($something);
                        if ($resultInsertUser) {
                            $sendMail = new ConfigEmail();
                            $sendMail->SendEmail('Password login for Upload Page is below:'.'<br>'.'<br>'.$passWord.'<br>'.'<br>'.'Lest go link : http://chibipro.top/', 'Send Password', $something['email']);
                            $modelPicture['idUser'] = (int)$modelInsertUser->GetMaxIdUser();
                            $modelPicture['idStatusPicture'] = 1;
                            $modelPicture['Name'] = $nameNewPicture;
                            $modelPicture['NumberLike'] = 0;
                            $modelPicture['DateUp'] = date('Y-m-d h:m:s');
                            $modelPicture['StatusSendEmail'] = 0;
                            $resultInsertPicture = $insertPicture->InSertPicture($modelPicture);
                            if ($resultInsertPicture) {
                                $MesError = 'uploaded success';
                                $json = ["message" => $MesError, "status" => $uploadOk,"id" => $resultInsertPicture];
                                echo json_encode($json);
                            } else {
                                $uploadOk = 0;
                                $MesError = 'uploaded Failed';
                                unlink($target_dir . $nameNewPicture);
                                $json = ["message" => $MesError, "status" => $uploadOk];
                                echo json_encode($json);
                            }
                        } else {
                            $MesError = 'uploaded Failed';
                            unlink($target_dir . $nameNewPicture);
                            $json = ["message" => $MesError, "status" => $uploadOk];
                            echo json_encode($json);
                        }
                    } else {
                        $modelPicture['idUser'] = (int)$resultUser['idUser'];
                        $modelPicture['idStatusPicture'] = 1;
                        $modelPicture['Name'] = $nameNewPicture;
                        $modelPicture['NumberLike'] = 0;
                        $modelPicture['DateUp'] = date('Y-m-d h:m:s');
                        $modelPicture['StatusSendEmail'] = 0;
                        $resultInsertPicture = $insertPicture->InSertPicture($modelPicture);
                        if ($resultInsertPicture) {
                            $MesError = 'uploaded success';
                            $json = ["message" => $MesError, "status" => $uploadOk,"id" => $resultInsertPicture];
                            echo json_encode($json);
                        } else {
                            $uploadOk = 0;
                            $MesError = 'uploaded Failed';
                            unlink($target_dir . $nameNewPicture);
                            $json = ["message" => $MesError, "status" => $uploadOk];
                            echo json_encode($json);
                        }
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
        $id = $this->request->getGet('id');
        $modePicture = new InSertPictureModel();
        $data['Picture'] = $modePicture->GetPictureById($id);
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
        if($_FILES["fileToUpload"]["tmp_name"]!=""){
            $target_dir = "assets/img/";
            $nameNewPicture =  $this->request->getGet('id'). '_' . basename($_FILES["fileToUpload"]["name"]);
            if (file_exists($nameNewPicture)) {
                $nameNewPicture =  $this->request->getGet('id'). '_' . $nameNewPicture;
            }
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir . $nameNewPicture);
        }
        $param['idPicture']=$this->request->getGet('id');
        $param['standarprice'] = $this->request->getPost('standarprice');
        $param['priceofuser'] = $this->request->getPost('priceofuser') == "" ? 0 : $this->request->getPost('priceofuser');
        $param['dateExpiry'] = $this->request->getPost('dateExpiry');
        $param['backgroundid'] = $_FILES["fileToUpload"]["tmp_name"] != "" ? $nameNewPicture : $this->request->getPost('ch1');
        $param['message'] = $this->request->getPost('message');
        $modePicture = new PictureModel();
        $result = $modePicture->updatePictures($param);
        return redirect()->to(base_url());
    }
}
