<?php namespace App\Controllers;

use App\Models\ContactModel;

class Contact extends BaseController{
    public function __construct()
    {
        
    }
    
    public function index(){
        $data['viewchild'] = 'contact/contact';
		return view('templates/base_view',$data);
    }

    public function submitContact(){
        if($this->request->getPost('name')){
            $contact = new ContactModel();
            $result = $contact->InsertContact($this->request->getPost());
            $json = ["message" => $result ? "Thank you!" : "error", "status" => $result ? 1 : 0 ];
            echo json_encode($json);
        }
        
    }
}
?>