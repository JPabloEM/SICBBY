<?php
nav_info($data);
$arrCharla = $data['charlasI'];
getModalInfo('modalCharlasInfo', $data);
?>

<div class="container-fluid header-bg py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container-title py-5">
    <h1 class="display-4 text-white mb-3 animated slideInDown">
      Charlas
    </h1>
    <nav aria-label="breadcrumb animated slideInDown">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a class="text-white" href="home">Home</a>
        </li>
        <li class="breadcrumb-item text-primary active" aria-current="page">
          Charla
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
          <img class="img-fluid" src="Assets/Ptemplate/img/charla1.jpg" alt="" />
        </div>
      </div>
      <div class="col-lg-6 col-xl-5">
        <div class="innset-xl-left-70">
          <h3>¿Por qué es importante participar en charlas?</h3>
          <p class="text-opacity-80">
            En esta página, es importante tener información sobre por qué es importante de
            participar en las actividades de charlas. Si estás interesado en participar,
            aquí se puede encontrar esa información sobre cómo puedes participar, por ende,
            acá irá en las actividades que se publiquen de charlas y la información de esta actividad.

          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="text-center wow bounceInUp" data-wow-delay="0.1s">
  <small
    class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Actividades</small>
  <h1 class="display-5 mb-5">Charlas disponibles</h1>
</div>

<section class="bg0 p-t-104 p-b-116">
  <div class="container">
    <?php
    for ($p = 0; $p < count($arrCharla); $p++) {
      ?>
      <div class="card">
        <div class="mb-3">
          <img src="Assets/Ptemplate/img/charla.png" alt="Taller" class="text-primary mb-4">
          <h3 class="mb-3">
            <strong>
              <?= $arrCharla[$p]['nombre'] ?>
            </strong>
          </h3>
        </div>
        <div class="card-content ">
          <i class="fas fa-map-marker-alt mr-1.5"></i>
          <?= $arrCharla[$p]['lugar']; ?>
          </span>
          <div class="h4 card-title">
            <?= $arrCharla[$p]['descripcion'] ?>
          </div>
        </div>
        <div>
          <button class="ver-mas-btn" type="button" data-id="<?= $arrCharla[$p]['idcharla'] ?>" data-toggle="modal"
            data-target="#charlaModal">Ver más</button>
        </div>
      </div>
    <?php } ?>
  </div>
</section>

<script src="Assets/js/functions_charlasInfo.js"></script>

<?php
footer_info($data);
?>