<?php

namespace App\Models\Confirm;

use CodeIgniter\Model;
use Config\Encryption;

class ConfirmModel extends Model
{
    private  $idPicture, $Price, $DateExpiry,$DateApprove,$idPainter, $Note;
    public function InSertConfirm($data)
    {
        $this->SetData($data);
        $db = \Config\Database::connect();
        $results = $db->table('confirmofpainter')->insert($this->GetData());
        $db->close();
        return $results;
    }
    private function SetData($data)
    {
        $this->idPicture = $data['idPicture'];
        $this->Price = $data['Price'];
        $this->DateExpiry = $data['DateExpiry'];
        $this->DateApprove = $data['DateApprove'];
        $this->idPainter = $data['idPainter'];
        $this->Note = $data['Note'];
    }
    private function GetData()
    {
        $data =
            [
                'idPicture' => $this->idPicture,
                'Price' => $this->Price,
                'DateExpiry' => $this->DateExpiry,
                'DateApprove' => $this->DateApprove,
                'idPainter' => $this->idPainter,
                'Note' => $this->Note
            ];
        return $data;
    }
    public function GetMaxIdPictures()
    {
        $db = \Config\Database::connect();
        $sql='SELECT IFNULL(MAX(idPictures), 0) AS MaxId FROM pictures' ;
        $results = $db->query($sql)->getRowArray();
        $db->close();
        return $results['MaxId'] + 1;
    }
    public function GetPictureById($id)
    {
        $db = \Config\Database::connect();
        $sql='SELECT * FROM pictures WHERE idPictures = ?';
        $results = $db->query($sql,[$id])->getRowArray();
        $db->close();
        return $results; 
    }
    public function GetIdUser($id)
    {
        $db = \Config\Database::connect();
        $sql='SELECT * FROM pictures WHERE idPictures = ?';
        $results = $db->query($sql,[$id])->getRowArray();
        $db->close();
        return $results['idUser']; 
    }
}
