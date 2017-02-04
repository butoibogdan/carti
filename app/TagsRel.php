<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagsRel extends Model
{
    protected $table='tagsrel';
    
    protected $primaryKey = 'id';
    
    protected $fillable=['bookid','tagid'];
}
