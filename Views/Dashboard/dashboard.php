<?php headerAdmin($data); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i><?= $data['page_title'] ?></h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Inicio</a></li>
    </ul>
  </div>

  <?php if (!empty($_SESSION['permisos'][1]['r'])) { ?>

    <div class="row">
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-50">
          <div class="icon purple" style="background-color: #03505a;">
            <a href="<?= base_url() ?>/usuarios" class="linkw"><i class="fa fa-users"></i></a>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Registro Usuarios</h3>
            <p class="">Cantidad:
              <span class="text-sm text-warning"><b><?= $data['usuarios'] ?></b></span>
            </p>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-50">
          <div class="icon purple" style="background-color: #03505a;">
            <a href="<?= base_url() ?>/voluntarios" class="linkw"><i class="fa fa-male"></i></a>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Voluntarios en solicitud</h3>
            <p class="">Cantidad:
              <span class="text-sm text-warning"><b><?= $data['voluntariossolicitud'] ?></b></span>
            </p>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-50">
          <div class="icon purple" style="background-color: #03505a;">
            <a href="<?= base_url() ?>/voluntarioschk" class="linkw"><i class="fa fa-child"></i></a>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Voluntarios anotados</h3>
            <p class="">Cantidad:
              <span class="text-sm text-warning"><b><?= $data['voluntarios'] ?></b></span>
            </p>
          </div>
        </div>
      </div>


      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-50">
          <div class="icon purple" style="background-color: #03505a;">
            <a href="<?= base_url() ?>/actividades" class="linkw"><i class="fas fa-book-open"></i></a>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Registro Talleres</h3>
            <p class="">Cantidad:
              <span class="text-sm text-warning"><b><?= $data['actividades'] ?></b></span>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">


      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-50">
          <div class="icon purple" style="background-color: #03505a;">
            <a href="<?= base_url() ?>/charlas" class="linkw"><i class="fas fa-chalkboard-teacher"></i></a>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Registro Charlas</h3>
            <p class="">Cantidad:
              <span class="text-sm text-warning"><b><?= $data['charlas'] ?></b></span>
            </p>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-50">
          <div class="icon purple" style="background-color: #03505a;">
            <a href="<?= base_url() ?>/voluntariados" class="linkw"><i class="fas fa-seedling"></i></a>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Registro Voluntariados</h3>
            <p class="">Cantidad:
              <span class="text-sm text-warning"><b><?= $data['voluntariados'] ?></b></span>
            </p>
          </div>
        </div>
      </div>


      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-50">
          <div class="icon purple" style="background-color: #03505a;">
            <a href="<?= base_url() ?>/documentos" class="linkw"><i class="fas fa-file-import"></i></a>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Documentos Internos</h3>
            <p class="">Cantidad:
              <span class="text-sm text-warning"><b><?= $data['documentos'] ?></b></span>
            </p>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-50">
          <div class="icon purple" style="background-color: #03505a;">
            <a href="<?= base_url() ?>/documentosP" class="linkw"><i class="fas fa-file-export"></i></a>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Documentos Públicos</h3>
            <p class="">Cantidad:
              <span class="text-sm text-warning"><b><?= $data['documentosp'] ?></b></span>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-50">
          <div class="icon purple" style="background-color: #03505a;">
            <a href="<?= base_url() ?>/contactos" class="linkw"><i class="fas fa-solid fas fa-envelope"></i></a>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Bandeja de mensajes</h3>
            <p class="">Cantidad:
              <span class="text-sm text-warning"><b><?= $data['contacto'] ?></b></span>
            </p>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>







</main>
<?php footerAdmin($data); ?>

<script>


</script>