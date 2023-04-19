<!-- ************************************************** CUERPO ******************************************** -->
  <section class="u-clearfix u-palette-4-light-2 u-section-1" id="carousel_02fc">
      <div class="u-tabs u-tabs-1">
        <!-- PESTAÑAS -->
        <ul class="u-tab-list u-unstyled u-tab-list-1" role="tablist">
          <li class="u-tab-item" role="presentation">
            <a style="text-decoration: none;" class="u-text-hover-white active u-active-palette-1-light-1 u-button-style u-custom-font u-font-ubuntu u-tab-link u-tab-link-1" id="link-admin_volumenes" href="#admin_volumenes" role="tab" aria-controls="admin_volumenes" aria-selected="true">Administrar Volúmenes</a>
          </li>
          <li class="u-tab-item" role="presentation">
            <a style="text-decoration: none;" class="u-text-hover-white u-active-palette-1-light-1 u-button-style u-custom-font u-font-ubuntu u-tab-link u-tab-link-2" id="link-tab-14b7" href="#tab-14b7" role="tab" aria-controls="tab-14b7" aria-selected="false">Administrar Ubicaciones</a>
          </li>
        </ul>

        <!-- ADMINISTRAR LIBROS -->
        <div class="u-tab-content">
          <div class="u-align-left u-container-style u-palette-4-light-3 u-tab-active u-tab-pane u-tab-pane-1" id="admin_volumenes" role="tabpanel" aria-labelledby="link-admin_volumenes">
            <div class="u-container-layout u-container-layout-2">
              <div class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-xl u-expanded-width-xs u-group u-shape-rectangle u-white u-group-2">
                <blockquote class="u-align-right u-hover-feature u-text u-text-default u-text-palette-1-dark-1 u-text-2">Filtros</blockquote>
                <!-- FILTROS -->
                <div class="u-container-layout u-container-layout-3">
                  <div class="u-form u-form-1">
                    <form style="padding: 10px;"></form>
                    <div class="u-form-date u-form-group u-form-group-1">
                      <label for="date-82e4" class="u-label u-label-1">Sala:</label>
                      <div class="u-form-select-wrapper">
                        <select id="filtro_sala" name="filtro_sala" class="u-border-2 u-border-palette-4-light-2 u-custom-font u-font-lato u-input u-input-rectangle u-white u-input-3">
                          <option value="Seleccionar">Seleccionar</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                      </div>
                    </div>
                  </div>
                  <div class="u-form u-form-2">
                    <form style="padding: 10px;"></form>
                    <div class="u-form-date u-form-group u-form-group-2">
                      <label for="date-82e4" class="u-label u-label-2">Estante:</label>
                      <div class="u-form-select-wrapper">
                        <select id="filtro_estante" name="filtro_estante" class="u-border-2 u-border-palette-4-light-2 u-custom-font u-font-lato u-input u-input-rectangle u-white u-input-3">
                          <option value="Seleccionar">Selecciona la sala</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                      </div>
                    </div>
                  </div>
                  <div class="u-form u-form-3">
                    <form style="padding: 10px;"></form>
                    <div class="u-form-group u-form-select u-form-group-3">
                      <label for="select-f5f5" class="u-label u-label-3">Librero:</label>
                      <div class="u-form-select-wrapper">
                        <select id="filtro_librero" name="filtro_librero" class="u-border-2 u-border-palette-4-light-2 u-custom-font u-font-lato u-input u-input-rectangle u-white u-input-3">
                          <option value="Seleccionar">Selecciona el estante</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                      </div>
                    </div>
                  </div>        
                  <a id="btn_nuevo_volumen" data-bs-toggle="modal" data-bs-target="#crearVolumen" class="u-active-palette-1-light-1 u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-dark-1 u-palette-1-light-1 u-radius-4 u-text-body-alt-color u-btn-1">Nuevo volumen</a>
                </div>
              </div>
              <!-- TABLA -->
              <div class="u-container-style u-group u-white u-group-3">
                <div class="u-container-layout u-container-layout-4" style="padding-bottom:10px; padding-right:10px !important;">
                  <div class=" u-table u-table-responsive u-table-1" style="overflow: auto; padding-right:20px !important; padding-left:20px !important; padding-bottom:10px !important;">
                    <table class="u-table-entity display table table-hover text-nowrap" style="width:100%" id="tabla_volumenes">
                      <thead class="u-align-center u-custom-font u-table-header u-text-font u-text-palette-1-base u-table-header-1">
                        <tr style="height: 54px;">
                          <th style="text-align: center;" class="u-table-cell">Acciones</th>
                          <th style="text-align: center;" class="u-table-cell">ID</th>
                          <th style="text-align: center;" class="u-table-cell">Título del volumen</th>
                          <th style="text-align: center;" class="u-table-cell">No. Volumen</th>
                          <th style="text-align: center;" class="u-table-cell">Codigo ubicacion</th>
                          <th style="text-align: center;" class="u-table-cell">Sala</th>
                          <th style="text-align: center;" class="u-table-cell">Estante</th>
                          <th style="text-align: center;" class="u-table-cell">Librero</th>
                          <th style="text-align: center;" class="u-table-cell">Posición</th>
                        </tr>
                      </thead>
                      <tbody class="u-align-justify u-custom-font u-font-lato u-table-body u-table-body-1">
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="9"></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- ADMINISTRAR UBICACIONES -->
            <div class="u-align-left u-container-style u-palette-4-light-3 u-tab-pane u-tab-pane-2" id="tab-14b7" role="tabpanel" aria-labelledby="link-tab-14b7">
            <div class="u-container-layout u-container-layout-2">
              <div class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-xl u-expanded-width-xs u-group u-shape-rectangle u-white u-group-2">
                <!-- NUEVA UBICACIÓN -->
                <blockquote class="u-align-right u-hover-feature u-text u-text-default u-text-palette-1-dark-1 u-text-2">Agregar Uibicación</blockquote>
                <div class="u-container-layout u-container-layout-5">  
                  <a id="btn_nuevo_ubicacion" data-bs-toggle="modal" data-bs-target="#crearUbicacion" class="u-active-palette-1-light-1 u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-dark-1 u-palette-1-light-1 u-radius-4 u-text-body-alt-color u-btn-3">Nueva ubicación</a>
                </div>
              </div>
              <!-- TABLA -->
              <div class="u-container-style u-group u-white u-group-3">
                <div class="u-container-layout u-container-layout-4" style="padding-bottom:10px; padding-right:10px !important;">
                  <div class=" u-table u-table-responsive u-table-1" style="overflow: auto; padding-right:20px !important; padding-left:20px !important; padding-bottom:10px !important;">
                    <table class="u-table-entity display table table-hover text-nowrap" style="width:100%" id="tabla_ubicacion">
                      <thead class="u-align-center u-custom-font u-table-header u-text-font u-text-palette-1-base u-table-header-1">
                        <tr style="height: 54px;">
                          <th style="text-align: center;" class="u-table-cell">Acciones</th>
                          <th style="text-align: center;" class="u-table-cell">ID</th>
                          <th style="text-align: center;" class="u-table-cell">Sala</th>
                          <th style="text-align: center;" class="u-table-cell">Estante</th>
                          <th style="text-align: center;" class="u-table-cell">Librero</th>
                          <th style="text-align: center;" class="u-table-cell">Posición</th>
                        </tr>
                      </thead>
                      <tbody class="u-align-justify u-custom-font u-font-lato u-table-body u-table-body-1">
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="6"></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>

        </div>
      </div>

      <!-- NOMBRE DE LA SECCIÓN -->
      <div class="u-container-style u-expanded-width u-group u-palette-1-light-1 u-group-1">
        <div class="u-container-layout u-container-layout-1">
          <h5 style="text-align: left !important;" class="u-text u-text-body-alt-color u-text-default u-text-1"><span style="margin-right: 6px" class="fa-solid fa-magnifying-glass-location"></span>&nbsp;índice de libros
          </h5>
        </div>
      </div>
  </section>