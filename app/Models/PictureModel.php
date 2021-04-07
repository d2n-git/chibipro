<?php namespace App\Models;
use CodeIgniter\Model;

    class PictureModel extends Model{
        
        protected $table      = 'pictures';
        protected $primaryKey = 'idPictures';

        protected $returnType     = 'array';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;

        public function getAllPicture($offset, $idUser = '', $idStatusPicture = ''){
            $db = \Config\Database::connect();
            $sql="SELECT idPictures, pictures.Name, pictures.idUser, (CASE WHEN idStatusPicture >= 8 THEN chibiFileName ELSE 'loading.png' END) AS chibiFileName, idStatusPicture,
             pictures.Title, date_format(pictures.DateUp,'%d-%m-%Y') as DateUp, pictures.NumberLike, users.Name AS userName, users.Email FROM pictures INNER JOIN users ON pictures.idUser = users.idUser WHERE (Picturesflg <> 1 OR Picturesflg is Null)";
            if($idUser != ''){
                $sql = $sql.' AND pictures.idUser = '.$idUser;
            }
            if($idStatusPicture != ''){
                $sql = $sql.' AND pictures.idStatusPicture in ('.$idStatusPicture.')';
            }
            $sql = $sql." ORDER BY NumberLike DESC LIMIT " . LIMITPICTURE . " OFFSET " .$offset;
            $result =  $db->query($sql)->getResultArray();
            $db->close();
            return $result;
        }

        public function getPictureById($id){
            $db = \Config\Database::connect();
            $sql="SELECT pictures.idPictures, pictures.Name, pictures.chibiFileName, pictures.MaxPrice, pictures.Title, 
                    users.Name AS userName, users.idUser
                    FROM pictures 
                    INNER JOIN users ON pictures.idUser = users.idUser 
                    WHERE pictures.idPictures = " . $id;
            $result =  $db->query($sql)->getFirstRow();
            $db->close();
            return $result;
        }

        public function getAllPictureCount($idUser = '', $idStatusPicture = ''){
            $db = \Config\Database::connect();
            $sql='SELECT * FROM pictures INNER JOIN users ON pictures.idUser = users.idUser WHERE (Picturesflg <> 1 OR Picturesflg is Null)';
            if($idUser != ''){
                $sql = $sql.' AND pictures.idUser = '.$idUser;
            }
            if($idStatusPicture != ''){
                $sql = $sql.' AND pictures.idStatusPicture in ('.$idStatusPicture.')';
            }

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

        public function updateNumberHeart($idPicture){
            $db = \Config\Database::connect();
            $sql='UPDATE pictures SET NumberHeart = NumberHeart + 1 WHERE idPictures = ' . $idPicture;
            $result = $db->query($sql)->connID->affected_rows;
            $db->close();
            return $result > 0;
        }

        public function updatePictures($param){
            $db = \Config\Database::connect();
            $sql='UPDATE pictures SET StandarPrice = '.$param['standarprice'].', PriceOfUser = '.$param['priceofuser'].', Note = \''.$param['message'].'\', BackgroundPicture = \''.$param['backgroundid'].'\' , DateExpiry = \''.$param['dateExpiry'].'\' WHERE idPictures = '.$param['idPicture'] ;
            $result = $db->query($sql)->connID->affected_rows;
            $db->close();
            return $result > 0;
        }
    }
?>