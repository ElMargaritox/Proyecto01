
<?php load("Views/Template/Header.php");?>



<main class="px-3">

<img src="<?php echo base_url();?>/Assets/img/logito_00000_00000.png" class="img-fluid" alt="EnvyHosting">

<h2>A licencia de: <?php echo $_SESSION["_Licence"]?></h2>
<h2>Ips Permitidas:</h2>
<?php 


  
foreach ($data["ips"] as $key => $value) {
  echo $value."<br/>";
}
?>
<table class="table bg-success">
  <thead>
    <tr>
      <th scope="col bg-success">Plugins</th>
    </tr>
  </thead>
  <tbody>

      <?php 

foreach ($data["myplugins"] as $key => $value) {
    echo '<tr class="bg-warning">
    <td>', $value,'</td>
  </tr>';
}


      ?>

  </tbody>
</table>
  

<?php load("Views/Template/Footer.php", $data)?>