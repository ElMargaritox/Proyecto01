


<?php load("Views/Template/Header.php");?>



<main class="">

<img src="<?php echo base_url();?>/Assets/img/logito_00000_00000.png" class="img-fluid" alt="EnvyHosting">



     <?php




        if(isset($data["Name"])){
            echo '<p class="lead">', $data["Name"],'</p>';

            echo '<nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Inicio</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Configuracion</a>
              <a class="nav-item nav-link" id="nav-permisos-tab" data-toggle="tab" href="#nav-permisos" role="tab" aria-controls="nav-permisos" aria-selected="false">Permisos</a>
              <a class="nav-item nav-link disabled" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Descargar</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="ratio ratio-16x9">
            <iframe src="', $data["Link"],'" title="YouTube video" allowfullscreen></iframe>
              </div>
              <p class="text-center mt-auto">', $data["Description"],'</p>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            ', file_get_contents(getConfig($data["id"]), false),'
            </div>
            <div class="tab-pane fade" id="nav-permisos" role="tabpanel" aria-labelledby="nav-permisos-tab">', 
            file_get_contents(getPermissions($data["id"]), false),'</div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">', 
            '</div>
          </div>
          ';
        }else{
            echo "<p>No exíste el plugin</p>";
            echo '<a href="', base_url(),'/plugins"><p>Has click aca</a>. Para volver a lista de plugins</p>';
        }

        function downloadFunction(){

            # Leer el archivo y sacarlo al navegador
          readfile(download($data["id"]));
        }

        
     ?>
        



</main>

  

<?php load("Views/Template/Footer.php", $data)?>