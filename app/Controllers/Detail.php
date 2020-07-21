<?php namespace App\Controllers;
class Detail extends BaseController{
    public function index(){
        $data['viewchild'] = 'detail/detail';
		return view('templates/base_view',$data);
    }
}
?>
