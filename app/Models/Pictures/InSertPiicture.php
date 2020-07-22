<?php

namespace App\Models\Pictures;

use CodeIgniter\Model;
use Config\Encryption;

class InSertPictureModel extends Model
{
    private $idPictures, $idUser, $idStatusPicture, $Name,$NumberLike,$DateUp, $StatusSendEmail;
    public function InSertPicture($data)
    {
        $this->SetData($data);
        $db = \Config\Database::connect();
        $results = $db->table('pictures')->insert($this->GetData());
        return $results;
    }
    private function SetData($data)
    {
        $this->Name = $data['Name'];
        $this->Permission = 2;
        $this->Email = $data['email'];
        $this->Phone = $data['txtEmpPhone'];
        $this->Address = $data['txtAddress'];
        $this->Password = $data['password'];
    }
    private function GetData()
    {

        $encrypter = new Encryption();
        $Password = $this->Password . '' . $encrypter->key;
        $data =
            [
                'Name' => $this->Name,
                'Permission' => 2,
                'Email' => $this->Email,
                'Phone' => $this->Phone,
                'Address' => $this->Address,
                'Password' => md5($Password)

            ];
        return $data;
    }
}
