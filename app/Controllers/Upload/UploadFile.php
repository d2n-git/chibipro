<?php
namespace App\Controllers\Upload;

use CodeIgniter\Controller;
use App\Models\Users\InSertUserModel;
use App\Libraries\alert;
use App\Models\Pictures\InSertPictureModel;

class UploadFile extends Controller
{
    function index()
    {
        // $data['viewchild'] = './templates/TestUp';
        // return view('templates/base_view', $data);  
    }
    function UpImagine()
    {
        $alert = new alert();
        $target_dir = "assets/img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $MesError = '';
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check === false) {
                $MesError = "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $MesError = $MesError . "File already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
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
            $insertPicture=new InSertPictureModel();
            $result = $insertPicture->GetMaxIdPictures();
            $nameNewPicture =  $result . '_' . basename($_FILES["fileToUpload"]["name"]);
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir .$nameNewPicture)) {
                
                $something = $this->request->getVar();
                $resultUser = $modelInsertUser->GetUser($something['email']);
                if (empty($resultUser)) 
                {
                    helper('text');
                    $passWord=random_string('alnum', 16);
                    $something['firstName'] = '';
                    $something['lastName'] = '';
                    $something['txtEmpPhone'] = '';
                    $something['txtAddress'] = '';
                    $something['password']=$passWord;
                    $something['Permission'] = 2;
                    $resultInsertUser=$modelInsertUser->InSertUsers($something);
                    if($resultInsertUser)
                    {
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $modelPicture['idUser'] = (int)$modelInsertUser->GetMaxIdUser();
                        $modelPicture['idStatusPicture'] = 1;
                        $modelPicture['Name'] = $nameNewPicture;
                        $modelPicture['NumberLike'] = 0;
                        $modelPicture['DateUp'] = date('Y-m-d h:m:s');
                        $modelPicture['StatusSendEmail'] = 0;
                        $resultInsertPicture=$insertPicture->InSertPicture($modelPicture);
                    }
                    
                }
                else
                {
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $modelPicture['idUser'] = (int)$resultUser['idUser'];
                    $modelPicture['idStatusPicture'] = 1;
                    $modelPicture['Name'] = $nameNewPicture;
                    $modelPicture['NumberLike'] = 0;
                    $modelPicture['DateUp'] = date('Y-m-d h:m:s');
                    $modelPicture['StatusSendEmail'] = 0;
                    $resultInsertPicture=$insertPicture->InSertPicture($modelPicture); 
                }
            }
        }else{
            $alert->alert($MesError);
        }
    }
}
