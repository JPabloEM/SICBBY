<?php
nav_info($data);
?>

<!-- Cabecera-->
<div class="container-fluid header-bg py-3 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container-title lg-5">
    <h1 class="display-4 text-white mb-3 animated slideInDown">
      Voluntarios
    </h1>
    <nav aria-label="breadcrumb animated slideInDown">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a class="text-white" href="home">Inicio</a>
        </li>
        <li class="breadcrumb-item text-primary active" aria-current="page">
          Voluntarios
        </li>
      </ol>
    </nav>
  </div>
</div>
<!-- fin-->



<!-- Volunteer Start -->
<section class="bg0 p-t-104 p-b-116">
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5">

        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
          <p><span class="text-primary me-2"></span>Voluntarios</p>
          <h1 class="display-5 mb-4">¿Quieres ser parte de nuestro Corredor? ¡Inscríbete Ahora!</h1>


          <form id="formVoluntario">
            <div class="row g-3">
              <h4 class="mtext-105 cl2 txt-center p-b-30">
                Formulario
              </h4>














              <div class="col-md-12">
                <div class="form-floating">
                  <select class="form-select bg-light border-0" id="opciones" name="tipo_identificacion">
                    <option value="cedula">Cédula Nacional</option>
                    <option value="pasaporte">Pasaporte</option>
                    <option value="dimex">DIMEX</option>
                  </select>
                  <label for="tipo_identificacion">Tipo de Identificación</label>
                </div>
              </div>









              <!-- <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" id="identificacion_volunteer" name="identificacion_volunteer" placeholder="Identificacion" />
                  <label for="identificacion_volunteer">Identificación</label>
                </div>
              </div> -->


              <div class="col-md-8">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" id="identificacion_volunteer" name="identificacion_volunteer" placeholder="Identificacion" />
                  <!-- <button class="btn btn-primary" id="verificarCedula" type="button">Verificar</button> -->
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <!-- <input type="text" class="form-control bg-light border-0" id="identificacion_volunteer" name="identificacion_volunteer" placeholder="Identificacion" /> -->
                  <button class="btn btn-primary w-100 py-3" id="verificarCedula" type="button" style="border-radius: 20px;">Consultar</button>
                </div>
              </div>


              <!-- <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" id="frist_name_volunteer" name="frist_name_volunteer" placeholder="Nombre" />
                  <label for="frist_name_volunteer">Nombre</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" id="last_name_volunteer" name="last_name_volunteer" placeholder="Apellido" />
                  <label for="last_name_volunteer">Apellido</label>
                </div>
              </div> -->



              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" id="frist_name_volunteer" name="frist_name_volunteer" placeholder="Nombre" readonly value="" />
                  <label for=" frist_name_volunteer">Nombre</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" id="last_name_volunteer" name="last_name_volunteer" placeholder="Apellido" readonly value="" />
                  <label for="last_name_volunteer">Apellido</label>
                </div>
              </div>



              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" id="email" name="email" placeholder="Correo" />
                  <label for="emailV">Correo Electrónico</label>
                </div>
              </div>

              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" id="address_volunteer" name="address_volunteer" placeholder="Direccion" />
                  <label for="address_volunteer">Dirección</label>
                </div>
              </div>


              <div class="col-12">
                <div class="form-floating">
                  <select class="form-select" id="age_volunteer" name="age_volunteer">
                    <option value="">Edad</option>
                    <?php
                    for ($i = 10; $i <= 100; $i++) {
                      echo "<option value='$i'>$i </option>";
                    }
                    ?>
                  </select>
                  <label for="age_volunteer">Selecciona tu edad</label>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" id="ocupation_volunteer" name="ocupation_volunteer" placeholder="Ocupacion" />
                  <label for="ocupation_volunteer">Ocupación</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-floating">
                  <input type="number" class="form-control bg-light border-0" id="phone_number_volunteer" name="phone_number_volunteer" placeholder="Telefono" />
                  <label for="phone_number_volunteer">Teléfono</label>
                </div>
              </div>

              <h6>
                <span class="text-primary">¡Atención!</span>
                Marque la opción que necesite
              </h6>

              <div class="col-md-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="voluntarioGeneral">
                  <label for="voluntarioGeneral">Quiero ser voluntario general</label>
                  <i class="fas fa-question" id="iconoGeneral" title="Haz clic aquí para obtener más información sobre: qué es ser voluntario general" style="color:var(--primary);
                  cursor: pointer; font-size: 15px;"></i>
                </div>
              </div>
              <br>
              <div class="col-md-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="voluntarioEspecifico">
                  <label for="voluntarioEspecifico">Quiero ser voluntario por actividad específica</label>
                   <i class="fas fa-question" id="iconoEspecifico" title="Haz clic aquí para obtener más información sobre: qué es ser voluntario por actividad específica" style="color: var(--primary); cursor: pointer; font-size: 15px;" ></i>

                  <br>
                </div>
              </div>
              <br><br><br>
              <div id="opcionesActividad" style="display: none;">
                <div class="col-md-12">
                  <div class="form-floating">

                    <select class="form-select bg-light border-0" id="tipo_actividad" name="tipo_actividad">
                      <option value="" disabled selected>Seleccione la actividad que quiere participar</option>
                      <option value="taller">Taller</option>
                      <option value="charla">Charla</option>
                      <option value="voluntariado">Voluntariado</option>

                    </select>
                    <label for="tipo_actividad">Tipo de Actividad</label>
                  </div>

                </div>
                <br>
               
                  <!-- Cambiar este div por un select -->
                  <select class="form-select bg-light border-0" id="actividad_seleccionada" name="actividad_seleccionada">
                    <option value="" disabled selected>Seleccione una actividad</option>
                    <!-- Aquí se llenarán dinámicamente las opciones -->
                  </select>
               
              </div>
              <!-- Campos ocultos para almacenar los valores -->
              <input type="hidden" id="voluntarioGeneralValue" name="voluntarioGeneralValue">
              <input type="hidden" id="actividadSeleccionadaValue" name="actividadSeleccionadaValue">

              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control bg-light border-0" placeholder="Leave a message here" id="mensaje" name="mensaje" style="height: 100px"></textarea>
                  <label for="mensaje">¿Representa alguna organización? ¿Cuál?</label>
                </div>
              </div>

              <div class="accordion-item2">
                <h2 class="accordion-header" id="headingTwo2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                    <h5 class="text-primary"> Términos y condiciones</h5>
                  </button>
                </h2>

                <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo2" data-bs-parent="#accordionExample">
                  <div class="accordion-body" style="text-align: justify;">
                  Al proporcionar tus datos personales a través de este formulario, aceptas que los mismos sean recopilados y procesados exclusivamente para los fines específicos indicados en el formulario relacionados con actividades voluntarias en el corredor biológico. Nos comprometemos a utilizar tus datos de manera confidencial y segura, cumpliendo con las leyes de protección de datos correspondientes. Reconocemos y respetamos tus derechos sobre tus datos personales, incluyendo el acceso, corrección o eliminación de los mismo. Para ejercer estos derechos, por favor contáctanos según las indicaciones proporcionadas. Tu privacidad es importante para nosotros y tomamos todas las medidas necesarias para proteger tus datos personales.
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="termsCheckbox">
                  <label class="form-check-label" for="termsCheckbox">
                    Acepto los términos y condiciones
                  </label>
                </div>
              </div>

              <div class="col-12">
                <button type="submit" id="submitButton" class="btn btn-primary w-100 py-3" disabled>
                  Inscribirse
                </button>
              </div>

            </div>
          </form>
        </div>

        <div class="col-lg-6">

          <div class="volunteer-section" id="accordionSection" style="width: 100%;">


            <div class="row">
              <div class="accordion">

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <h2 class="text-primary">¿En cuáles actividades participarías junto al Corredor Biológico?</h2>
                    </button>
                  </h2>

                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body" style="text-align: justify;">
                      Las principales actividades que se realizan en el corredor son la restauración de hábitats,
                      monitoreo de especies, educación ambiental y siembra de vegetación nativa.
                    </div>
                  </div>
                </div>

              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h2 class="text-primary"> ¿Por qué debo ser voluntario?</h2>
                  </button>
                </h2>

                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body" style="text-align: justify;">
                    El voluntariado en estos espacios es crucial para su conservación, ya que,
                    involucra labores de restauración, monitoreo de especies, educación ambiental y sensibilización
                    comunitaria.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <h2 class="text-primary"> ¿Qué pasa si me inscribo? </h2>
                  </button>
                </h2>

                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body" style="text-align: justify;">
                    Al participar, se contribuye a preservar la biodiversidad, se promueve la conciencia sobre la
                    importancia de estos
                    sitios y se colabora en la mitigación del impacto humano en el medio ambiente, fortaleciendo la
                    sostenibilidad y el bienestar tanto de la naturaleza como de las comunidades locales.
                  </div>
                </div>

              </div>
            </div>
          </div>


        </div>


      </div>

    </div>
  </div>
  </div>

</section>












<?php

footer_info($data);
?>