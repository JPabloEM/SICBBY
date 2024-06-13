<!-- Modal -->
<div class="modal fade" id="modalFormCharlas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Charla</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCharla" name="formCharla" class="form-horizontal">
          <input type="hidden" id="idCharla" name="idCharla" value="">
          <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>


          <div class="rom">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Nombre <span class="required">*</span></label>
                <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre de la Charla" required="">
              </div>
              <div class="form-group">
                <label class="control-label">Descripción <span class="required">*</span></label>
                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción de la charla" required=""></textarea>
              </div>

              <div class="form-group">
                <label class="control-label">Fecha</label>

                <input class="form-control" id="txtFecha" name="txtFecha" type="date" required="">

              </div>

              <div class="form-group">
                <label class="control-label">Hora</label>

                <input class="form-control" id="txtHora" name="txtHora" type="time" required="">
              </div>


              <div class="form-group">
                <label class="control-label">Lugar de la Charla <span class="required">*</span></label>
                <textarea class="form-control" id="txtLugar" name="txtLugar" rows="2" placeholder="Lugar de la Charla" required=""></textarea>
              </div>

              
              
              <div class="form-group">
                <label class="control-label">Capacidad</label>

                <input class="form-control" id="txtCapacidad" name="txtCapacidad" type="number" required="">
              </div>


              <div class="form-group">
                <label for="exampleSelect1">Estado <span class="required">*</span></label>
                <select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
              </div>

            </div>
<!-- 
            <div class="col-md-6">
              <div class="photo">
                <label for="foto">Foto (570x380)</label>
                <div class="prevPhoto act">
                  <span class="delPhoto notBlock">X</span>
                  <label for="foto"></label>
                  <div>
                    <img id="img" src="<?= media(); ?>/Assets/activities/uploads1/gallery_icon.jpg">
                  </div>
                </div>
                <div class="upimg">
                  <input type="file" name="foto" id="foto">
                </div>
                <div id="form_alert"></div>
              </div>

            </div> -->

          </div>
         
          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal ver datos del taller -->
<div class="modal fade" id="modalViewCharla" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la charla</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>ID:</td>
              <td id="charlaId"></td>
            </tr>
            <tr>
              <td>Nombre:</td>
              <td id="tNombre"></td>
            </tr>
            <tr>
              <td>Descripción:</td>
              <td id="tDescricion"></td>
            </tr>

            <tr>
              <td>Fecha:</td>
              <td id="tFecha"></td>
            </tr>

            <tr>
              <td>Hora:</td>
              <td id="tHora"></td>
            </tr>

            <tr>
              <td>Lugar:</td>
              <td id="tLugar"></td>
            </tr>

            <tr>
              <td>Capacidad:</td>
              <td id="tCapacidad"></td>
            </tr>

            <tr>
            <td>Estado:</td>
              <td id="tEstado"></td>
            </tr>

            <!-- <tr>
            <td>Foto:</td>
              <td id="imagenTaller"></td>
            </tr>
             -->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>