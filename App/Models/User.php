<?php

namespace App\Models;

use App\Db;
use App\Model;

class User extends Model
{

    public const TABLE = 'users';
    public $email;
    public $name;


}