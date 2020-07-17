<?php 
namespace App\Libraries;
class alert
{
    public function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
}
