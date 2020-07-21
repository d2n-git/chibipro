<?php namespace App\Models;
use CodeIgniter\Model;

    class PictureModel extends Model{
        protected $table      = 'pictures';
        protected $primaryKey = 'idPicture';

        protected $returnType     = 'array';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }
?>