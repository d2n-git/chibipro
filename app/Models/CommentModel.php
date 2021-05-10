<?php namespace App\Models;
use CodeIgniter\Model;
class CommentModel extends Model{

    protected $table      = 'comment';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    public function getCommemtByIdPicture($idPictures)
    {
        $db = \Config\Database::connect();
        $sql="SELECT cm.id, cm.idPicture, REPLACE(us.Name, '*-*-', ' ') as Name, cm.comment, cm.created FROM comment as cm join pictures as pt on cm.idPicture = pt.idPictures join users as us on cm.idUser = us.idUser WHERE cm.idPicture = ? order by cm.created desc";
        $results = $db->query($sql,[$idPictures])->getResultArray();
        $db->close();
        return $results; 
    }

    public function insertComment($param){
        $arrInsert = [
            'idPicture' => $param['idPicture'],
            'idUser' => $param['idUser'],
            'comment' => $param['comment'],
            'created' => date("Y-m-d H:i:s"),
        ];
        $db = \Config\Database::connect();
        $results = $db->table('comment')->insert($arrInsert)->connID->insert_id;
        $db->close();
        return $results;
    }

    public function getCommemtById($id)
    {
        $db = \Config\Database::connect();
        $sql="SELECT cm.id, cm.idPicture, REPLACE(us.Name, '*-*-', ' ') as Name, cm.comment, cm.created FROM comment as cm join users as us on cm.idUser = us.idUser WHERE cm.id = ?";
        $results = $db->query($sql,[$id])->getRowArray();
        $db->close();
        return $results; 
    }
}
?>