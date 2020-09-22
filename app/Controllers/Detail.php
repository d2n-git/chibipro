<?php namespace App\Controllers;
use App\Models\PictureModel;
use App\Models\ReviewModel;
class Detail extends BaseController{
    private $reviewModel,$pictureModel;

    public function __construct()
    {
        $this->reviewModel = new ReviewModel();
        $this->pictureModel = new PictureModel();
    }

    public function index($idPicture){
        $data['viewchild'] = 'detail/detail';
        $data['pictures'] = $this->pictureModel->getPictureById($idPicture);
        $data['reviews'] = $this->reviewModel->getAllReviewByIdPicture($idPicture);
        return view('templates/base_view',$data);
    }

    public function review(){
        $this->request->getPost();
        if($this->request->getPost('idPicture')){
            $result = $this->reviewModel->InsertReview($this->request->getPost());
            $json = ["message" => $result ? "Thank you!" : "error", "status" => $result ? 1 : 0 ];
            echo json_encode($json);
        }
    }
}
?>
