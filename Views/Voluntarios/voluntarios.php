<?php
headerAdmin($data);
getModal('modalVoluntario', $data);
?>
<div id="contentAjax"></div>
<main class="app-content">
  <div class="app-title">
  <h1><i class="fas fa-user-tag"></i> Voluntarios en solicitud</h1>
  <div>
  </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Inicio</a></li>
    </ul>
  </div>
  
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
          
            <table class="table table-hover table-bordered" id="tableVoluntarios">
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
                  <th>Fecha solicitud</th>
                  <th>Estado</th>
                  <th>Acciones</th>
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