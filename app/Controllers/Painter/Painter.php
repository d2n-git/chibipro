<?php
namespace App\Controllers\Painter;

use CodeIgniter\Controller;
use App\Models\PictureModel;
use App\Libraries\alert;

class Painter extends Controller
{
    function Index()
    {
        $pager = \Config\Services::pager();
		$page = $this->request->getGet('page') ? $this->request->getGet('page') - 1 : 0;
		$offset = $page * LIMITPICTURE;
		$pictureModel = new PictureModel();
		$pictures = $pictureModel->getAllPicture($offset);
		$data['page'] = $page + 1;
		$data['total'] = count($pictureModel->getAllPictureCount());
		$data['pager'] = $pager;
		$data['pictures'] = $pictures;
		$data['viewchild'] = './painter/content';
		$session = \Config\Services::session();
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) return view('templates/base_view', $data);
		else 
		{
			$aler = new alert();
			$aler->alert('Please login user!');
			return redirect()->to('/Users/Login');
		}
    }
}