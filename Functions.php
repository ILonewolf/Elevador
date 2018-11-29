<?php
function cmp($a, $b)
{
    return ($a < $b) ? -1 : 1;
}

function cmp1($a, $b)
{
    return ($a > $b) ? -1 : 1;
}

function elevatorUp($dest, $elevator)
{
    $currentFloor = $elevator->floor; 
    $elevator->directionSet("Up");
    while ($currentFloor < $dest) {
        $currentFloor++;
        $elevator->floorSet($currentFloor);
       
    }
    $elevator->directionSet("Waiting");
    return $elevator;
}

function elevatorDown($dest, $elevator)
{
    $currentFloor = $elevator->floor;
    $elevator->directionSet("Down");
    while ($currentFloor > $dest) {
        $currentFloor--;
        $elevator->floorSet($currentFloor);
        
    }
    $elevator->directionSet("Waiting");
    return $elevator;
}

function DirectionChooser($dest, $elevator)
{
    $currentFloor = $elevator->floor;
    if ($currentFloor < $dest) {
        $elevator = elevatorUp($dest, $elevator);
    } elseif ($currentFloor > $dest) {
        $elevator = elevatorDown($dest, $elevator);
    }
    return $elevator;
}

function newRequest($floorArg, $availabilityArg, $floorArray, $destinationArg)
{
    $newFloor = new Floor($floorArg, $availabilityArg, $destinationArg);
    array_push($floorArray, $newFloor);
    return $floorArray;
}

function requestPriority($floorArrayArg)
{
    $floorUp = array();
    $floorDown = array();
    foreach ($floorArrayArg as $floor) {
        if ($floor->availability == "available") {
            if ($floor->direction == "UP") {
                array_push($floorUp, $floor);
            } elseif ($floor->direction == "DOWN") {
                array_push($floorDown, $floor);
            }
        }
    }
    usort($floorUp, "cmp");
    usort($floorDown, "cmp1");
    return array_merge($floorUp, $floorDown);

}

function elevatorPath($floorArrayArg, $elevatorTravel)
{
    $floorUp = array();
    $floorDown = array();
    $maintenance = array();
    foreach ($floorArrayArg as $floor) {
        if ($floor->availability == "available") {
            if ($floor->direction == "UP") {
                array_push($floorUp, $floor->number);
                array_push($floorUp, $floor->destination);
            } elseif ($floor->direction == "DOWN") {
                array_push($floorDown, $floor->number);
                array_push($floorDown, $floor->destination);
            }
        }else {
            array_push($maintenance, $floor->number);
        }
    }
    sort($floorUp);
    $floorUp = array_unique($floorUp);
    sort($floorDown);
    rsort($floorDown);
    $floorDown = array_unique($floorDown);
    $elevatorTravel = array_merge($floorUp, $floorDown);
    return $elevatorTravel;
} 