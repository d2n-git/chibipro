<?php
namespace App\Models\Users;
use CodeIgniter\Model;
use Config\Encryption;
class InSertUserModel extends Model
{

    private  $Name,$Permission,$Email,$Phone,$Address,$Password;
    public function InSertUsers($data)
    {
        $this->SetData($data);
        $db = \Config\Database::connect(); 
        $results = $db->table('users')->insert($this->GetData());
        return $results;
    }
    private function SetData($data)
    {
        $this->Name=$data['firstName'] ." ". $data['lastName'];
        $this->Permission=2;
        $this->Email=$data['email'];
        $this->Phone=$data['txtEmpPhone'];
        $this->Address=$data['txtAddress'];
        $this->Password=$data['password'];
    }
    private function GetData()
    {
      
        $encrypter = new Encryption();
        $Password=$this->Password.''.$encrypter->key;
        $data=
        [
            'Name'=>$this->Name,
            'Permission'=>2,
            'Email'=>$this->Email,
            'Phone'=>$this->Phone,
            'Address'=>$this->Address,
            'Password'=> md5($Password)

        ];
        return $data;
    }
    public function GetMaxIdUser()
    {
        $db = \Config\Database::connect();
        $sql='SELECT IFNULL(MAX(idPictures), 0) AS MaxId FROM pictures' ;
        $results = $db->query($sql)->getRowArray();
        return $results['MaxId'] + 1;
    }
    public function GetUser($mail)
    {
        $db = \Config\Database::connect();
        $sql='SELECT * FROM users WHERE Email = ?' ;
        $results = $db->query($sql,$mail)->getRowArray();
        return $results;
    }
}
