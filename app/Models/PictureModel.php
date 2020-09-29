<?php namespace App\Models;
use CodeIgniter\Model;

    class PictureModel extends Model{
        
        protected $table      = 'pictures';
        protected $primaryKey = 'idPictures';

        protected $returnType     = 'array';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;

        public function getAllPicture($offset){
            $db = \Config\Database::connect();
            $sql="SELECT pictures.idPictures, pictures.Name, pictures.Title, date_format(pictures.DateUp,'%d-%m-%Y') as DateUp, pictures.NumberLike, users.Name AS userName FROM pictures INNER JOIN users ON pictures.idUser = users.idUser ORDER BY NumberLike DESC LIMIT " . LIMITPICTURE . " OFFSET " .$offset;
            $result =  $db->query($sql)->getResultArray();
            $db->close();
            return $result;
        }

        public function getPictureById($id){
            $db = \Config\Database::connect();
            $sql="SELECT pictures.idPictures, pictures.Name, users.Name AS userName, pictures.MaxPrice, pictures.Title FROM pictures INNER JOIN users ON pictures.idUser = users.idUser WHERE pictures.idPictures = " . $id;
            $result =  $db->query($sql)->getFirstRow();
            $db->close();
            return $result;
        }

        public function getAllPictureCount(){
            $db = \Config\Database::connect();
            $sql='SELECT * FROM pictures INNER JOIN users ON pictures.idUser = users.idUser ORDER BY NumberLike';
            $result =  $db->query($sql)->getResultArray();
            $db->close();
            return $result;
        }

        public function updateNumberLike($idPicture){
            $db = \Config\Database::connect();
            $sql='UPDATE pictures SET NumberLike = NumberLike + 1 WHERE idPictures = ' . $idPicture;
            $result = $db->query($sql)->connID->affected_rows;
            $db->close();
            return $result > 0;
        }
    }
?>