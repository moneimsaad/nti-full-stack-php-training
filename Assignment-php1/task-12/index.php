<form method="post">

    Product Price:
    <input type="text" name="price">

    <br><br>

    Quantity:
    <input type="text" name="quantity">

    <br><br>

    <input type="submit" name="submit" value="Calculate">

</form>




<?php

if(isset($_POST['submit']))
{
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];


    if(!is_numeric($price) || !is_numeric($quantity))
    {
        echo "Please enter numbers only";
    }

    elseif($price < 0 || $quantity < 0)
    {
        echo "Negative numbers are not allowed";
    }

    else
    {
        $total = $price * $quantity;


        if ($total <= 1000)
        {
            $discount = $total * 0.10;
        }
        else
        {
            $discount = $total * 0.15;
        }


        $afterDiscount = $total - $discount;


        echo "Total Price Before Discount = " . $total . "<br>";

        echo "Discount = " . $discount . "<br>";

        echo "Total Price After Discount = " . $afterDiscount;
    }
}

?>

