<?php

namespace App\Models;

use App\Classes\AbstractModel;
/**
 * Class ProcessingUsers
 * @property $login
 * @property $password
 * @property $email
 */

class ProcessingUsers extends AbstractModel
{
    protected static $table = 'users';	
}