<?php namespace App\Controllers;
//use APP\Libraries\ReCaptcha;
use App\Models\ReCaptcha;

class Home extends BaseController
{
	public function __construct() {
	}
	public function index()
	{
		$data['viewchild'] = 'templates/home';
		return view('templates/base_view',$data);
	}

	public function Upload()
	{
		//$this->ReCaptcha->
		$reCaptcha = new ReCaptcha();
		$response = null;
		if ($_POST['g-recaptcha-response']) {
			$response = $reCaptcha->verifyResponse(
				$_SERVER['REMOTE_ADDR'],
				$_POST['g-recaptcha-response']
			);

			if ($response != null && $response->success) {
				echo 'handle a successful';
			} else {
				echo $response->error;
			}
		}
	}

	//--------------------------------------------------------------------

}
