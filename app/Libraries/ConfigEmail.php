<?php
namespace App\Libraries;

class ConfigEmail 
{
    public function __construct()
    {
        
    }
    
    public function SendEmail($mess,$subject,$toEmail)
    {
        $email = \Config\Services::email();
        $email->setTo($toEmail);
        $email->setSubject($subject);
        $email->setMessage($mess);
        $result = $email->send();
        return $result;
    }
}