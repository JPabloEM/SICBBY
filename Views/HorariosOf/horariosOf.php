<?php
nav_info($data);
?>

<div class="container-fluid header-bg py-3 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container-title py-3">
    <h1 class="display-4 text-white mb-3 animated slideInDown">
      Horarios de Atención
    </h1>
    <nav aria-label="breadcrumb animated slideInDown">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a class="text-white" href="home">Inicio</a>
        </li>

        <li class="breadcrumb-item text-primary active" aria-current="page">
          Horarios de Atención
        </li>
      </ol>
    </nav>
  </div>
</div>
<!-- Page Header End -->

<!-- Visiting Hours Start -->
<div class="container-xxl bg-primary visiting-hours my-5 py-5 wow fadeInUp" data-wow-delay="0.1s">


  <div class="col-md-16 wow fadeIn" data-wow-delay="0.3s">
    <h1 class="display-6 text-white mb-5" style="text-align: center;">Horario de atención</h1>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <span>Lunes</span>
        <span>8:00AM - 5:00PM</span>
      </li>
      <li class="list-group-item">
        <span>Martes</span>
        <span>8:00AM - 5:00PM</span>
      </li>
      <li class="list-group-item">
        <span>Miércoles</span>
        <span>8:00AM - 5:00PM</span>
      </li>
      <li class="list-group-item">
        <span>Jueves</span>
        <span>8:00AM - 5:00PM</span>
      </li>
      <li class="list-group-item">
        <span>Viernes</span>
        <span>8:00AM - 5:00PM</span>
      </li>
      <li class="list-group-item">
        <span>Sábado</span>
        <span>Cerrado</span>
      </li>
      <li class="list-group-item">
        <span>Domingo</span>
        <span>Cerrado</span>
      </li>
    </ul>
  </div>



</div>

<?php

footer_info($data);
?>