


<?php load("Views/Template/Header.php");?>



<main class="">

<img src="<?php echo base_url();?>/Assets/img/logito_00000_00000.png" class="img-fluid" alt="EnvyHosting">

  <p class="lead">Lista de plugins</p>

  <div class="album py-10">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      
      <?php
       foreach ($data["plugins_content"] as $key => $value) {
       
        $image = $value["Image"];
        $id = $value["id"];
        $price = $value["Price"];
        $name = $value["Name"];
        $description = $value["Description"];
        $link = $value["Link"];

        echo '<div class="col w-100">
        <div class="card shadow-sm">
        <div id="carousel" class="carousel slide" width="100%" height="225" data-ride="carousel">
  <div class="carousel-inner">
    <a href="', base_url(), '/plugins/plugin/', $id,'"><h2 style="color:black">', $name,'<h2></a>
  <div class="carousel-item active">
    <a href="', base_url(), '/plugins/plugin/', $id,'"><img class="w-1"  height="85" src="', $image,'" alt=""></a>
  </div>
  <div class="carousel-item">
  <a href="', base_url(), '/plugins/plugin/', $id,'"><img class="w-1"  height="85" src="', $image,'" alt=""></a>
  </div>
  <div class="carousel-item">
  <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="', $link,'" allowfullscreen></iframe>
</div>
  </div>
  </div>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only" style="color:black"><-</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only" style="color:black">-></span>
  </a>
  </div>
          <div class="card-body">
            <p class="card-text" style="color:black">', $description, '.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a  href="', base_url(), '/plugins/plugin/', $id,'"><button type="button" class="btn btn-sm btn-outline-secondary">Documentacion</button></a>
                <a href="', base_url(), '/plugins/plugin/', $id,'"><button type="button" class="btn btn-sm btn-outline-secondary" disabled>Descargar</button></a>
              </div>
              <small class="text-muted mt-auto">Precio: ', $price,'$</small>
            </div>
          </div>
        </div>
      </div>';
        

        }


     
      ?>
        
  </div>
</div>



</main>

  

<?php load("Views/Template/Footer.php", $data)?>