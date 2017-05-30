<?php

include 'Circle.php';
include 'Rectangle.php';
include 'Square.php';

$circle = new Circle\Shape(3);
$rectangle = new Rectangle\Shape(5, 3);
$square = new Square\Shape(4);

echo "Hình tròn: <br/>";
$circle->output();
echo "<br/>";

echo "Hình chữ nhật: <br/>";
$rectangle->output();
echo "<br/>";

echo "Hình vuông: <br/>";
$square->output();

