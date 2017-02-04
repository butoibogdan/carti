<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserConfirmation extends Model {

    protected $table = 'userconfirmation';
    protected $primaryKey = 'id';
    protected $fillable = ['userid', 'email', 'password', 'status', 'uniqid'];

}
