<?php

namespace Rectangle;

class Shape
{
    private $length;
    private $width;

    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    public function getArea()
    {
        return $this->width * $this->length;
    }

    public function getParameter()
    {
        return ($this->width + $this->length) * 2;
    }

    public function output()
    {
        echo "Chiều dài: " . $this->length . "<br/>" . "Chiều rộng: " . $this->width . "<br/>" . "Diện tích: ". 
            $this->getArea() . "<br/>" . "Chu vi: " . $this->getParameter() . "<br/>";
    }
}