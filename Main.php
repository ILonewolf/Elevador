<?php 
require "Elevator.php";
require "Floor.php";
require "Functions.php";
if (isset($_POST['submit'])) {
    $destinations = $_POST['destinations'];
    $floors = $_POST['floors'];
    $i = 0;
    $floorArray = array();
    $elevatorTravel = array();


    foreach ($floors as $key => $value) {
        $floorArray = newRequest($value, "available", $floorArray, $destinations[$key]);
    }

    
   

    $elevatorTravel = elevatorPath($floorArray, $elevatorTravel);
    $elevator = new Elevator("available", 1);
    foreach ($elevatorTravel as $floor) {
        $elevator = DirectionChooser($floor, $elevator);
        //echo nl2br("\n ->>> El elevador se detuvo en el piso: " . $elevator->floor);
    }

    $jsonObj = json_encode($elevatorTravel);
}
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="scripts/jquery.color.min.js"></script>
</head>
<body>
    <div id="container"></div>
</body>
<script>


 var json = eval(<?php echo $jsonObj ?>);
 var max = Math.max.apply(Math,json);
 var elevatorFloor =1 ;
 var control = false;
 
 for(var i = 0; i<max; i++) {
     var n1= i+1;
    $("#container").append('<button id="button'+ n1 +'"> Piso #' + n1 + '</button>');
    var btn = $("#button"+n1);
    btn.animate({fontSize: '2em'}, "slow");
    $(btn).css({"background-color": "white", "font-size": "200%"});
 }
 function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}


async function demo() {
 for(var i = 0; i<=json.length; i++) {
    if (elevatorFloor < max-1 && control == false) {
        for(var j =elevatorFloor; j<=json[i];j++) {
            if (j>0) {
            var n = j - 1;
            var btn = $("#button"+n);
            await sleep(600);
            btn.animate({fontSize: '2em'}, "slow");
            $(btn).css({"background-color": "white", "font-size": "200%"});
            }
            var btn = $("#button"+j);
            $(btn).css({"background-color": "red", "font-size": "200%"});
            btn.animate({fontSize: '3em'}, "slow");
            elevatorFloor=j;
            console.log(elevatorFloor);
        }
    }else {
        control = true;
        for(var j = elevatorFloor; j>=json[i];j--) {
            if (j<=max-1) {
                await sleep(600); 
            var n = j + 1;
            var btn = $("#button"+n);  
            btn.animate({fontSize: '2em'}, "slow");
            $(btn).css({"background-color": "white", "font-size": "200%"});
            }
           
            var btn = $("#button"+j);  
            btn.animate({fontSize: '3em'}, "slow");
            $(btn).css({"background-color": "red", "font-size": "200%"});
            elevatorFloor=j;
            console.log(elevatorFloor + "abajo");
        }
    }
    
     $(btn).css({"background-color": "green", "font-size": "200%"});
    await sleep(3000);
}
$(btn).css({"background-color": "blue", "font-size": "200%"});
}
demo();

</script>
</html>


<?php
?>