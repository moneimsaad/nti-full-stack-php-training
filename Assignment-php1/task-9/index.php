


<?php

$tests = array(1, "MON3EM", 1.5, true, 7, 's', false);


// Using FOR LOOP

echo "Using FOR LOOP \n";

for($i = 0; $i < count($tests); $i++)
{
    if(is_bool($tests[$i]))
    {
        if($tests[$i] == true)
        {
            echo "Yes \n";
        }
        else
        {
            echo "No \n";
        }
    }
    else
    {
        echo $tests[$i] . "\n";
    }
}


echo "------------------ \n";


// Using WHILE LOOP

echo "Using WHILE LOOP \n";

$i = 0;

while($i < count($tests))
{
    if(is_bool($tests[$i]))
    {
        if($tests[$i] == true)
        {
            echo "Yes \n";
        }
        else
        {
            echo "No \n";
        }
    }
    else
    {
        echo $tests[$i] . "\n";
    }

    $i++;
}


?>