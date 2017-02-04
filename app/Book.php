<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'books';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'cover', 'author'];

    public function Tags() {
        return $this->belongsToMany('App\Tag', 'tagsrel','bookid', 'tagid');
    }
    
    public function Autor(){
        return $this->belongsTo('App\Author', 'author');
    }

}
