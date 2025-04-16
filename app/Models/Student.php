<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    //
    public $timestamps = false;

    //define table name
    protected $table = "student";

    //define primary key
    protected $primaryKey = 'sid';
}
