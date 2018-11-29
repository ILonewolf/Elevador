<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<style>
.banner {
    padding: 100px 0;
    color: #f8f8f8;
    background: url(https://www.google.com.mx/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwiy_qvIqvXeAhUHWqwKHU9XBkcQjRx6BAgBEAU&url=https%3A%2F%2Fwww.blink102.com.br%2Fmedo-de-elevador-cuidado-pode-piorar-conheca-tragedias-que-ficaram-na-historia%2F&psig=AOvVaw3XHG6TwA_rlaTBvea8FK6M&ust=1543433455454281);
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
<body>
<div class="card text-white bg-info mb-3 card text-center" style="max-width: 100rem;">
  <div class="card-body center">
  <h5 class="card-header">Elevador</h5>
  <br>
  <h6 class=" text-center">Instrucciones: Favor de insertar el número de peticiones que desee: </h6>
    <input type="number" id="nume" value=1 min=1 \> 
    <a href="#" class="btn btn-success" id="add">Agregar</a>
    <form method="POST" action="Main.php">
    <div class="form-group">
        <div id="container">
           
        </div>
    
        <input   class="btn btn-primary" type="submit" value="Listo" name="submit">
    </form>
    <div class="banner">
                
                        <div class="container">
                
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Elevador</h2>
                                    <br>
                                    <p>Alumnos: Alan Alberto Ávila Arenas | Briayan La Hoya Vázquez | Luis Ángel García Rich</p>
                                </div>

                            </div>
                
                        </div>
                       
                
                    </div>
</div>
</div>
</div>
</body>
</html>
<script>
    var code = '<p\> <div>Piso <input type="text" name="floors[]"/> Destino <input type="text" name="destinations[]" /> <a class="btn btn-danger btn remove"href="#" id="remove">Eliminar</a> <div>';
    var x = $("#nume").val();
    
    $(document).ready(function(e){
        
        $("#add").click(function(e){    
            x = $("#nume").val();
            for (var i = 0; i<x ; i++) {
                $("#container").append(code);
        }
        });

        $("#container").on('click','#remove',(function(e){
            $(this).parent('div').remove();   
        }));
    });
</script>

