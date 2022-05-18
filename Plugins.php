<?php
$servidor="sql10.freemysqlhosting.net";
$usuario="sql10493138";
$password="5qM7FyX9uS";
$existeAlgo = false;
try {
    
  $conexion = new PDO("mysql:host=$servidor;dbname=sql10493138", $usuario,$password);
  $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql="SELECT * FROM `PluginsData`";

  $sentencia=$conexion->prepare($sql);
  $sentencia->execute();

  $resultado=$sentencia->fetchAll();




} catch (PDOException $error) {
  echo "ERROR:", $error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background-color:black";>
    <main style="background-color: black">

        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
   <div class="container-fluid">
     <a class="navbar-brand" href="https://getbootstrap.com/docs/5.1/examples/navbar-static/?#">EnvyHosting</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarCollapse">
       <ul class="navbar-nav me-auto mb-2 mb-md-0">
         <li class="nav-item">
           <a class="nav-link" aria-current="page" href="Index.html">Inicio</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="https://clientes.envynode.com">Area Clientes</a>
         </li>  
         <li class="nav-item">
            <a class="nav-link" href="contacto.html">Contacto</a>
          </li>  
          <li class="nav-item">
          <a class="nav-link active" href="Plugins.php">Plugins</a>
          </li>  
       </ul>
             <a class="nav-link" style="color:white" href="http://www.google.com">Discord</a>
     </div>
   </div>
 </nav>
          <div class="text-center" style="background-color: black">
              <img class="text-center rounded" src="logito_00000_00000.png"/>
          </div>  
 
          <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 justify-content-center">

            <?php
            
            foreach ($resultado as $key => $value) {
                $existeAlgo = true;



                $pluginName = $value["Name"];
                $pluginImage = $value["Image"];
                $pluginDescription = $value["Description"];
                $pluginPrice = $value["Price"];

                echo '<div class="col bg-light rounded border-2 border" style="width: 350px; height: 150px; margin: 10px 10px 10px 10px;">
                <div class="d-flex align-items-center text-center" style="margin-top: -20px;">
                    <div><a href="https://clientes.envynode.com"><img src="', $pluginImage,'" width="85" height="85" class="rounded border border-2"></a></div>
                 <div class="ms-1 text-center w-100" style="margin-bottom: -20px;">
                    <div><a class="ms-2 text-center w-100 text-decoration-none" href="https://clientes.envynode.com"><h3>', $pluginName, '</h3></a></div>
                    <div><div class="mt-auto" style="height: 50px;"><small style="vertical-align: middle;">', $pluginDescription, '</small></div>   
                    
                   </div>     
                               
                </div>   
                
            </div>
            <div class="text-muted ms-auto"><span>Price: ', $pluginPrice, ' $</span></div>  
           </div>';

            }

            if(!$existeAlgo){
              echo '
                <div=class"container-fluid">
                <p class="mx-auto text-center" style="color: yellow;"><b>No Existe Nada</b></p>
                </div>
              ';
            }
            ?>
            
            
                  

                   
              </div>
              </div>

           
     </main>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>