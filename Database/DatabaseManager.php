<script src="../Assets/jquery-3.6.0.js"></script>
<?php
include "IRepository.php";
class DatabaseManager implements IRepository{
    private $servidor;
    private $usuario;
    private $password;
    private $databaseName;
    private $conexion;
    function __construct($_servidor, $_usuario, $_password, $_databaseName){

        
        $this->servidor = $_servidor;
        $this->usuario = $_usuario;
        $this->password = $_password;
        $this->databaseName = $_databaseName;

        try {
    
            
            $_conexion = new PDO("mysql:host=$this->servidor;dbname=$this->databaseName", $this->usuario, $this->password);
            $_conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            $this->conexion = $_conexion;
          } catch (PDOException $error) {  
              echo '<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">La pagina esta inactiva por el momento.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    La pagina esta presentando errores internos a la conexion a la base de datos. Intenta refrescar la pagina o vuelve mas tarde.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entiendo</button>
                  </div>
                </div>
              </div>
            </div>';
            echo '<script type="text/javascript">
			$(document).ready(function(){
				$("#staticBackdrop").modal("show");
			});
		    </script>';
          }
    }


    public function Create($table, $sql){
       // INSERT INTO `$table` (`id`, `Name`, `Description`, `Image`, `Price`) VALUES (NULL, \'Prueba1\', \'xDDD\', \'https://www.google.jpg\', \'500\');";

       $sentencia=$this->conexion->prepare($sql);
       $sentencia->execute();

       if($sentencia->rowCount() > 0){

       }else{
        echo '<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Fallo al agregar datos a la SQL.</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             No se ha podido agregar el registro a la base de datos.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entiendo</button>
            </div>
          </div>
        </div>
      </div>';
      echo '<script type="text/javascript">
      $(document).ready(function(){
          $("#staticBackdrop").modal("show");
      });
      </script>';
      echo '<script type="text/javascript"> location.Reload(); </script>';
       }

    }

    public function Read($table){
        $sql="SELECT * FROM `$table`";
          
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute();
      


        $resultado=$sentencia->fetchAll();
        return $resultado;
    }

    public function ReadWhere($table, $name){
        $sql="SELECT * from `$table` WHERE Username='$name';";

    
        $sentencia=$this->conexion->prepare($sql);
          $sentencia->execute();
      
          $resultado=$sentencia->fetch();
          return $resultado;

    }

    public function Update(){

    }

    public function Delete($table, $sql){
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute();

        if($sentencia->rowCount() > 0){

            
            echo '<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Has eliminado el registro.</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Has eliminado correctamente el registro de la base de datos
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.Reload()">OK</button>
                </div>
              </div>
            </div>
          </div>';
          echo '<script type="text/javascript">
    $(document).ready(function(){
      $("#staticBackdrop").modal("show");
    });
    
      </script>';
        }else{
            echo '<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Fallo al remover datos de la SQL.</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 No se ha podido eliminar el registro de la base de datos.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entiendo</button>
                </div>
              </div>
            </div>
          </div>';
          echo '<script type="text/javascript">
          $(document).ready(function(){
              $("#staticBackdrop").modal("show");
          });
          </script>';
        }
    }
}
?>