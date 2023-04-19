<!-- ************************************************ MODALES VOLUMEN ********************************************* -->
<!-- NUEVO VOLUMEN -->
<div class="modal fade" id="crearVolumen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#3c8dbc; color:white;">
        <h1 class="modal-title fs-5" style="text-align: center" id="exampleModalLabel">Nuevo Volumen</h1>
        <button type="button" id="cerrar_crearVolumen" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  id="form-crearVolumen">
          <div class="form-group">
            <label for="">Título del volumen: </label>
            <div class="input-group">
              <i style="width: 50px; color:#3c8dbc;" class="fa-solid fa-book fa-2x"></i>
              <input maxlength="100" id="tituloVolumenCrear" class="form-control" type="text" placeholder="Ej. Los viajes de Ramona" required>
            </div>
            <div style="height: 10px;"></div>
            <label for="">Número de volumen: </label>
            <div class="input-group">
              <i style="width: 50px; color:#3c8dbc;" class="fa-solid fa-hashtag fa-2x"></i>
              <input onkeypress="return soloNumerosEnteros(event)"  type="number" min="1" id="noVolumenCrear" class="form-control" placeholder="Ej. 1" required>
            </div>
            <div style="height: 10px;"></div>
            <label for="">Sala: </label>
            <div class="input-group">
              <i style="width: 50px; color:#3c8dbc;" class="fa fa-door-closed fa-2x"></i>
              <select style="overflow-y: auto" aria-label="Selecciona la sala" class="form-select form-select-solid"
                id="salaVolumenCrear" required>
              </select>
            </div>
            <div style="height: 10px;"></div>
            <label for="">Estante: </label>
            <div class="input-group">
              <i style="width: 50px; color:#3c8dbc;" class="bi bi-bookshelf fa-2x"></i>
              <select style="overflow-y: auto" aria-label="Selecciona el estante" class="form-select form-select-solid"
                id="estanteVolumenCrear" required>
              </select>
            </div>
            <div style="height: 10px;"></div>
            <label for="">Librero: </label>
            <div class="input-group">
              <i style="width: 50px; color:#3c8dbc;" class="fa-solid fa-layer-group fa-2x"></i>
              <select style="overflow-y: auto" aria-label="Selecciona el librero" class="form-select form-select-solid"
                id="libreroVolumenCrear" required>
              </select>
            </div>
            <div style="height: 10px;"></div>
            <label for="">Posición: </label>
            <div class="input-group">
              <i style="width: 50px; color:#3c8dbc;" class="fa fa-location-dot fa-2x"></i>
              <select style="overflow-y: auto" aria-label="Selecciona la posición" class="form-select form-select-solid"
                id="posicionVolumenCrear" required>
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i style="width: 35px;" class="fa-solid fa-bookmark"></i>Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- EDITAR VOLUMEN -->
<div class="modal fade" id="editarVolumenes" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-weight: bold !important;" >Editar Volumen</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form  id="form-editarVolumenes" style="overflow: auto">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Título del volumen: </label>
              <div class="input-group">
                <i style="width: 50px; color:#3c8dbc;" class="fa-solid fa-book fa-2x"></i>
                <input maxlength="100" id="tituloVolumenEditar" class="form-control" type="text" placeholder="Ej. Los viajes de Ramona" required>
              </div>
              <div style="height: 10px;"></div>
              <label for="">Número de volumen: </label>
              <div class="input-group">
                <i style="width: 50px; color:#3c8dbc;" class="fa-solid fa-hashtag fa-2x"></i>
                <input onkeypress="return soloNumerosEnteros(event)"  type="number" min="1" id="noVolumenEditar" class="form-control" placeholder="Ej. 1" required>
              </div>
              <div style="height: 10px;"></div>
              <label for="">Sala: </label>
              <div class="input-group">
                <i style="width: 50px; color:#3c8dbc;" class="fa fa-door-closed fa-2x"></i>
                <select style="overflow-y: auto" aria-label="Selecciona la sala" class="form-select form-select-solid"
                  id="salaVolumenEditar" required>
                </select>
              </div>
              <div style="height: 10px;"></div>
              <label for="">Estante: </label>
              <div class="input-group">
                <i style="width: 50px; color:#3c8dbc;" class="bi bi-bookshelf fa-2x"></i>
                <select style="overflow-y: auto" aria-label="Selecciona el estante" class="form-select form-select-solid"
                  id="estanteVolumenEditar" required>
                </select>
              </div>
              <div style="height: 10px;"></div>
              <label for="">Librero: </label>
              <div class="input-group">
                <i style="width: 50px; color:#3c8dbc;" class="fa-solid fa-layer-group fa-2x"></i>
                <select style="overflow-y: auto" aria-label="Selecciona el librero" class="form-select form-select-solid"
                  id="libreroVolumenEditar" required>
                </select>
              </div>
              <div style="height: 10px;"></div>
              <label for="">Posición: </label>
              <div class="input-group">
                <i style="width: 50px; color:#3c8dbc;" class="fa fa-location-dot fa-2x"></i>
                <select style="overflow-y: auto" aria-label="Selecciona la posición" class="form-select form-select-solid"
                  id="posicionVolumenEditar" required>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i style="width: 35px;" class="fa-solid fa-bookmark"></i>Guardar</button>
          </div>
        </form>
      </div>
    </div>
</div>

<!-- ************************************************ MODALES UBICACIÓN ********************************************* -->
<!-- NUEVA UBICACIÓN -->
<div class="modal fade" id="crearUbicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#3c8dbc; color:white;">
        <h1 class="modal-title fs-5" style="text-align: center" id="exampleModalLabel">Nueva Ubicación</h1>
        <button type="button" id="cerrar_crearVolumen" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  id="form-crearUbicacion">
          <div class="form-group">
            <label for="">Sala: </label>
            <div class="input-group">
              <i style="width: 50px; color:#3c8dbc;" class="fa fa-door-closed fa-2x"></i>
              <input maxlength="100" id="salaUbicacionCrear" class="form-control" type="text" placeholder="Ej. Sala J" required>
            </div>
            <div style="height: 10px;"></div>
            <label for="">Estante: </label>
            <div class="input-group">
              <i style="width: 50px; color:#3c8dbc;" class="bi bi-bookshelf fa-2x"></i>
              <input maxlength="40" id="estanteUbicacionCrear" class="form-control" type="text" placeholder="Ej. Estante BY" required>
            </div>
            <div style="height: 10px;"></div>
            <label for="">Librero: </label>
            <div class="input-group">
              <i style="width: 50px; color:#3c8dbc;" class="fa-solid fa-layer-group fa-2x"></i>
              <input maxlength="20" id="libreroUbicacionCrear" class="form-control" type="text" placeholder="Ej. Lib-03" required>
            </div>
            <div style="height: 10px;"></div>
            <label for="">Posicion: </label>
            <div class="input-group">
              <i style="width: 50px; color:#3c8dbc;" class="fa fa-location-dot fa-2x"></i>
              <input maxlength="10" id="posicionUbicacionCrear" class="form-control" type="text" placeholder="Ej. G9" required>
            </div>            
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i style="width: 35px;" class="fa-solid fa-bookmark"></i>Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- EDITAR UBICACIÓN -->
<div class="modal fade" id="editarUbicación" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-weight: bold !important;" >Editar Ubicación</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form  id="form-editarUbicación" style="overflow: auto">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Sala: </label>
              <div class="input-group">
                <i style="width: 50px; color:#3c8dbc;" class="fa fa-door-closed fa-2x"></i>
                <input maxlength="100" id="salaUbicacionEditar" class="form-control" type="text" placeholder="Ej. Sala J" required>
              </div>
              <div style="height: 10px;"></div>
              <label for="">Estante: </label>
              <div class="input-group">
                <i style="width: 50px; color:#3c8dbc;" class="bi bi-bookshelf fa-2x"></i>
                <input maxlength="40" id="estanteUbicacionEditar" class="form-control" type="text" placeholder="Ej. Estante BY" required>
              </div>
              <div style="height: 10px;"></div>
              <label for="">Librero: </label>
              <div class="input-group">
                <i style="width: 50px; color:#3c8dbc;" class="fa-solid fa-layer-group fa-2x"></i>
                <input maxlength="20" id="libreroUbicacionEditar" class="form-control" type="text" placeholder="Ej. Lib-03" required>
              </div>
              <div style="height: 10px;"></div>
              <label for="">Posicion: </label>
              <div class="input-group">
                <i style="width: 50px; color:#3c8dbc;" class="fa fa-location-dot fa-2x"></i>
                <input maxlength="10" id="posicionUbicacionEditar" class="form-control" type="text" placeholder="Ej. G9" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i style="width: 35px;" class="fa-solid fa-bookmark"></i>Guardar</button>
          </div>
        </form>
      </div>
    </div>
</div>