


<?php load("Views/Template/Header.php");?>



<main class="">

<img src="<?php echo base_url();?>/Assets/img/logito_00000_00000.png" class="img-fluid" alt="EnvyHosting">



    <div class="container-md">

      <!--<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">!-->
      
      
      <?php

        if(count($data["plugins_content"]) <= 0){
          echo '
          <div class="row">
            <div class="col-sm-6">
              <input type="text" class="form-control mb-3" onchange="filtrarNombre(this.value)" placeholder="Busca por el nombre tu plugin" name="search" id="search" value="', empty($_COOKIE["cookieNombre"]) ? "" : $_COOKIE["cookieNombre"],'">
            </div>
            <div class="col-sm-6">
              <input type="number" class="form-control mb-3" onchange="filtrarPrecios(this.value)" placeholder="Buscar por precio maximo (DOLARES)" name="search" id="search" value="', empty($_COOKIE["cookiePrecio"]) ? "" : $_COOKIE["cookiePrecio"],'">
            </div>
          </div>
          ';
          echo '<p class="lead text-center">No se encuentran resultados.</p>';
        }else{

 

          echo '
          <div class="row">
            <div class="col-sm-5">
              <input type="text" class="form-control mb-3" onchange="filtrarNombre(this.value)" placeholder="Busca por el nombre tu plugin" name="search" id="search" value="', empty($_COOKIE["cookieNombre"]) ? "" : $_COOKIE["cookieNombre"],'">
            </div>
            <div class="col-sm-3">
              <input type="number" class="form-control mb-3" onchange="filtrarPrecios(this.value)" placeholder="Buscar por precio maximo (DOLARES)" name="search" id="search" value="', empty($_COOKIE["cookiePrecio"]) ? "" : $_COOKIE["cookiePrecio"],'">
            </div>

          </div>
          ';
          echo '<p class="lead text-center">Lista de plugins</p>
          <div class="row row-cols-sm-3 rounded-sm">
          ';
          
          foreach ($data["plugins_content"] as $key => $value) {
       
            $image = $value["Image"];
            $id = $value["id"];
            $price = $value["Price"];
            $name = $value["Name"];
            $description = $value["Description"];
            $link = $value["Link"];
    
    
    
            echo '
          <div class="col py-1 border border-end rounded-top">
            
            <div class="card h-100 bg-light rounded-sm">
              <div class="card-body text-center">
                
                <div class="card-title">
                  <a href="', base_url(), '/plugins/plugin/', $id,'"><img class="img-thumbnail mb-2 mx-4" style="width: 85px; height: 85px;" src="', $image,'"></img></a>
                  <a class="text-center py-2" href="', base_url(), '/plugins/plugin/', $id,'">', $name,'</a>
                
                </div>
                  <p class="card-text" style="color:black">', $description,'</p>
    
                    
              </div>
                <div class="card-footer">
                <small class="text-muted">Precio: <b>', $price,'$</b></small>
                <a href="', base_url(), '/plugins/plugin/', $id,'"><button type="button" class="btn btn-outline-primary justify-content-center">Mas Informacion</button></a>
                </div>
            </div>
    
          </div>
            
    ';

            }
        }



      ?>
        
</div>


<!--XD->>
<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end py-5 ml-6">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>

      <!!-->


</main>

  

<?php load("Views/Template/Footer.php", $data)?>