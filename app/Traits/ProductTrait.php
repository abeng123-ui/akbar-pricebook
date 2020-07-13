<?php
namespace App\Traits;

use App\Models\Products;
use App\Models\Masterproducts;

trait ProductTrait
{
    public static function createProduct($name)
    {
        $product = new Products();
        $product->name = $name;
        $product->save();

        return $product;
    }

    public static function formattingName($name)
    {
        if(strpos($name,"(") == true){
            $name = strstr($name, '(', true);
        }elseif(strpos($name,"[") == true){
            $name = strstr($name, '[', true);
        }

        $data = explode(" ", $name);

        foreach ($data as $key) {
            $master = Masterproducts::where('keyword', strtolower($key))->first();
            if($master && (!in_array($master->name, $data))){
                $name = $master->name." ".$name;
                break;
            }
        }

        return $name;
    }

}
