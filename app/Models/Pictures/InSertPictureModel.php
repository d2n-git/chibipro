<?php

namespace App\Models\Pictures;

use CodeIgniter\Model;
use Config\Encryption;

class InSertPictureModel extends Model
{
    private  $idUser, $idStatusPicture, $Name,$NumberLike,$DateUp, $StatusSendEmail;
    public function InSertPicture($data)
    {
        $this->SetData($data);
        $db = \Config\Database::connect();
        $results = $db->table('pictures')->insert($this->GetData());
        $db->close();
        return $results;
    }
    private function SetData($data)
    {
        $this->idUser = $data['idUser'];
        $this->idStatusPicture = $data['idStatusPicture'];
        $this->Name = $data['Name'];
        $this->NumberLike = $data['NumberLike'];
        $this->DateUp = $data['DateUp'];
        $this->StatusSendEmail = $data['StatusSendEmail'];
    }
    private function GetData()
    {
        $data =
            [
                'idUser' => $this->idUser,
                'idStatusPicture' => $this->idStatusPicture,
                'Name' => $this->Name,
                'NumberLike' => $this->NumberLike,
                'DateUp' => $this->DateUp,
                'StatusSendEmail' => $this->StatusSendEmail
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
}
