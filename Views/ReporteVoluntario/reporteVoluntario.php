<?php
headerAdmin($data);

?>
<div id="contentAjax"></div>
<main class="app-content">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-6 well">
        <h1><i class="fas fa-scroll"></i> Reporte</h1>
     
          <label>Desde:</label>
          <input class="form-control" id="fechaIni" name="fechaIni" type="date" required="">
          <br>
          <label>Hasta:</label>
          <input class="form-control" id="fechaFi" name="fechaFi" type="date" required="">
          <br>
          <button id="btnBuscar" class="btn btn-primary">Buscar</button>
        
<br><br>
      </div>
      <div class="tile">
        <div class="tile-body">

          <div class="table-responsive">



            <table class="table table-hover table-bordered" id="tableReporte">
              <thead>
                  <tr>
                  <th>ID</th>
                  <th>Identificacion</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Email</th>
                  <th>Direccion</th>
                  <th>Edad</th>
                    <th>Permanente</th>
                  <th>Actividad</th>
                  <th>Ocupacion</th>
                  <th>Telefono</th>
                  <th>Fecha inscripción</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?>