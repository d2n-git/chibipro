<?php
namespace App\Models\Users;
use CodeIgniter\Model;
use Config\Encryption;
class InSertUserModel extends Model
{

    private  $Name, $Permission, $Gender, $Email, $Phone, $Address, $Password, $Painter_request;
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
        $this->Painter_request=$data['Painter_request'];
    }
    private function GetData()
    {
        $result = $this->GetUser($this->Email);
        if(isset($result) && ($result['Password'] == $this->Password)){
            $Password=$this->Password;
        } else {
            $encrypter = new Encryption();
            $Password = md5($this->Password.''.$encrypter->key);
        } 
        $data=
        [
            'Name'=>$this->Name,
            'Permission'=>$this->Permission,
            'Gender'=>$this->Gender,
            'Email'=>$this->Email,
            'Phone'=>$this->Phone,
            'Address'=>$this->Address,
            'Password'=> $Password,
            'Painter_request'=>$this->Painter_request,

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
    public function UpdateProfile($param){
        $data =[
            "Name" => $param['username'],
            "Phone" => $param['phone'],
            'Address'=>$param['address'],
            'Gender'=>$param['gender']
        ];
        $db = \Config\Database::connect(); 
        $results = $db->table('users')->where('Email',$param['email'])->update($data);
        $db->close();
        return $results;
    }
    public function UpdatePassword($param){
        $encrypter = new Encryption();
        $param['password'] = md5($param['password'].''.$encrypter->key);
        $param['DatePasschange'] = date('Y-m-d h:m:s');
        $db = \Config\Database::connect(); 
        $results = $db->table('users')->where('Email',$param['email'])->update($param);
        $db->close();
        return $results;
    }
}
