<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //
    public $timestamps = false;

    //define table name
    protected $table = "owner";

    //define primary key
    protected $primaryKey = 'oid';

    //one to one mapping
    public function productData(){
        return $this->hasOne('App\Models\Product','owner_id');
    }

    public function productMany(){
        return $this->hasmany('App\Models\Product','owner_id');
    }
}
