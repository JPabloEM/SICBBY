<!-- Modal -->
<div class="modal fade" id="modalFormDocumentosP" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">AGREGAR DOCUMENTO PUBLICOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formDocumentoP" name="formDocumentoP" class="form-horizontal">
              <input type="hidden" id="idDocumentoP" name="idDocumentoP" value="">
              <input type="hidden" id="pdf_actual" name="pdf_actual" value="">
              <input type="hidden" id="pdf_remove" name="pdf_remove" value="0">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Nombre <span class="required">*</span></label>
                      <input class="form-control" id="txtNombreP" name="txtNombreP" type="text" placeholder="Nombre del documento" required="">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Descripción <span class="required">*</span></label>
                      <textarea class="form-control" id="txtDescripcionP" name="txtDescripcionP" rows="2" placeholder="Descripción del documento" required=""></textarea>
                    </div>

                    <div class="form-group">
                <label class="control-label">Fecha</label>

                <input class="form-control" id="txtFechaDocP" name="txtFechaDocP" type="date" required="">

              </div>


                    <div class="form-group">
                        <label for="exampleSelect1">Estado <span class="required">*</span></label>
                        <select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
                          <option value="1">Activo</option>
                          <option value="2">Inactivo</option>
                        </select>
                    </div>  
                </div>
                <div class="col-md-6">
                    <div class="photo">
                        <label for="pdf"></label>
                        <div class="prevPhoto docu">
                          <span class="delPhoto notBlock">X</span>
                          <label for="pdf"></label>
                          <div>
                            <img id="img" src="<?= media(); ?>/documents/uploads2/pdf-icon-1.jpg">
                          </div>
                        </div>
                        <div class="upimg">
                          <input type="file" name="pdf" id="pdf">
                        </div>
                        <div id="form_alert"></div>
                    </div>
                </div>
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

<!-- Modal -->
<div class="modal fade" id="modalViewDocumento" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del documento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>ID:</td>
              <td id="celId"></td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td id="celNombreP"></td>
            </tr>
            <tr>
              <td>Descripción:</td>
              <td id="celDescripcionP"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
            </tr>
            <tr>
              <td>Fecha:</td>
              <td id="celFechaDocP"></td>
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



<!-- <div id="contenedorBotonDescarga"></div> -->
