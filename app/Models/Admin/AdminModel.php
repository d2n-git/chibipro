<?php namespace App\Models\Admin;
use CodeIgniter\Model;

    class AdminModel extends Model{
        
        protected $table      = 'pictures';
        protected $primaryKey = 'idPictures';

        protected $returnType     = 'array';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;

        public function getPictureForAdmin($offset, $username, $email){
            $db = \Config\Database::connect();
            $sql="SELECT users.idUser, users.Name as UserName, users.Email, 
                         pictures.idPictures, pictures.Name as PicturesName, pictures.chibiFileName, pictures.Title, pictures.DateUp, pictures.NumberLike, pictures.idStatusPicture as Status, StandarPrice, PriceOfUser
                    FROM pictures 
                    INNER JOIN users 
                    ON pictures.idUser = users.idUser 
                    WHERE users.Name like '%$username%' AND users.Email like '%$email%' 
                    ORDER BY idUser DESC";
            $result = $db->query($sql)->getResultArray();
            $db->close();
            return $result;
        }

        public function getPictureByIdAdmin($id)
        {
            $db = \Config\Database::connect();
            $sql="SELECT pt.NumberLike, pt.idPictures, idStatusPicture, pt.Name, pt.chibiFileName, date_format(cp.DateExpiry,'%Y-%m-%d') as DateExpiry, pt.StandarPrice, pt.PriceOfUser, pt.MaxPrice, cp.Price, pt.ExtraDetail, cp.Note, pt.idUser, pt.Title, pt.Note, pt.Picturesflg FROM pictures pt left join confirmofpainter cp ON pt.idPictures = cp.idPicture WHERE idPictures = ? group by pt.idPictures";
            $result = $db->query($sql,[$id])->getRowArray();
            $db->close();
            return $result;
        }

        public function getPictureCountAdmin($username, $email){
            $db = \Config\Database::connect();
            $sql="SELECT count(*) as count FROM pictures INNER JOIN users ON pictures.idUser = users.idUser
                    WHERE users.Name like '%$username%' AND users.Email like '%$email%' ";
            $result = $db->query($sql)->getRowArray();
            $db->close();
            return $result['count'];
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
        public function delPictureAdmin($param){
            $db = \Config\Database::connect();
            $sql="UPDATE pictures SET Picturesflg = 1 "." WHERE idPictures = ". $param['idPictures'] ." AND idUser = " . $param['idUser'];
            $result = $db->query($sql)->connID->affected_rows;
            $db->close();
            return $result > 0;
        }
        public function updateSttImgAdmin($param){
            $db = \Config\Database::connect();
            $sql="UPDATE pictures SET idStatusPicture = ".$param['Status']." WHERE idPictures = ". $param['idPictures'] ." AND idUser = " . $param['idUser'];
            $result = $db->query($sql)->connID->affected_rows;
            $db->close();
            return $results > 0;
        }

        public function getUsersAdmin($offset, $username, $email)
        {
            $db = \Config\Database::connect();
            $sql = "SELECT * FROM users WHERE Name like '%$username%' AND Email like '%$email%'";
            $result = $db->query($sql)->getResultArray();
            $db->close();
            return $result;
        }

        public function getUsersCountAdmin($username, $email)
        {
            $db = \Config\Database::connect();
            $sql = "SELECT count(*) FROM users WHERE Name like '%$username%' AND Email like '%$email%'";
            $result = $db->query($sql)->getRowArray();
            $db->close();
            return $result['count'];
        }

        public function getListContact($offset, $username, $email)
        {
            $db = \Config\Database::connect();
            $sql="SELECT * FROM contact con WHERE con.name like '%$username%' AND con.email like '%$email%' ";
            $result = $db->query($sql)->getResultArray();
            $db->close();
            return $result;
        }

        public function getContactCountAdmin($username, $email)
        {
            $db = \Config\Database::connect();
            $sql="SELECT count(*) as count FROM contact con WHERE con.name like '%$username%' AND con.email like '%$email%' ";
            $result = $db->query($sql)->getRowArray();
            $db->close();
            return $result['count'];
        }
    }
?>