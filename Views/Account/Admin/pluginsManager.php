

<?php load("Views/Template/Header.php");?>


<?php load("Views/Modals/modal.php");?>

<main class="px-3">

<img src="<?php echo base_url();?>/Assets/img/logito_00000_00000.png" class="img-fluid" alt="EnvyHosting">

<p class="lean">Panel de plugins</p>
</main>

<div class="container mb-5">
<button type="button" class="btn btn-primary py-2 mb-3" onclick="abrirModal('#modal')">Agregar Nuevo Plugin</button>

      <?php 

    

  if(count($data["plugins"]) <= 0){
    echo '<br />';
    echo '<b>No hay plugins en el sistema. Ingresa Datos</b>';
  }else{
    echo '
    <div class="table-responsive-sm">
    <table class="table bg-light">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col bg-light">Nombre</th>
          <th scope="col bg-light">Descripcion</th>
          <th scope="col bg-light">Precio</th>
          <th scope="col bg-light">Acciones</th>
        </tr>
      </thead>
      <tbody>
    ';
    foreach ($data["plugins"] as $key => $value) {
      echo '<tr>
      <th scope="row">', $value["id"],'</th>
      <td>', $value["Name"],'</td>
      <td>', $value["Description"],'</td>
      <td>', $value["Price"],'</td>
      <td>
      <a href="', base_url(), '/plugins/plugin/', $value["id"],'"><button type="button" class="btn btn-primary py-2 mt-2 mx-1">Ver</button></a>
      
      <button type="button" class="btn btn-warning py-2 mt-2 mx-1">Actualizar</button>
      <a href="', base_url(), '/account/admin/plugins?action=remove&id=', $value["id"],'"><button type="button" class="btn btn-danger py-2 mt-2 mx-1">Borrar</button></a>
      </td>
    </tr>';
    }
  }






      ?>

  </tbody>
</table>
</div>


</div>




  
  

<?php load("Views/Template/Footer.php", $data)?>