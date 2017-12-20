<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $primaryKey = 'item_id';
    public $timestamps = false;

    protected $fillable =[
        'item_id',
        'user-id',
        'purchase_date',
        'payment_type'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
