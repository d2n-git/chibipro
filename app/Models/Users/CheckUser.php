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
}
