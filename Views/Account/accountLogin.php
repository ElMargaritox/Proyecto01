

<?php load("Views/Template/Header.php");?>



<main class="px-3">

<img src="<?php echo base_url();?>/Assets/img/logito_00000_00000.png" class="img-fluid" alt="EnvyHosting">


<form action="<?php  echo base_url()?>account" method="GET">
      <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1>
      <label for="inputLicence" class="sr-only">Licencia</label>

      <input type="text"  name="licence" id="licence" class="form-control" placeholder="Ingresa tu licencia" required autofocus>

      <label for="inputPassword"  class="sr-only">Contraseña</label>

      <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña" required>
      <br />
      <small class="text-center" style="color: white;">En caso de no tener licencia, Tendras que pedir la licencia via Ticket (<a href="<?php echo DISCORD_LINK; ?>">Discord</a> o Email)</small>
      <br /> <br />

      <button class="btn btn-lg btn-primary btn-block" id="boton" type="submit">Iniciar Sesion</button>

      
    </form>
</main>

  

<?php load("Views/Template/Footer.php", $data)?>