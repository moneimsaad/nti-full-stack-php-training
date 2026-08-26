

<?php

$tests = array(6,4,9,3,12,8,7);


for($i = 0; $i < count($tests); $i++)
    {
        for($j = $i + 1; $j < count($tests); $j++)
            {
                if($tests[$i] > $tests[$j])
                    {
                        $temp = $tests[$i];
                        $tests[$i] = $tests[$j];
                        $tests[$j] = $temp;
                    }
            }
    }


for($i = 0; $i < count($tests); $i++)
    {
        echo $tests[$i] . " ";
    }

?>