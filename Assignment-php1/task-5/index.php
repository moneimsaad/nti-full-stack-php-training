


<?php

function RouteBubble($numbers)
{
    $length = count($numbers);

    for($i = 0; $i < $length; $i++)
    {
        for($j = 0; $j < $length - $i - 1; $j++)
        {
            if($numbers[$j] > $numbers[$j + 1])
            {
                $temp = $numbers[$j];

                $numbers[$j] = $numbers[$j + 1];

                $numbers[$j + 1] = $temp;
            }
        }
    }

    return $numbers;
}


 
print_r(RouteBubble(array(5,3,8,1,2,9,4,7,6,0)));   // 0  1  2  3  4  5  6  7  8  9

?>





