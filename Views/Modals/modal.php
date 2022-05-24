<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: black">Agregar Plugin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="color:black">
        <form action="" method="GET">

        <div class="form-group">
        <label for="pluginName">Nombre</label>
          <input type="text" name="pluginName" id="pluginName" class="form-control mt-2" placeholder="Ejemplo: EnvyEssentials" required>
        </div>
        <div class="form-group">
        <label for="pluginName">Precio</label>
          <input type="number" name="pluginPrice" id="pluginPrice" class="form-control mt-2" placeholder="Ejemplo: 2500" required>
        </div>
        <div class="form-group">
        <label for="pluginConfig">Configuracion (TXT)</label>
        <textarea class="form-control" name="pluginConfig" id="pluginConfig" rows="5"></textarea>
        </div>
        <div class="form-group">
        <label for="pluginPermisos">Permisos (TXT)</label>
        <textarea class="form-control" name="pluginPermisos" id="pluginPermisos" rows="5"></textarea>
        </div>
        <div class="form-group">
        <label for="pluginDescripcion">Descripcion</label>
        <textarea class="form-control" name="pluginDescription" id="pluginDescripcion" rows="3" required></textarea>
        </div>
        <div class="form-group">
        <label for="pluginImage">Imagen</label>
        <input type="file" class="form-control-file" name="pluginImage" id="pluginImage" required> <br/>
        <label for="pluginDLL">Plugin</label>
        <input type="file" class="form-control-file" name="pluginDLL" id="pluginDLL">
        </div>
      </div>

  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeModal('#modal')">Close</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </div>
        </form>

    </div>
  </div>
</div>