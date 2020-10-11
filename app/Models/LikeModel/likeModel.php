<?php

namespace App\Models\LikeModel;

use CodeIgniter\Model;
use Config\Encryption;

class likeModel extends Model
{
    private  $idUser, $idPicture;
    public function InSertLike($data)
    {
        $this->SetData($data);
        $db = \Config\Database::connect();
        $results = $db->table('likes')->insert($this->GetData());
        $db->close();
        return $results;
    }
    private function SetData($data)
    {
        $this->idUser = $data['idUser'];
        $this->idPicture = $data['idPicture'];
    }
    private function GetData()
    {
        $data =
            [
                'idUser' => $this->idUser,
                'idPicture' => $this->idPicture,
            ];
        return $data;
    }
    public function GetLikeByUserId($id)
    {
        $db = \Config\Database::connect();
        $sql="SELECT * FROM likes  WHERE idUser = ? AND idPicture = ?";
        $results = $db->query($sql,[$id['idUser'],$id['idPicture']])->getRowArray();
        $db->close();
        return $results; 
    }
    public function DeleteLike($data)
    {
        $db = \Config\Database::connect(); 
        $results = $db->table('likes')->delete(['idPicture' => $data['idPicture'], 'idUser' => $data['idUser']]);
        $db->close();
        return $results;
    }
}
