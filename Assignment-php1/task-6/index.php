

<?php

$num = array(5,4,9,3,1,7,5,8,6);

$max = $num[0];

for($i = 0; $i < count($num); $i++)
{
    for($j = $i + 1; $j < count($num); $j++)
    {
        if($num[$j] > $max)
        {
            $max = $num[$j];
        }
    }
}

echo $max;

?>