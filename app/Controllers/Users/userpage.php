<?php
namespace App\Controllers\Users;

use CodeIgniter\Controller;
use App\Models\PictureModel;
use App\Libraries\alert;

class userpage extends Controller
{
    function Index()
    {
        $session = \Config\Services::session();
        if(!isset($_SESSION['idUser']))
        {
            return redirect() -> to(base_url('/Users/Login'));
        }else{
            $idUser = $_SESSION['idUser'];
        }
        $pager = \Config\Services::pager();
        $page = $this->request->getGet('page') ? $this->request->getGet('page') - 1 : 0;
        $offset = $page * LIMITPICTURE;
        $pictureModel = new PictureModel();
        $pictures = $pictureModel->getAllPicture($offset, $idUser, '1,2,3,5,6,7,8');
        $data['page'] = $page + 1;
        $data['total'] = count($pictureModel->getAllPictureCount($idUser));
        $data['pager'] = $pager;
        $data['pictures'] = $pictures;
        $data['viewchild'] = './painter/content';
        $data['usertable'] = './painter/usertable';
        return view('templates/base_view', $data);
    }
}