<?php

namespace Circle;

class Shape
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    private function getArea()
    {
        return pi() * 2 * $this->radius;
    }

    private function getParameter()
    {
        return pow($this->radius, 2) * pi();
    }
    
    public function output()
    {
        echo "Bán kính: " . $this->radius . "<br/>" . "Diện tích: ". $this->getArea() . "<br/>" . "Chu vi: " . 
            $this->getParameter() . "<br/>";
    }
}