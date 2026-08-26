


<?php

function RouteRandomPass($num)
{
    if($num <= 0)
    {
        return "Invalid Number";
    }

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    $pass = "";

    for($i = 0; $i < $num; $i++)
    {
        $random = rand(0, strlen($chars) - 1);

        $pass = $pass . $chars[$random];
    }

    return $pass;
}


echo RouteRandomPass(25); 

?>