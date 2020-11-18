<?php namespace App\Models\Admin;
use CodeIgniter\Model;

    class AdminModel extends Model{
        
        protected $table      = 'pictures';
        protected $primaryKey = 'idPictures';

        protected $returnType     = 'array';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;

        public function getPictureForAdmin($offset){
            $db = \Config\Database::connect();
            $sql="SELECT users.idUser, users.Name as UserName, users.Email, 
                         pictures.idPictures, pictures.Name as PicturesName, pictures.Title, pictures.DateUp, pictures.NumberLike, pictures.idStatusPicture as Status, StandarPrice, PriceOfUser
                    FROM pictures 
                    INNER JOIN users 
                    ON pictures.idUser = users.idUser 
                    ORDER BY idUser DESC LIMIT " . LIMITPICTURE . " OFFSET " .$offset;
            $result = $db->query($sql)->getResultArray();
            $db->close();
            return $result;
        }

        public function getPictureById($id){
            $db = \Config\Database::connect();
            $sql="SELECT pictures.idPictures, pictures.Name, users.Name AS userName, pictures.MaxPrice, pictures.Title FROM pictures INNER JOIN users ON pictures.idUser = users.idUser WHERE pictures.idPictures = " . $id;
            $result = $db->query($sql)->getFirstRow();
            $db->close();
            return $result;
        }

        public function getAllPictureCountAdmin(){
            $db = \Config\Database::connect();
            $sql='SELECT * FROM pictures INNER JOIN users ON pictures.idUser = users.idUser ORDER BY NumberLike';
            $result = $db->query($sql)->getResultArray();
            $db->close();
            return $result;
        }

        public function updateNumberLikeAdmin($idPicture){
            $db = \Config\Database::connect();
            $sql='UPDATE pictures SET NumberLike = NumberLike + 1 WHERE idPictures = ' . $idPicture;
            $result = $db->query($sql)->connID->affected_rows;
            $db->close();
            return $result > 0;
        }

        public function updatePicturesAdmin($param){
            $db = \Config\Database::connect();
            $sql='UPDATE pictures SET StandarPrice = '.$param['standarprice'].', PriceOfUser = '.$param['priceofuser'].', Note = \''.$param['message'].'\', BackgroundPicture = \''.$param['backgroundid'].'\' , DateExpiry = \''.$param['dateExpiry'].'\' WHERE idPictures = '.$param['idPicture'] ;
            $result = $db->query($sql)->connID->affected_rows;
            $db->close();
            return $result > 0;
        }

        public function updateSttImgAdmin($param){
            $db = \Config\Database::connect();
            $sql="UPDATE pictures SET Picturesflg = ".$param['Status']." WHERE idPictures = ". $param['idPictures'] ." AND idUser = " . $param['idUser'];
            $result = $db->query($sql)->connID->affected_rows;
            $db->close();
            return $results > 0;
        }
    }
?>