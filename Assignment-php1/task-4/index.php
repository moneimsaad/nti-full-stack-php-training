


<?php

$films = array("Fast","Predestination","Persuit","Prestige");

$keyword = "Prestige"; 
$result = "no";

    foreach($films as $film){

        if($film == $keyword){
            $result = "yes"; 
            break;
        }
    }

    echo $result ;

?>