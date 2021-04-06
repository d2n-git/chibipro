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
        $something = $this->request->getPost();
        if($something['username'] != '' && $something['phone'] != '' && $something['email'] != '' && $something['message'] != '' ){
            $contact = new ContactModel();
            $result = $contact->InsertContact($something);
            $json = ["message" => $result ? "Thank you!" : "error", "status" => $result ? 1 : 0 ];
            echo json_encode($json);
        }
        
    }
}
?>