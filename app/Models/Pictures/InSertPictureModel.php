<?php

namespace App\Models\Pictures;

use CodeIgniter\Model;
use Config\Encryption;

class InSertPictureModel extends Model
{
    private  $idUser, $idStatusPicture, $Name, $NumberLike, $DateUp, $StatusSendEmail;
    public function InSertPicture($data)
    {
        $this->SetData($data);
        $db = \Config\Database::connect();
        $results = $db->table('pictures')->insert($this->GetData())->connID->insert_id;
        $db->close();
        return $results;
    }
    private function SetData($data)
    {
        $this->idUser = $data['idUser'];
        $this->idStatusPicture = $data['idStatusPicture'];
        $this->Name = $data['Name'];
        $this->Title = $data['Title'];
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
                'Title' => $this->Title,
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
    public function GetPictureById($id)
    {
        $db = \Config\Database::connect();
        $sql="SELECT pt.NumberLike,pt.idPictures, pt.Name, date_format(pt.DateExpiry,'%Y-%m-%d') as DateExpiry, pt.StandarPrice, pt.PriceOfUser, pt.MaxPrice, pt.ExtraDetail, pt.idUser, pt.Title, pt.Note, pt.BackgroundPicture, pt.idStatusPicture FROM pictures pt WHERE idPictures = ?";
        $results = $db->query($sql,[$id])->getRowArray();
        $db->close();
        return $results; 
    }
    public function GetConfirmPainter($idPictures, $idPainter)
    {
        $db = \Config\Database::connect();
        $sql="SELECT pt.NumberLike, pt.idPictures, pt.Name, pt.StandarPrice, pt.PriceOfUser, pt.MaxPrice, pt.ExtraDetail, pt.idUser, pt.Title, pt.Note, pt.BackgroundPicture, date_format(pt.DateExpiry,'%Y-%m-%d') as dateExpiryReq, pt.idStatusPicture,
                     date_format(cp.DateExpiry,'%Y-%m-%d') as DateExpiry, cp.Price, cp.Note as Note_Painter
              FROM pictures pt left join (select * from confirmofpainter where idPainter = ? order by idConfirmOfPainter DESC limit 1) cp ON pt.idPictures = cp.idPicture WHERE idPictures = ? group by pt.idPictures";
        $results = $db->query($sql,[$idPainter, $idPictures])->getRowArray();
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
    public function UpdatePicture($data)
    {
        $db = \Config\Database::connect(); 
        $results = $db->table('pictures')->where('idPictures',$data['idPictures'])->update($data);
        $db->close();
        return $results;
    }
}
