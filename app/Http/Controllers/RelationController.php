<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Product;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    //

    //One to one mapping
    public function oneToOne(){
        $list = Owner::find(1)->productData;
        return $list;
    }

    //one to many mapping
    public function OneToMany(){
        $many = Owner::find(1)->productMany;
        return $many;
    }

    public function ManyToOne(){
        $many = Product::with('owner')->get();
        return $many;
    }


}
