<?php
nav_info($data);
?>


<!-- Page Header Start -->
<div class="container-fluid header-bg py-3 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container-title py-3">
    <h1 class="display-4 text-white mb-3 animated slideInDown">
      Contacto
    </h1>
    <nav aria-label="breadcrumb animated slideInDown">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a class="text-white" href="home">Inicio</a>
        </li>

        <li class="breadcrumb-item text-primary active" aria-current="page">
          Contacto
        </li>
      </ol>
    </nav>
  </div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-4 mb-5">
      <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="h-100 bg-light d-flex align-items-center p-5">
          <div class="btn-lg-square  flex-shrink-0">
            <i class="fa fa-map-marker-alt text-primary"></i>
          </div>
          <div class="ms-4">
            <p class="mb-2">
              <span class="text-primary me-2"></span>Dirección
            </p>
            <h5 class="mb-0">Nicoya, Guanacaste,</h5>
            <h5 class="mb-0">Costa Rica</h5>

          </div>
        </div>
      </div>
      <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
        <div class="h-100 bg-light d-flex align-items-center p-2">
          <div class="btn-lg-square  flex-shrink-0">
            <i class="fa fa-phone-alt text-primary"></i>
          </div>
          <div class="ms-4">
            <p class="mb-2">
              <span class="text-primary me-2"></span>Llámanos
            </p>
            <h5 class="mb-4">2686-6760</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.5s">
        <div class="h-100 bg-light d-flex align-items-center p-5">
          <div class="btn-lg-square  flex-shrink-0">
            <i class="fa fa-envelope-open text-primary"></i>
          </div>
          <div class="ms-4">
            <p class="mb-2">
              <span class="text-primary me-2"></span>Nuestro correo
            </p>
            <h5 class="mb-0">infocbby@gmail.com</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="row g-5">
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
        <p><span class="text-primary me-2"></span>Contáctanos directo</p>
        <h1 class="display-5 mb-2">¿Tienes alguna pregunta o sugerencia?</h1>
        <h3 class="display-10 mb-4">¡Puedes contactarnos!</h3>
        <p class="mb-4">
         Rellena este formulario con tus datos así te solucionaremos las preguntas o sugerencias que tengas.
        </p>
        <form id="frmContacto">
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control bg-light border-0" id="nombreContacto" name="nombreContacto" placeholder="Nombre" />
                <label for="nombre">Nombre</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="email" class="form-control bg-light border-0" id="emailContacto" name="emailContacto" placeholder="Correo" />
                <label for="email">Correo</label>
              </div>
            </div>            
            <div class="col-12">
              <div class="form-floating">
                <textarea class="form-control bg-light border-0" placeholder="Escribe tu mensaje aquí" id="mensaje" name="mensaje"
                  style="height: 100px"></textarea>
                <label for="mensaje">Pregunta o sugerencia</label>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100 py-3" type="submit" id="submitButton">
               Enviar
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="h-100" style="min-height: 400px">
          <iframe class="rounded w-100 h-100"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d777.2829148473644!2d-85.45188335520679!3d10.151826739991172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f9fb707a6c7181d%3A0xc102fabd6f646b63!2sMinae%20Sinac%20Subregi%C3%B3n%20Nicoya!5e1!3m2!1ses-419!2scr!4v1713561208051!5m2!1ses-419!2scr"
            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>


<?php

footer_info($data);
?>