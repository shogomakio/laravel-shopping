<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $primaryKey = 'genre_id';
    protected $table = 'genres';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'genre_id', 'genre_name'
    ];

    public function Genre(){
        return $this->hasMany('App\Product');
    }
}
