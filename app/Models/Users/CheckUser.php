<?php

namespace App\Models\Users;
use CodeIgniter\Model;
use Config\Encryption;

class CheckUser extends Model
{
    public function GetUser($data)
    {
        $encrypter = new Encryption();
        $Password=$data['Password'].''.$encrypter->key;
        $db = \Config\Database::connect();
        $sql = 'SELECT * FROM users WHERE Email = ? AND Password = ?';
        $result = $db->query($sql, [$data['Email'],md5($Password)])->getRowArray();
        $db->close();
        return $result;
    }

    public function getUserByEmail($param)
    {
        $db = \Config\Database::connect();
        $sql = 'SELECT * FROM users WHERE Email = ?';
        $result = $db->query($sql, $param)->getRowArray();
        $db->close();
        return $result;
    }
}
