document.addEventListener("DOMContentLoaded", function () {
  let termsCheckbox = document.querySelector("#termsCheckbox");
  let submitButton = document.querySelector("#submitButton");
  let formVoluntario = document.querySelector("#formVoluntario");
  let verificarButton = document.querySelector("#verificarCedula");
  let fristNameInput = document.querySelector("#frist_name_volunteer");
  let lastNameInput = document.querySelector("#last_name_volunteer");
  let tipoIdentificacionSelect = document.querySelector("#opciones");
  let tipoActividad = document.querySelector("#tipo_actividad"); // Obtener el elemento con ID "opciones"
  let contenedorActividad = document.querySelector("#actividad_seleccionada");

  let iconoGeneral = document.getElementById("iconoGeneral");
  let iconoEspecifico = document.getElementById("iconoEspecifico");
  
  var voluntarioGeneralValue = document.getElementById('voluntarioGeneralValue');

  // Obtener el select de actividad seleccionada
  var actividadSeleccionadaSelect = document.getElementById('actividad_seleccionada');
  var actividadSeleccionadaValue = document.getElementById('actividadSeleccionadaValue');

  const voluntarioGeneralCheckbox = document.querySelector('#voluntarioGeneral');
  const voluntarioEspecificoCheckbox = document.querySelector('#voluntarioEspecifico');

  // const actividadSelect = document.querySelector('#actividad_seleccionada');





  termsCheckbox.addEventListener("change", function () {
    submitButton.disabled = !this.checked;
  });

  tipoIdentificacionSelect.addEventListener("change", function () {
    if (this.value === "cedula") {
      verificarButton.style.display = "block";
      fristNameInput.readOnly = true;
      lastNameInput.readOnly = true;
    } else {
      verificarButton.style.display = "none";
      fristNameInput.readOnly = false;
      lastNameInput.readOnly = false;
    }
  });

  verificarButton.addEventListener("click", function () {
    let identificacionVolunteer = document.querySelector(
      "#identificacion_volunteer"
    ).value;
    let tipoIdentificacion = tipoIdentificacionSelect.value;

    if (tipoIdentificacion === "cedula") {
      const url = `https://apis.gometa.org/cedulas/${identificacionVolunteer}`;

      fetch(url)
        .then((response) => {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error("Error al verificar la cédula");
          }
        })
        .then((data) => {
          if (
            data.results &&
            data.results.length > 0 &&
            data.results[0].firstname
          ) {
            fristNameInput.value = data.results[0].firstname;
            lastNameInput.value = data.results[0].lastname;
          } else {
            swal("", "La cédula ingresada no existe", "error");
            return false;
          }
        })
        .catch((error) => {
          console.error("Hubo un problema con la solicitud:", error);
          swal("", "Hubo un problema al verificar la cédula", "error");
        });
    }
  });

  formVoluntario.addEventListener(
    "submit",
    function (e) {
      e.preventDefault();

      let identificacionVolunteer = document.querySelector(
        "#identificacion_volunteer"
      ).value;
      let tipoIdentificacion = tipoIdentificacionSelect.value;

      if (tipoIdentificacion === "") {
        swal("", "SELECCIONE EL TIPO DE IDENTIFICACIÓN", "error");
        return false;
      } else if (tipoIdentificacion === "cedula") {
        const url = `https://apis.gometa.org/cedulas/${identificacionVolunteer}`;

        fetch(url)
          .then((response) => {
            if (response.ok) {
              return response.json();
            } else {
              throw new Error("Error al verificar la cédula");
            }
          })
          .then((data) => {
            if (
              data.results &&
              data.results.length > 0 &&
              data.results[0].firstname
            ) {
              fristNameInput.value = data.results[0].firstname;
              lastNameInput.value = data.results[0].lastname;
              enviarFormulario();
            } else {
              swal("", "La cédula ingresada no existe", "error");
              return false;
            }
          })
          .catch((error) => {
            console.error("Hubo un problema con la solicitud:", error);
            swal("", "Hubo un problema al verificar la cédula", "error");
          });
      }

      // Resto de tus validaciones y envío de formulario aquí
    },
    false
  );

  voluntarioGeneralCheckbox.addEventListener('change', function () {
    if (this.checked) {
      document.getElementById('voluntarioGeneralValue').value = 'Si';
      voluntarioEspecificoCheckbox.checked = false;
      mostrarOpciones();
      actividadSeleccionadaValue.value = '';
    }

    else {
      document.getElementById('voluntarioGeneralValue').value = 'No';
      opcionesActividad.style.display = 'none';
    }
    // Mostrar los valores en consola
   

  }
  );




  voluntarioEspecificoCheckbox.addEventListener('change', function () {
    if (this.checked) {
      voluntarioGeneralCheckbox.checked = false;
      mostrarOpciones();
      document.getElementById('voluntarioGeneralValue').value = 'No';
    } else {
      opcionesActividad.style.display = 'none';
      document.getElementById('voluntarioGeneralValue').value = 'Si';
    }

    

  });

// Agregar evento onchange al select de actividad seleccionada
actividadSeleccionadaSelect.addEventListener('change', function() {
  // Obtener el valor seleccionado en el select
  const valorSeleccionado = this.options[this.selectedIndex].text;

  // Asignar el valor seleccionado al campo oculto
  actividadSeleccionadaValue.value = valorSeleccionado;

  // Mostrar el valor seleccionado por consola
 
});



  //voluntarioGeneral.addEventListener('change', mostrarOpciones);
  //voluntarioEspecifico.addEventListener('change', mostrarOpciones);

  function mostrarOpciones() {
    const voluntarioGeneral = document.querySelector('#voluntarioGeneral');
    const voluntarioEspecifico = document.querySelector('#voluntarioEspecifico');
    const opcionesActividad = document.querySelector('#opcionesActividad');

    if (voluntarioGeneral.checked) {
      // Ocultar las opciones de actividad si se selecciona voluntario general
      opcionesActividad.style.display = 'none';
    } else if (voluntarioEspecifico.checked) {
      // Mostrar las opciones de actividad si se selecciona voluntario por actividad específica
      opcionesActividad.style.display = 'block';
    }
  }

  // Agregar evento change al select para deseleccionar la opción "Seleccione"
  tipoActividad.addEventListener('change', function () {
    if (this.value === '') {
      this.selectedIndex = -1; // Deseleccionar la opción "Seleccione"
    }
  });


  function obtenerCharlas() {
    const url = base_url + "/Corredor/Charla"; // URL para obtener las charlas

    fetch(url)
      .then((response) => {
        if (response.ok) {
          return response.json();
        } else {
          throw new Error("Error al obtener las charlas");
        }
      })
      .then((data) => {
        const charlas = data; // Suponiendo que la respuesta JSON contiene un array con las charlas

        // Obtener el select de actividad seleccionada
        const actividadSeleccionadaSelect = document.getElementById('actividad_seleccionada');

        // Limpiar opciones existentes en el select
        actividadSeleccionadaSelect.innerHTML = '';

        // Agregar la opción inicial "Seleccione una actividad"

        const optionInicial = document.createElement('option');
        optionInicial.textContent = 'Seleccione una actividad';
        optionInicial.value = ''; // Opcional: valor vacío para la opción inicial
        optionInicial.ariaDisabled = true; // Deshabilitar la opción inicial
        actividadSeleccionadaSelect.appendChild(optionInicial);

        charlas.forEach(charla => {
          const option = document.createElement('option');
          option.textContent = charla.nombre;
          option.value = charla.id;
          actividadSeleccionadaSelect.appendChild(option);
        });


      })
      .catch((error) => {
        console.error("Hubo un problema con la solicitud:", error);
        swal("", "Hubo un problema al obtener las charlas", "error");
      });
  }


  function obtenerTalleres() {
    const url = base_url + "/Corredor/Taller";

    fetch(url)
      .then((response) => {
        if (response.ok) {
          return response.json();
        } else {
          throw new Error("Error al obtener los talleres");
        }
      })
      .then((data) => {
        const talleres = data;


        const actividadSeleccionadaSelect = document.getElementById('actividad_seleccionada');


        actividadSeleccionadaSelect.innerHTML = '';


        const optionInicial = document.createElement('option');
        optionInicial.textContent = 'Seleccione un taller';
        optionInicial.value = '';
        actividadSeleccionadaSelect.appendChild(optionInicial);

        talleres.forEach(taller => {
          const option = document.createElement('option');
          option.textContent = taller.nombre;
          option.value = taller.id;
          actividadSeleccionadaSelect.appendChild(option);
        });

      })
      .catch((error) => {
        console.error("Hubo un problema con la solicitud:", error);
        swal("", "Hubo un problema al obtener las charlas", "error");
      });
  }

  function obtenerVoluntariados() {
    const url = base_url + "/Corredor/Voluntariado";

    fetch(url)
      .then((response) => {
        if (response.ok) {
          return response.json();
        } else {
          throw new Error("Error al obtener los voluntariados");
        }
      })
      .then((data) => {
        const voluntariados = data;


        const actividadSeleccionadaSelect = document.getElementById('actividad_seleccionada');


        actividadSeleccionadaSelect.innerHTML = '';


        const optionInicial = document.createElement('option');
        optionInicial.textContent = 'Seleccione un voluntariado';
        optionInicial.value = '';
        actividadSeleccionadaSelect.appendChild(optionInicial);

        voluntariados.forEach(voluntariado => {
          const option = document.createElement('option');
          option.textContent = voluntariado.nombre;
          option.value = voluntariado.id;
          actividadSeleccionadaSelect.appendChild(option);
        });

      })
      .catch((error) => {
        console.error("Hubo un problema con la solicitud:", error);
        swal("", "Hubo un problema al obtener las charlas", "error");
      });
  }

  tipoActividad.addEventListener("change", function () {
    const tipoSeleccionado = tipoActividad.value;
    contenedorActividad.innerHTML = '';

    if (tipoSeleccionado === 'charla') {

      obtenerCharlas();

    } else if (tipoSeleccionado === 'taller') {
      obtenerTalleres();

    } else if (tipoSeleccionado === 'voluntariado') {
      obtenerVoluntariados();
    }
  });




  contenedorActividad.addEventListener('change', function () {
  
    this.querySelector('option[value=""]').disabled = false;
  });

  contenedorActividad.addEventListener('mousedown', function () {
 
    this.querySelector('option[value=""]').disabled = true;
  });

  iconoGeneral.addEventListener("click", function () {
    swal("¿Qué es ser voluntario general?", "Sí me inscribo como voluntario general mis datos se registran y puedo ser contactado para cualquier actividad que se realiza en el corredor", "");
  });

  iconoEspecifico.addEventListener("click", function () {
    swal("¿Qué es ser voluntario por actividad específica?", "Sí me inscribo como voluntario por un actividad en específica mis datos se registran y puedo ser contactado solamente para participar en esa actividad que realice el corredor", "");
  });



  function enviarFormulario() {

    let identificacion_volunteer = document.querySelector("#identificacion_volunteer").value;
    let frist_name_volunteer = document.querySelector("#frist_name_volunteer").value;
    let last_name_volunteer = document.querySelector("#last_name_volunteer").value;
    let email = document.querySelector("#email").value;
    let address_volunteer = document.querySelector("#address_volunteer").value;
    let age_volunteer = document.querySelector("#age_volunteer").value;
    let ocupation_volunteer = document.querySelector("#ocupation_volunteer").value;
    let phone_number_volunteer = document.querySelector("#phone_number_volunteer").value;
    let mensaje = document.querySelector("#mensaje").value;

    // Validaciones

    if (identificacion_volunteer == "") {
      swal("", "La identificación es obligatoria", "error");
      return false;
    }

    if (email == "") {
      swal("", "Por escribe algún correo de contacto.", "error");
      return false;
    }

    if (!fntEmailValidate(email)) {
      swal("", "El email no es válido.", "error");
      return false;
    }

    if (frist_name_volunteer == "") {
      swal("", "El nombre es obligatorio.", "error");
      return false;
    }

    if (last_name_volunteer == "") {
      swal("", "El apellido es obligatorio.", "error");
      return false;
    }

    if (address_volunteer == "") {
      swal("", "La dirección es obligatoria", "error");
      return false;
    }

    if (age_volunteer == "") {
      swal("", "La edad es obligatoria.", "error");
      return false;
    }

    if (ocupation_volunteer == "") {
      swal("", "La ocupación es obligatoria.", "error");
      return false;
    }

    if (phone_number_volunteer == "") {
      swal("", "Por favor escribe algún número de teléfono de contacto.", "error");
      return false;
    }

    var regex = /^\d{8}$/;
    if (!regex.test(phone_number_volunteer)) {
      swal("", "El número de teléfono no es válido", "error");
      return false;
    }

    if (!voluntarioEspecificoCheckbox.checked && !voluntarioGeneralCheckbox.checked) {
      swal("", "Por favor, selecciona el tipo de voluntario que deseas ser.", "error");
      return false;
    }

    if (mensaje == "") {
      swal("", "¿Representas alguna organización? Por favor, escríbela", "error");
      return false;
    }

    let request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/Corredor/voluntario";
    let formData = new FormData(formVoluntario);

    request.open("POST", ajaxUrl, true);
    request.onerror = function () {
      swal("", "Error en la solicitud AJAX", "error");
    };

    request.send(formData);

    request.onreadystatechange = function () {
      if (request.readyState != 4) return;
      if (request.status == 200) {
        let objData = JSON.parse(request.responseText);
        if (objData.status) {
          swal("Voluntario", objData.msg, "success");
          document.querySelector("#formVoluntario").reset();
          submitButton.disabled = true;
        } else {
          swal("Error", objData.msg, "error");
        }
      }
    };
  }
});


if (document.querySelector("#frmContacto")) {
  let frmContacto = document.querySelector("#frmContacto");
  frmContacto.addEventListener('submit', function (e) {
    e.preventDefault();

    let nombre = document.querySelector("#nombreContacto").value;
    let email = document.querySelector("#emailContacto").value;
    let mensaje = document.querySelector("#mensaje").value;

    if (nombre == "") {
      swal("", "El nombre es obligatorio", "error");
      return false;
    }

    if (!fntEmailValidate(email)) {
      swal("", "El email no es válido.", "error");
      return false;
    }

    if (mensaje == "") {
      swal("", "Por favor escribe el mensaje, duda o sugerencia.", "error");
      return false;
    }

    // Crear el elemento divLoading
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Corredor/contacto';
    let formData = new FormData(frmContacto);

    request.open("POST", ajaxUrl, true);
    request.onerror = function () {
      swal("", "Error en la solicitud AJAX", "error");
    };

    request.send(formData);

    request.onreadystatechange = function () {
      if (request.readyState != 4) return;
      if (request.status == 200) {
        let objData = JSON.parse(request.responseText);
        if (objData.status) {
          swal("Contacto", objData.msg, "success");
          document.querySelector("#frmContacto").reset();
        } else {
          swal("Error", objData.msg, "error");
        }
      }

      return false;
    }

  }, false);

}
