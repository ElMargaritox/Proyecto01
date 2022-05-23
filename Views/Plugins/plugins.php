


<?php load("Views/Template/Header.php");?>



<main class="">

<img src="<?php echo base_url();?>/Assets/img/logito_00000_00000.png" class="img-fluid" alt="EnvyHosting">

  <p class="lead text-center">Lista de plugins</p>

    <div class="container-md">

      <!--<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">!-->
      <div class="row row-cols-sm-3 rounded-sm">
      
      <?php
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
      ?>
        
</div>



</main>

  

<?php load("Views/Template/Footer.php", $data)?>