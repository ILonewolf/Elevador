<?php
class Floor
{
    public $number = null; 
    public $availability = null; 
    public $destination = null;
    public $direction = "UP";

    public function floor($numberArg, $disponibilityArg, $destinationArg)
    {
        $this->number = $numberArg;
        $this -> availability = $disponibilityArg; 
        $this -> destination = $destinationArg;  

        if ($numberArg<$destinationArg){
            $this -> direction = "UP"; 
        } elseif ($numberArg>$destinationArg){
            $this -> direction = "DOWN"; 
        }
    }

}