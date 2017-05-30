<?php

namespace Square;

class Shape
{
    private $edge;

    public function __construct($edge)
    {
        $this->edge = $edge;
    }

    private function getArea()
    {
        return pow($this->edge, 2);
    }

    private function getParameter()
    {
        return $this->edge * 4;
    }
    
    public function output()
    {
        echo "Cạnh: " . $this->edge . "<br/>" . "Diện tích: ". $this->getArea() . "<br/>" . "Chu vi: " . 
            $this->getParameter() . "<br/>";
    }
}

