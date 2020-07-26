<?php namespace App\Models;
use CodeIgniter\Model;

    class PictureModel extends Model{
        
        protected $table      = 'pictures';
        protected $primaryKey = 'idPicture';

        protected $returnType     = 'array';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;

        public function getAllPicture($offset){
            $db = \Config\Database::connect();
            $sql="SELECT pictures.idPicture, pictures.Name,pictures.NumberLike, users.Name AS userName FROM pictures INNER JOIN users ON pictures.idUser = users.idUsers ORDER BY NumberLike LIMIT " . LIMITPICTURE . " OFFSET " .$offset;
            $result =  $db->query($sql)->getResultArray();
            $db->close();
            return $result;
        }

        public function getAllPictureCount(){
            $db = \Config\Database::connect();
            $sql='SELECT * FROM pictures INNER JOIN users ON pictures.idUser = users.idUsers ORDER BY NumberLike';
            $result =  $db->query($sql)->getResultArray();
            $db->close();
            return $result;
        }
    }
?>