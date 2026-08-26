<?php

function SumArray($numbers){
    $sum = 0 ; 
    foreach($numbers as $number){

        $sum += $number;            

    }
    return $sum ; 
}

echo SumArray([2,4,6,8,10]);    
                                                // 0 + 2 = 2
                                                // 2 + 4 = 6
                                                // 6 + 6 = 12
                                                // 12 + 8 = 20
                                                // 20 + 10 = 30 
                                                // Result = 30


?>