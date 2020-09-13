<?php namespace App\Models;
use CodeIgniter\Model;

class ReviewModel extends Model{
    
    protected $table      = 'review';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function InsertReview($data){
        $dataInsert=
        [
            'idPicture'=>$data['idPicture'],
            'fullname'=>$data['name'],
            'email'=>$data['email'],
            'phone'=>$data['number'],
            'content'=>htmlspecialchars($data['review']),
            'rate'=>$data['rate'],

        ];
        $db = \Config\Database::connect(); 
        $results = $db->table('review')->insert($dataInsert)->connID->affected_rows;
        $db->close();
        return $results > 0;
    }

    public function getAllReviewByIdPicture($idPicture){
        $db = \Config\Database::connect();
        $sql="SELECT id, idPicture, fullname, email, phone, content, rate FROM review WHERE idPicture = " . $idPicture;
        $result =  $db->query($sql)->getResultArray();
        $db->close();
        return $result;
    }
}
