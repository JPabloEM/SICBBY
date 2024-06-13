let rowTable = "";
let tableVoluntarios;
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {

    tableVoluntarios = $('#tableVoluntarios').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Voluntarios/getVoluntarios",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "identificacion_volunteer" },
            { "data": "frist_name_volunteer" },
            { "data": "last_name_volunteer" },
            { "data": "email" },
            { "data": "address_volunteer" },
            { "data": "age_volunteer" },
            { "data": "general" },
            { "data": "actividad" },
            { "data": "ocupation_volunteer" },
            { "data": "phone_number_volunteer" },
            { "data": "datecreated" },
            { "data": "Estado", 
            "render": function (data, type, row) {
                let estado = row["Estado"];
                let colorClass = "";
                if (estado === "Activo") {
                    colorClass = "estado-activo";
                } else if (estado === "Inactivo") {
                    colorClass = "estado-inactivo";
                } else {
                    colorClass = "estado-pendiente";
                }
                return '<span class="' + colorClass + '">' + estado + '</span>';
            }},
            { "data": "options" }
        ],
        "responsive": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });




    let fristNameInput = document.querySelector("#txtNombre");
    let lastNameInput = document.querySelector("#txtApellido");
    let tipoIdentificacionSelect = document.querySelector("#opciones");
    let verificarButton = document.querySelector("#verificarCedula");
    let tipoActividad = document.querySelector("#tipo_actividad"); // Obtener el elemento con ID "opciones"
    let contenedorActividad = document.querySelector("#actividad_seleccionada");

    var voluntarioGeneralValue = document.getElementById('voluntarioGeneralValue');

    // Obtener el select de actividad seleccionada
    var actividadSeleccionadaSelect = document.getElementById('actividad_seleccionada');
    var actividadSeleccionadaValue = document.getElementById('actividadSeleccionadaValue');

    const voluntarioGeneralCheckbox = document.querySelector('#voluntarioGeneral');
    const voluntarioEspecificoCheckbox = document.querySelector('#voluntarioEspecifico');

    // const actividadSelect = document.querySelector('#actividad_seleccionada');





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
            "#txtIdentificacion"
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
                "#txtIdentificacion"
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




    function obtenerCharlas() {
        const url = base_url + "/Voluntarioschk/Charla"; // URL para obtener las charlas

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
        const url = base_url + "/Voluntarioschk/Taller";

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
        const url = base_url + "/Voluntarioschk/Voluntariado";

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



    voluntarioGeneralCheckbox.addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('voluntarioGeneralValue').value = 'Si';
            voluntarioEspecificoCheckbox.checked = false;
            mostrarOpciones();
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



    actividadSeleccionadaSelect.addEventListener('change', function () {
        // Obtener el valor seleccionado en el select
        const valorSeleccionado = this.options[this.selectedIndex].text;

        // Asignar el valor seleccionado al campo oculto
        actividadSeleccionadaValue.value = valorSeleccionado;

        // Mostrar el valor seleccionado por consola

    });


// Agregar evento onchange al select de actividad seleccionada
    actividadSeleccionadaSelect.addEventListener('change', function () {
        // Obtener el valor seleccionado en el select
        const valorSeleccionado = this.options[this.selectedIndex].text;

        // Asignar el valor seleccionado al campo oculto
        actividadSeleccionadaValue.value = valorSeleccionado;

        // Mostrar el valor seleccionado por consola

    });




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







    function enviarFormulario() {

        let strIdentificacion = document.querySelector('#txtIdentificacion').value;
        let strNombre = document.querySelector('#txtNombre').value;
        let strApellido = document.querySelector('#txtApellido').value;
        let strEmail = document.querySelector('#txtEmail').value;
        let strDireccion = document.querySelector('#txtDireccion').value;
        let intEdad = document.querySelector('#txtEdad').value;
        let strMensaje = document.querySelector('#txtMensaje').value;
        let strOcupacion = document.querySelector('#txtOcupacion').value;
        let strTelefono = document.querySelector('#txtTelefono').value;
        let strEstado = document.querySelector('#listStatus').value;


        if (strIdentificacion == '' || strApellido == '' || strNombre == '' || strEmail == '' || strTelefono == '' || intEdad == '' || strOcupacion == '' || strMensaje == '' || strDireccion == '' || strEstado == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        // if (!voluntarioEspecificoCheckbox.checked && !voluntarioGeneralCheckbox.checked) {
        //     swal("", "Por favor, selecciona el tipo de voluntario que deseas ser.", "error");
        //     return false;
        // }

        var regex = /^\d{8}$/;
        if (!regex.test(strTelefono)) {
            swal("", "El número de teléfono no es válido", "error");
            return false;
        }


        let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) {
            if (elementsValid[i].classList.contains('is-invalid')) {
                swal("Atención", "Por favor verifique los campos en rojo.", "error");
                return false;
            }
        }


        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url + '/Voluntarios/setVoluntario';
        let formData = new FormData(formVoluntario);
        request.open("POST", ajaxUrl, true);
        //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.onerror = function () {
            swal("Error", "Hubo un error en la solicitud AJAX", "error");
        };
        // request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                let objData = JSON.parse(request.responseText);
                if (objData.status) {

                    $('#modalformVoluntario').modal("hide");
                    formVoluntario.reset();
                    swal("Voluntario", objData.msg, "success");
                    tableVoluntarios.api().ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
            return false;
        }
    }



}, false);










function fntViewVoluntario(idVoluntario) {
    let request = (window.XMLHttpRequest) ?
        new XMLHttpRequest() :
        new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Voluntarios/getVoluntario/' + idVoluntario;
    request.open("GET", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                let objMesaje = objData.data;
                document.querySelector("#celCedula").innerHTML = objMesaje.identificacion_volunteer;
                document.querySelector("#celNombre").innerHTML = objMesaje.frist_name_volunteer;
                document.querySelector("#celApellido").innerHTML = objMesaje.last_name_volunteer;
                document.querySelector("#celEmail").innerHTML = objMesaje.email;
                document.querySelector("#celDireccion").innerHTML = objMesaje.address_volunteer;
                document.querySelector("#celEdad").innerHTML = objMesaje.age_volunteer;
                document.querySelector("#celMensaje").innerHTML = objMesaje.mensaje;
                document.querySelector("#celOcupacion").innerHTML = objMesaje.ocupation_volunteer;
                document.querySelector("#celTefono").innerHTML = objMesaje.phone_number_volunteer;
                document.querySelector("#celGeneral").innerHTML = objMesaje.general;
                document.querySelector("#celActividad").innerHTML = objMesaje.actividad;
                document.querySelector("#celEstado").innerHTML = objMesaje.Estado;
                $('#modalViewVoluntario').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}



function fntEditVoluntario(element, id) {
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Actualizar Voluntario";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Voluntarios/getVoluntario/' + id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#idv").value = objData.data.id;
                document.querySelector("#txtIdentificacion").value = objData.data.identificacion_volunteer;
                document.querySelector("#txtNombre").value = objData.data.frist_name_volunteer;
                document.querySelector("#txtApellido").value = objData.data.last_name_volunteer;
                document.querySelector("#txtEmail").value = objData.data.email;
                document.querySelector("#txtDireccion").value = objData.data.address_volunteer;
                document.querySelector("#txtEdad").value = objData.data.age_volunteer;
                document.querySelector("#txtMensaje").value = objData.data.mensaje;
                document.querySelector("#txtOcupacion").value = objData.data.ocupation_volunteer;
                document.querySelector("#txtTelefono").value = objData.data.phone_number_volunteer;

                // Actualizar el valor del checkbox y opciones de actividad
                let isGeneral = objData.data.general === "Si";
                document.querySelector("#voluntarioGeneral").checked = isGeneral;
                document.querySelector("#voluntarioEspecifico").checked = !isGeneral;
                document.querySelector("#voluntarioGeneralValue").value = isGeneral ? "Si" : "No";
                
                // Mostrar/ocultar opciones de actividad según el estado del voluntario
                let opcionesActividad = document.querySelector('#opcionesActividad');
                if (isGeneral) {
                    opcionesActividad.style.display = 'none';
                } else {
                    opcionesActividad.style.display = 'block';

                    // Actualizar el select de actividad seleccionada
                    let selectElement = document.querySelector("#actividad_seleccionada");
                    selectElement.innerHTML = ''; // Limpiar opciones previas

                    let actividadId = objData.data.actividad.id || objData.data.actividad;
                    let actividadNombre = objData.data.actividad.nombre || objData.data.actividad;
                    
                    let optionElement = document.createElement("option");
                    optionElement.value = actividadId;
                    optionElement.text = actividadNombre;
                    selectElement.appendChild(optionElement);

                    // Asignar valores correctos
                    document.querySelector("#actividad_seleccionada").value = actividadId;
                    document.querySelector("#actividadSeleccionadaValue").value = actividadNombre;

                    // Llenar las opciones de actividad con los datos obtenidos de la API
                    // Esto llamará a las funciones de obtención de actividades según el tipo
                    if (objData.data.tipo_actividad === 'charla') {
                        obtenerCharlas();
                    } else if (objData.data.tipo_actividad === 'taller') {
                        obtenerTalleres();
                    } else if (objData.data.tipo_actividad === 'voluntariado') {
                        obtenerVoluntariados();
                    }
                }

                if (objData.data.Estado === 'Activo') {
                    document.querySelector("#listStatus").value = 'Activo';
                } else if (objData.data.Estado === 'Inactivo') {
                    document.querySelector("#listStatus").value = 'Inactivo';
                } else {
                    document.querySelector("#listStatus").value = 'Solicitud';
                }
                $('#listStatus').selectpicker('render');

            } else {
                swal("Error", objData.msg, "error");
            }
        }
        $('#modalformVoluntario').modal('show');
    }
}





function fntDelVoluntario(idVoluntario) {
    swal({
        title: "Eliminar Voluntario",
        text: "¿Realmente quiere eliminar el voluntario?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Voluntarios/delVoluntario';
            let strData = "idv=" + idVoluntario;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminar!", objData.msg, "success");
                        tableVoluntarios.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }

    });

}


function openModal() {
    rowTable = "";
    document.querySelector('#idv').value = "";
    document.querySelector('.modal-header').classList.replace( "headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Voluntario";;
    document.querySelector("#formVoluntario").reset();
    $('#modalformVoluntario').modal('show');
}