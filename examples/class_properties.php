<?php

class Cars {

    var $wheel_count = 4;
    var $door_count = 4;

function cardetail(){

    return "This car has " . $this->wheel_count . " wheels.";

}

}

$bmw = new Cars();
$mercedes = new Cars();

echo $bmw->wheel_count . "<br>";
echo $mercedes->wheel_count = 10 . "<br>";

echo $mercedes->cardetail();
echo $bmw->cardetail();

?>