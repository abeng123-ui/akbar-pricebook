<?php

namespace App\Helpers;

class GlobalHelper
{
    public static function createResponse($error = true, $message='', $data=[] )
    {
       if($error){
          $response = [
              'error' => $error,
              'message' => $message
           ];
       }else{
           $response = [
              'error' => $error,
              'message' => $message,
              'data' => $data,
           ];

       }

        return $response;
    }

    public static function checkName($name){
        $result = '';
        if(strpos($name,"[") == true){
            $result = substr($string, 0, strpos($string, "["));
        }elseif(strpos($name,"(") == true){
            $result = substr($string, 0, strpos($string, "("));
        }

        return $result;
    }
}
