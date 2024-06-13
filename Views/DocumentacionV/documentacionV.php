<?php
nav_info($data);
$arrDocV = $data['DocumentacionV'];
?>

<div class="container-fluid header-bg py-3 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container-title py-3">
    <h1 class="display-4 text-white mb-3 animated slideInDown">
      Documentación
    </h1>
    <nav aria-label="breadcrumb animated slideInDown">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a class="text-white" href="home">Inicio</a>
        </li>
        <li class="breadcrumb-item text-primary active" aria-current="page">
          Documentación
        </li>
      </ol>
    </nav>
  </div>
</div>



<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="pt-5" id="manager">

  <div class="container">
    <div class="row">
      <div class="col-lg-6"><img class="img-fluid" src="Assets/Ptemplate/img/documentacion.webp" alt="" /></div>
      <div class="col-lg-6">
        <h5 class="display-6 mb-3 text-primary">Documentación</h5>
        <p class="mb-4 fw-medium text-secondary" style="text-align: justify;">
          La publicación de documentos públicos es esencial para la transparencia y la rendición de cuentas en el Corredor Biológico Bosques del Yaguarundi.
          Con el fin de fomentar la igualdad de acceso a la información y una reputación sólida del Corredor.
        </p>
        <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="Assets/Ptemplate/img/icon/check.webp"
            width="35" alt="tick" />
          <p class="fw-medium mb-0 text-secondary">Transparencia</p>
        </div>
        <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="Assets/Ptemplate/img/icon/check.webp"
            width="35" alt="tick" />
          <p class="fw-medium mb-0 text-secondary">Comunicación efectiva</p>
        </div>
        <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="Assets/Ptemplate/img/icon/check.webp"
            width="35" alt="tick" />
          <p class="fw-medium mb-0 text-secondary">Acceso equitativo</p>
        </div>
      </div>
    </div>
  </div><!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->

<div class="container-fluid service py-6">
  <div class="container">
    <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
      <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Documentos</small>
      <h1 class="display-5 mb-5">Documentos disponibles</h1>
    </div>
  </div>
  <div class="row g-4 justify-content-center"> <!-- Añadida la clase justify-content-center -->
    <?php
    for ($p = 0; $p < count($arrDocV); $p++) {
      ?>
      <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
        <div class="bg-light rounded service-item">
          <div class="service-content d-flex align-items-center justify-content-center p-4">
            <div class="service-content-icon text-center">
              <img src="Assets/Ptemplate/img/icon/doc.webp" width='60px' height='60px' alt="Taller" class="text-primary mb-4">

              <h4 class="mb-3">
                <?= $arrDocV[$p]['nombreP'] ?>
              </h4>
              <p class="mb-4">
                <?= $arrDocV[$p]['descripcionP'] ?>
              </p>
              <p class="mb-4"> <i class="far fa-calendar-alt mr-1.5"></i>
                <?= $arrDocV[$p]['fechaDocP']; ?>
              </p>

              <button onClick="downloadPDFP('<?= $arrDocV[$p]['id_documentoP']; ?>')" class="btn btn-primary">
              Descargar
            </button>

            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>




<script src="Assets/js/function_Dowload.js"></script>


<?php

footer_info($data);
?>