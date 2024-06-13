<?php
nav_info($data);
$arrActividad = $data['tallerV'];
?>



<div class="container-fluid header-bg py-3 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container-title py-3">
    <h1 class="display-4 text-white mb-3 animated slideInDown">
      Talleres
    </h1>
    <nav aria-label="breadcrumb animated slideInDown">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a class="text-white" href="home">Inicio</a>
        </li>
        <li class="breadcrumb-item text-primary active" aria-current="page">
          Talleres
        </li>
      </ol>
    </nav>
  </div>
</div>

</head>


<section class="section section-xl">
  <div class="container">
    <div class="row row-50 justify-content-lg-between align-items-lg-center">
    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="img-border">
              <img class="img-fluid" src="Assets/Ptemplate/img/taller1.webp" alt="" />
            </div>
          </div>
      <div class="col-lg-6 col-xl-5">
        
          <div class="border-bottom border-primary rounded mb-2" style="text-align: justify; text-justify: inter-word;">
            <h3 class="text-center">¿Por qué es importante participar en talleres?</h3>
            <p class="text-opacity-80">
              Participar en los talleres dentro del corredor biológico es una oportunidad única para
              sumergirse en el mundo natural que nos rodea y aprender cómo podemos contribuir a su
              conservación.
              Estos talleres no solo ofrecen conocimientos sobre la biodiversidad y los ecosistemas
              locales,
              sino que también nos permiten conectar con la comunidad y con expertos en el campo.
            </p>
          </div>
          <p class="text-opacity-80" style="text-align: justify; text-justify: inter-word;">
            Además, para participar, simplemente haz clic en
            el botón "Inscríbete como voluntario" y completa el formulario con tus datos.
            <strong> <span class="text-primary">
                ¡Esperamos verte pronto en nuestros talleres!
              </span></strong>
          </p>
          
           <a class="btn btn-outline-primary py-2 px-2"  href="<?= base_url(); ?>/voluntario">
           Inscríbete como voluntario
            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
              <i class="fa fa-arrow-right"></i>
            </div>
          </a>
        </div>
       
      </div>
    </div>
  </div>
</section>


<div class="container-fluid service py-6">
  <div class="container">
    <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
      <small
        class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Actividades</small>
      <h1 class="display-5 mb-5">Talleres disponibles</h1>
    </div>
    </div>
    <div class="row g-4 justify-content-center">

    <?php
      for ($p = 0; $p < count($arrActividad); $p++) {
        // $rutaVoluntario= $arrVoluntarios[$p]['ruta']; 
        ?>
<div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
  <div class="bg-light rounded service-item shadow">
    <div class="service-content d-flex flex-column align-items-center justify-content-center p-4">
      <div class="service-content-icon text-center">
        <img src="Assets/Ptemplate/img/icon/taller.webp" width='60px' height='60px' alt="Taller" class="text-primary mb-4">

        <h4 class="mb-3"><?= $arrActividad[$p]['nombre'] ?></h4>
        <p class="mb-4"><?= $arrActividad[$p]['descripcion'] ?></p>

        <div class="d-flex flex-wrap justify-content-center align-items-center mb-4">
          <div class="mr-3">
            <p class="mb-0"><i class="far fa-calendar-alt mr-1.5"></i><?= $arrActividad[$p]['fechaTaller']; ?></p>
            <p class="mb-0"><i class="fas fa-clock mr-1.5"></i><?= $arrActividad[$p]['horaTaller']; ?></p>
          </div>
          <div>
            <p class="mb-0"><i class="fas fa-users mr-1.5"></i><?= $arrActividad[$p]['capacidad']; ?></p>
            <p class="mb-0"><i class="fas fa-map-marker-alt mr-1.5"></i><?= $arrActividad[$p]['lugar']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      <?php } ?>
    </div>
  
</div>
<!-- Service End -->


<script src="Assets/Ptemplate/js/functions.js"></script>


<?php

footer_info($data);
?>