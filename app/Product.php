<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function GetAll()
    {
        //http://localhost:8000/data/exempelartiklar.json
        $getJsonData = file_get_contents("data/exempelartiklar.json");
        $orginalData = json_decode($getJsonData, true);
        $data = array();

        for ($i=0; $i < count($orginalData); $i++) 
        { 
            $newData = array(
            'code' =>  $orginalData[$i]['code'], 
            'name' =>  $orginalData[$i]['name'], 
            'vat' =>  $orginalData[$i]['vat'],
            'price' =>  $orginalData[$i]['price'],
            'moms' =>  $orginalData[$i]['price']*($orginalData[$i]['vat']/100),
            'price_ink_moms' =>  $orginalData[$i]['price']*($orginalData[$i]['vat']/100) + $orginalData[$i]['price'],
            'amount' => intval(1)
            );  
            array_push($data, $newData);
        }
        return $data;
    }
}   
