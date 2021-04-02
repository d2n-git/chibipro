<?php
namespace App\Controllers\Users;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\PictureModel;
use App\Libraries\alert;

class Userpage extends BaseController
{
    public function __construct()
    {
        
    }
    public function index()
    {
        $session = \Config\Services::session();
        if(!isset($_SESSION['idUser']) || $_SESSION['idUser'] == '')
        {
            return redirect() -> to(base_url('/Users/Login'));
        }else{
            $idUser = $_SESSION['idUser'];
        }
        $pager = \Config\Services::pager();
        $page = $this->request->getGet('page') ? $this->request->getGet('page') - 1 : 0;
        $offset = $page * LIMITPICTURE;
        $pictureModel = new PictureModel();
        $pictures = $pictureModel->getAllPicture($offset, $idUser, '1,2,3,5,6,7,8,9');
        $data['page'] = $page + 1;
        $data['total'] = count($pictureModel->getAllPictureCount($idUser));
        $data['pager'] = $pager;
        $data['pictures'] = $pictures;
        $data['show_flg'] = 'MyChibi';
        if(count($pictures) == 0){
            $data['viewchild'] = './user/no_content';
        }else{
            $data['viewchild'] = './user/content';
        }
        $data['usertable'] = './user/usertable';
        $data['itype'] = '1';
        return view('templates/base_view', $data);
    }
}