<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public $timestamps = false;

    //define table name
    protected $table = "product";

    //define primary key
    protected $primaryKey = 'pid';


    public function owner(){
        return $this->belongsTo('App\Models\Owner');
    }
}
