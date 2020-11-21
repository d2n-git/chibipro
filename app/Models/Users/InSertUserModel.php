<?php
namespace App\Models\Users;
use CodeIgniter\Model;
use Config\Encryption;
class InSertUserModel extends Model
{

    private  $Name, $Permission, $Gender, $Email, $Phone, $Address, $Password;
    public function InSertUsers($data)
    {
        $this->SetData($data);
        $db = \Config\Database::connect(); 
        $results = $db->table('users')->insert($this->GetData());
        $db->close();
        return $results;
    }
    private function SetData($data)
    {
        $this->Name=$data['firstName'] ."*-*-". $data['lastName'];
        $this->Permission=$data['Permission'];
        $this->Gender=$data['Gender'];
        $this->Email=$data['email'];
        $this->Phone=$data['txtEmpPhone'];
        $this->Address=$data['txtAddress'];
        $this->Password=$data['password'];
    }
    private function GetData()
    {
        $result = $this->GetUser($this->Email);
        if(isset($result) && ($result['Password'] == $this->Password)){
            $Password=$this->Password;
        } else {
            $encrypter = new Encryption();
            $Password=$this->Password.''.$encrypter->key;
        } 
        $data=
        [
            'Name'=>$this->Name,
            'Permission'=>$this->Permission,
            'Gender'=>$this->Gender,
            'Email'=>$this->Email,
            'Phone'=>$this->Phone,
            'Address'=>$this->Address,
            'Password'=> $Password

        ];
        return $data;
    }
    public function GetMaxIdUser()
    {
        $db = \Config\Database::connect();
        $sql='SELECT IFNULL(MAX(idUser), 0) AS MaxId FROM users' ;
        $results = $db->query($sql)->getRowArray();
        $db->close();
        return $results['MaxId'];
    }
    public function GetUser($mail)
    {
        $db = \Config\Database::connect();
        $sql='SELECT * FROM users WHERE Email = ?' ;
        $results = $db->query($sql,$mail)->getRowArray();
        $db->close();
        return $results;
    }
    public function GetUserById($id)
    {
        $db = \Config\Database::connect();
        $sql='SELECT * FROM users WHERE idUser = ?' ;
        $results = $db->query($sql,$id)->getRowArray();
        $db->close();
        return $results;
    }
    public function UpdateUsers($data)
    {
        $this->SetData($data);
        $db = \Config\Database::connect(); 
        $value = $this->GetData();
        $results = $db->table('users')->where('Email',$value['Email'])->update($this->GetData());
        $db->close();
        return $results;
    }
    public function updateUser($param){
        $data =[
            "Name" => $param['name'],
            "Phone" => $param['phone'],
            'Address'=>$param['address'],
            'Gender'=>$param['gender']
        ];
        $db = \Config\Database::connect(); 
        $results = $db->table('users')->where('Email',$param['email'])->update($data);
        $db->close();
        return $results;
    }
}
