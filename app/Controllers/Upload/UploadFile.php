<?php

namespace App\Controllers\Upload;

use CodeIgniter\Controller;
use App\Models\Users\InSertUserModel;
use App\Libraries\alert;

class UploadFile extends Controller
{
    // function index()
    // {
    //     $data['viewchild'] = './templates/TestUp';
    //     return view('templates/base_view', $data);  
    // }
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
            $modelInsert = new InSertUserModel();
            $result = $modelInsert->GetMaxIdUser();
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir . $result . '_' . basename($_FILES["fileToUpload"]["name"]))) {
                $something = $this->request->getVar();
                $resultUser = $modelInsert->GetUser($something['email']);
                if (empty($resultUser)) {
                    $modelInsert->InSertUsers($something);
                }
            }
        }else{
            $alert->alert($MesError);
        }
    }
}
