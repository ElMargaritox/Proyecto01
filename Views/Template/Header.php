
<?php //load("Views/Template/Header.php")?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta http-equiv="refresh" content="1">
    <title>Inicio</title>    

<link href="<?php echo base_url();?>Assets/css/bootstrap.min.css" rel="stylesheet"></link>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>/Assets/css/cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="float-lg-start">
    <div>
      <h3 class="float-md-start mb-0">EnvyHosting</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link fw-bold py-1 px-0 <?php echo $_SESSION['pageSelected'] == "Home"? "active" : ""?>" aria-current="page" href="<?php echo base_url()?>/home#">Home</a>
        <a class="nav-link fw-bold py-1 px-0"<?php echo $_SESSION['pageSelected'] == "Home"? "active" : ""?> href="<?php echo base_url()?>/plugins">Plugins</a>
        <a class="nav-link fw-bold py-1 px-0"<?php echo $_SESSION['pageSelected'] == "Home"? "active" : ""?> href="<?php echo base_url()?>/contacto">Contacto</a>
      </nav>
    </div>
  </header>