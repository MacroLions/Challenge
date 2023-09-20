<?php

namespace App\Http\Controllers;


class CardController extends Controller
{
    public function ping()
    {
        return response()->json(['message' => 'Hello from Card Controller']);
    }

    public function checkDate($month, $year)
    {
        $date = $month . '/01/' . $year;

        // Crear un objeto DateTime a partir de la fecha
        $date = new \DateTime($date);
        $today = new \DateTime();

        if($date > $today){
            return response()->json(['status' => 'success', 'message' => 'Valid Card date']);
        }else if($date <= $today){
            return response()->json(['status' => 'failure','message' => 'Card expired']);
        }
    }


    public function checkCard($pan)
    {
        if(strlen($pan) <16 || strlen($pan) >19 ){
            return response()->json(['status' => 'failure','message' => 'Invalid card length']);
        }else{
            //Luhn’s algorithm
            $reverse = strrev((string)$pan);
            $count = 0;
            for ($i=0; $i < strlen( (string) $pan) ; $i++) { 
                $num = (int)$reverse[$i];
                if($i%2 == 0){
                    $num = $num * 2;
                    if($num>=10){
                        $num = $num - 9;
                    }
                    $count = $count+ $num;
                }else{  
                    $count= $count + $num;  
                }
            }
            if($count % 10 == 0 || $count % 10 == 10 - ($count % 10)){
                return response()->json(['status' => 'success', 'message' => 'Valid card']);
            }else{
                return response()->json(['status' => 'failure', 'message' => 'Invalid card']);
            }
            
        }
    }

    public function checkCVV($pan, $cvv)
    {
        $panStart =  substr((String)$pan,0,2);
        $america = false;
        if($panStart == "34" || $panStart == "37"){
            $america = true;
            //return response()->json(['status' => 'success', 'message' => 'American Express']);
        }
        if($america){
            if( strlen( (string) $cvv)!=4){
                return response()->json(['status' => 'failure', 'message' => 'Invalid CVV']);
            }
        }else{
            if( strlen( (string) $cvv)!=3){
                return response()->json(['status' => 'failure', 'message' => 'Invalid CVV']);
            }
        }
        return response()->json(['status' => 'success', 'message' => 'Valid CVV']);
    }

}
