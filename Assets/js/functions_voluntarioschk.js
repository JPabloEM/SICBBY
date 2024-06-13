let rowTable = "";
let tableVoluntariosSI;
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {

    var logo;
    // Function to convert an img URL to data URL
    function getBase64FromImageUrl(url) {
        var img = new Image();
        img.crossOrigin = "anonymous";
        img.onload = function () {
            var canvas = document.createElement("canvas");
            canvas.width = this.width;
            canvas.height = this.height;
            var ctx = canvas.getContext("2d");
            ctx.drawImage(this, 0, 0);
            var dataURL = canvas.toDataURL("image/png");
            return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
        };
        img.src = url;
    }
    logo = getBase64FromImageUrl('https://res.cloudinary.com/doeyqaqr6/image/upload/v1699316020/xdd-removebg-preview_1_iysuak.png');


    tableVoluntariosSI = $('#tableVoluntariosSI').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Voluntarioschk/getVoluntariosSI",
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
            {
                "data": "Estado",
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
                }
            },
            { "data": "options" }
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr": "Copiar",
                "className": "btn btn-secondary"
            }, {
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr": "Exportar a Excel",
                "className": "btn btn-success"
            }, {
                extend: 'pdfHtml5',
                title: "Registro voluntariados",
                pageSize: 'A4',
                "className": "btn btn-danger",
                exportOptions: {
                    // columns: [0, 2],
                    search: 'applied',
                    order: 'applied',
                    stripNewlines: false
                },
                customize: function (doc) {
                    doc.content[1].table.body.forEach(function (row) {
                      // //    row.splice(6, 1);
                    //     // row.splice(12, 1);
                     row.splice(0, 1);
                 row.splice(10, 1);
                    //     row.splice(11, 1);
                    //     row.splice(5, 1);
                     row.splice(8, 1);
                       row.splice(9, 1);
                    //     row.splice(13, 1);


                    });
                    var rdoc = doc;
                    var imgData = 'Assets/images/CBBY.webp';
                    var rcout = doc.content[doc.content.length - 1].table.body.length - 1;
                    doc.content.splice(0, 1);
                    var now = new Date();
                    var jsDate = now.getDate() + '/' + (now.getMonth() + 1) + '/' + now.getFullYear() + '  and Time:' + now.getHours() + ':' + now.getMinutes() + ':' + now.getSeconds();
                    doc.pageMargins = [0, 85, 10, 0];

                    doc.defaultStyle.fontSize = 5;
                    doc.styles.tableHeader.fontSize = 5;
                    doc.content[doc.content.length - 1].table.headerRows = 1;

                    for (var i = 0; i < rcout; i++) {
                        var obj = doc.content[doc.content.length - 1].table.body[i + 1];
                        doc.content[doc.content.length - 1].table.body[(i + 1)][0] = { text: obj[0].text, style: [obj[0].style], bold: true };
                        doc.content[doc.content.length - 1].table.body[(i + 1)][3] = {
                            text: obj[3].text,
                            style: [obj[3].style],
                            alignment: 'center',
                            bold: obj[3].text > 60 ? true : false,
                            fillColor: obj[3].text > 60 ? 'red' : null
                        };
                    }


                    doc['header'] = (function (page, pages) {
                        return {
                            table: {
                                widths: ['auto', 'auto'],
                                headerRows: 0,
                                body: [
                                    [

                                        {
                                            //margin: [0, 10, 0, 0],
                                            width: 85,//'auto',
                                            alignment: 'righ',
                                            /*ReddyInfoSoft*/
                                            //image: 'data:image/png;base64,' + logo,
                                            image: 'data:image/png;base64,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',
                                            //image: './ReddyInfoSoft.png'

                                        },

                                        { text: 'Registros de voluntarios del CBBY', alignment: 'center', fontSize: 14, bold: true, margin: [100, 20, 0, 0] }




                                    ],

                                    [
                                        {
                                            text:
                                                [
                                                    // { text: 'SubTitle1: ', bold: true }, 'Sub title details...1\n',
                                                    // { text: 'SubTitle2: ', bold: true }, 'Sub title details...2',
                                                ]
                                        }, {}
                                    ]
                                ]
                            },
                            layout: 'noBorders',
                            margin: 10
                        }
                    });

                    doc['footer'] = (function (page, pages) {
                        return {
                            columns: [
                                {
                                    alignment: 'left',
                                    text: ['Created Date: ', { text: jsDate.toString() }]
                                },
                                {
                                    alignment: 'center',
                                    text: 'Total ' + rcout.toString() + ' rows'
                                },
                                {
                                    alignment: 'right',
                                    text: ['page ', { text: page.toString() }, ' of ', { text: pages.toString() }]
                                }
                            ],
                            margin: 10
                        }
                    });

                    var objLayout = {};
                    objLayout['hLineWidth'] = function (i) { return .8; };
                    objLayout['vLineWidth'] = function (i) { return .5; };
                    objLayout['hLineColor'] = function (i) { return '#aaa'; };
                    objLayout['vLineColor'] = function (i) { return '#aaa'; };
                    objLayout['paddingLeft'] = function (i) { return 5; };
                    objLayout['paddingRight'] = function (i) { return 35; };
                    doc.content[doc.content.length - 1].layout = objLayout;


                }
            }, {
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr": "Exportar a CSV",
                "className": "btn btn-info"
            }
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

        //if (!voluntarioEspecificoCheckbox.checked && !voluntarioGeneralCheckbox.checked) {
          //  swal("", "Por favor, selecciona el tipo de voluntario que deseas ser.", "error");
            //return false;
        //}

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
        let ajaxUrl = base_url + '/Voluntarioschk/setVoluntariochk';
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
                    tableVoluntariosSI.api().ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
            return false;
        }
    }



}, false);


function fntViewVoluntariochk(idVoluntario) {
    let request = (window.XMLHttpRequest) ?
        new XMLHttpRequest() :
        new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Voluntarioschk/getVoluntariochk/' + idVoluntario;
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





function fntEditVoluntariochk(element, id) {
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Actualizar Voluntario";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Voluntarioschk/getVoluntariochk/' + id;
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
















function fntDelVoluntariochk(idVoluntario) {
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
            let ajaxUrl = base_url + '/Voluntarioschk/delVoluntariochk';
            let strData = "idv=" + idVoluntario;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminar!", objData.msg, "success");
                        tableVoluntariosSI.api().ajax.reload();
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
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Voluntario";
    document.querySelector("#formVoluntario").reset();
    $('#modalformVoluntario').modal('show');
}