<?php namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model{
    public function __construct()
    {
        
    }
    protected $table      = 'contact';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    public function InsertContact($data){
        $dataInsert=
        [
            'name'=>$data['name'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
            'message'=>htmlspecialchars($data['message']),
            'problem'=>$data['problem'],

        ];
        $db = \Config\Database::connect(); 
        $results = $db->table('contact')->insert($dataInsert)->connID->affected_rows;
        $db->close();
        return $results > 0;
    }

}

?>