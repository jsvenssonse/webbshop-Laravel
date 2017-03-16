<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class Cart extends Model
{

    public function findObjectById($id){
        $sessionAll = Session::all()['cart'];

        if ( isset( $sessionAll[$id] ) ) {
            return $sessionAll[$id];
        }

        return false;
   
    }
