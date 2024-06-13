<?php
headerAdmin($data);
getModal('modalMensajes', $data);
?>
<main class="app-content">
  <div class="app-title">
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <h1><i class="fas fa-user-tag"></i> Lista de mensajes</h1>
            <table class="table table-hover table-bordered" id="tableMensaje">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Mensaje</th>
                  <th>Fecha de mensaje</th>
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