<?php
nav_info($data);
?>

<div class="container-fluid header-bg py-3 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container-title py-3">
    <h1 class="display-4 text-white mb-3 animated slideInDown">Donaciones</h1>
    <nav aria-label="breadcrumb animated slideInDown">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a class="text-white" href="home">Inicio</a>
        </li>
        <li class="breadcrumb-item text-primary active" aria-current="page">
          Donaciones
        </li>
      </ol>
    </nav>
  </div>
</div>
<!-- Page Header End -->


<!-- Donacion Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
          <img class="position-absolute w-100 h-100 pt-5 pe-5" src="Assets/Ptemplate/img/voluntariado1.webp" alt="" style="object-fit: cover;">
          <img class="position-absolute top-0 end-0 bg-white ps-2 pb-2" src="Assets/Ptemplate/img/donacion.webp"   alt=""
           >
        </div>
      </div>
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="h-100">
          <div class="d-inline-block rounded-pill text-primary py-1 px-3 mb-3">Donaciones</div>
          <h1 class="display-6 mb-3">¿Quieres saber como realizar una donación?</h1>
          <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
            <p class="text-dark mb-2">Las donaciones se gestionan de forma que las personas que deseen colaborar nos
              contacten por algún medio de contacto directo. </p>
            <span class="text-primary"> - Corredor Biólogico Bosques del Yaguarundi</span>
          </div>
          <h3 class="display-10 mb-2">¿Entonces, qué podría donar?</h3>
          <p class="mb-5"> 
              Solo se aceptan donaciones e insumos
              físicos o de coordinación para actividades y distribución de material.</p>
          <a class="btn btn-outline-primary py-2 px-3"  href="<?= base_url(); ?>/contactoV">
            Contáctanos
            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
              <i class="fa fa-arrow-right"></i>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Donacion End -->




<?php

footer_info($data);
?>