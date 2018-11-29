<?php
 class Elevator
 {
    public $state = null; 
    public $floor = null;  
    public $direction = null; 

    public function elevator($stateArg, $defaultFloor, $directionArg="Up")
    {
        $this -> state = $stateArg;
        $this -> direction = $directionArg; 
        $this -> floor = $defaultFloor; 
    }

    public function floorSet($floor)
    {
       $this -> floor = $floor; 
    }

    public function directionSet($direction)
    {
       $this -> direction = $direction; 
    }
 }