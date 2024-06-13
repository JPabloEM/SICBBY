<!-- Modal -->
<div class="modal fade" id="modalformVoluntario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Datos del Voluntario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formVoluntario" name="formVoluntario" class="form-horizontal">
          <input type="hidden" id="idv" name="idv" value="">
          <p class="text-primary">Todos los campos son obligatorios.</p>
          <div class="form-row">
            <div class="form-group col-md-3">
              <div class="form-floating">
                <label for="tipo_identificacion">Tipo de Identificación</label>
                <select class="form-control" id="opciones" name="tipo_identificacion">
                  <option value="cedula">Cédula Nacional</option>
                  <option value="pasaporte">Pasaporte</option>
                  <option value="dimex">DIMEX</option>
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="txtIdentificacion">Identificación</label>
              <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" required="">
            </div>
            <div class="form-floating">
              <br>
              <!-- <input type="text" class="form-control bg-light border-0" id="identificacion_volunteer" name="identificacion_volunteer" placeholder="Identificacion" /> -->
              <button class="btn btn-primary w-100 py-3" id="verificarCedula" type="button" style="border-radius: 20px;">Consultar</button>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtNombre">Nombres</label>
              <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="" readonly value="">
            </div>
            <div class="form-group col-md-6">
              <label for="txtApellido">Apellidos</label>
              <input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" required="" readonly value="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtEmail">Email</label>
              <input type="email" class="form-control valid validEmail" id="txtEmail" name="txtEmail" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="txtDireccion">Direccion</label>
              <input type="text" class="form-control valid validText" id="txtDireccion" name="txtDireccion" required="">
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtOcupacion">Ocupacion</label>
              <input type="text" class="form-control valid validText" id="txtOcupacion" name="txtOcupacion" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="txtTelefono">Teléfono</label>
              <input type="number" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" required="" onkeypress="return controlTag(event);">
            </div>
          </div>

          <div class="form-row">
            <h6>
              <span class="text-primary">¡Atención!</span>
              Marque una opción
            </h6>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="voluntarioGeneral">
                <label for="voluntarioGeneral">Voluntario general</label>
              </div>
            </div>
            <br>
            <div class="form-group col-md-6">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="voluntarioEspecifico">
                <label for="voluntarioEspecifico">Voluntario por actividad específica</label>
                <br>
              </div>
            </div>


            <div id="opcionesActividad" style="display: none;">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="form-floating">
                    <label for="tipo_actividad">Tipo de Actividad</label>
                    <select class="form-control" id="tipo_actividad" name="tipo_actividad">
                      <option value="" disabled selected>Seleccione la actividad que quiere participar</option>
                      <option value="taller">Taller</option>
                      <option value="charla">Charla</option>
                      <option value="voluntariado">Voluntariado</option>
                    </select>
                  </div>

                </div>
                <div class="form-group col-md-6">
                  <div class="form-floating">
                  <label for="tipo_actividad">Nombre Actividad</label>
                    <select class="form-control" id="actividad_seleccionada" name="actividad_seleccionada">
                      <option value="" disabled selected>Seleccione una actividad</option>
                      <!-- Aquí se llenarán dinámicamente las opciones -->
                    </select>
                  </div>
                </div>
              </div>
              <!-- Campos ocultos para almacenar los valores -->
              <input type="hidden" id="voluntarioGeneralValue" name="voluntarioGeneralValue">
              <input type="hidden" id="actividadSeleccionadaValue" name="actividadSeleccionadaValue">
            </div>

          </div>


          <div class="form-row">
            <div class="col-12">
              <div class="form-floating">
                <label for="txtMensaje">¿Representa alguna organización? ¿Cuál?</label>
                <textarea class="form-control bg-light border-0" id="txtMensaje" name="txtMensaje" style="height: 100px"></textarea>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="exampleSelect1">Edad</label>
              <select class="form-control" id="txtEdad" name="txtEdad">
                <option value="">Edad</option>
                <?php
                for ($i = 10; $i <= 100; $i++) {
                  echo "<option value='$i'>$i </option>";
                }
                ?>
                required
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="exampleSelect1">Estado</label>
              <select class="form-control" id="listStatus" name="listStatus" required="">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
                <option value="Solicitud">Solicitud</option>
              </select>
            </div>
            <br>
          </div>

          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
            <br>
          </div>

        </form>

      </div>



    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalViewVoluntario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del Voluntario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Identificación:</td>
              <td id="celCedula"></td>
            </tr>
            <tr>
              <td>Nombre:</td>
              <td id="celNombre"></td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="celApellido"></td>
            </tr>
            <tr>
              <td>Email:</td>
              <td id="celEmail"></td>
            </tr>
            <tr>
              <td>Dirección:</td>
              <td id="celDireccion"></td>
            </tr>
            <tr>
              <td>Edad:</td>
              <td id="celEdad"></td>
            </tr>
            <tr>
              <td>Ocupación:</td>
              <td id="celOcupacion"></td>
            </tr>
            <tr>
              <td>Teléfono:</td>
              <td id="celTefono"></td>
            </tr>
            <tr>
              <td>¿Desea ser un voluntario permanente?</td>
              <td id="celGeneral"></td>
            </tr>
            <tr>
              <td>Actividad que quiere participar:</td>
              <td id="celActividad"></td>
            </tr>
            <tr>
              <td>¿Representa alguna organización? ¿Cuál?</td>
              <td id="celMensaje"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>