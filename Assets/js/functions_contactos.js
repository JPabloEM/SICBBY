let tableContactos;
tableContactos = $('#tableContactos').dataTable({
  "aProcessing": true,
  "aServerSide": true,
  "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
  },
  "ajax": {
    "url": " " + base_url + "/contactos/getContactos",
    "dataSrc": ""
  },
  "columns": [
    { "data": "id" },
    { "data": "nombre" },
    { "data": "email" },
    { "data": "fecha" },
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
    }, , {
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


function fntViewInfo(idmensaje) {
  let request = (window.XMLHttpRequest) ?
    new XMLHttpRequest() :
    new ActiveXObject('Microsoft.XMLHTTP');
  let ajaxUrl = base_url + '/contactos/getMensaje/' + idmensaje;
  request.open("GET", ajaxUrl, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      let objData = JSON.parse(request.responseText);
      if (objData.status) {
        let objMesaje = objData.data;
        document.querySelector("#celCodigo").innerHTML = objMesaje.id;
        document.querySelector("#celNombre").innerHTML = objMesaje.nombre;
        document.querySelector("#celEmail").innerHTML = objMesaje.email;
        document.querySelector("#celFecha").innerHTML = objMesaje.fecha;
        document.querySelector("#celMensaje").innerHTML = objMesaje.mensaje;

        // Agregar evento click al botón "Contactarse"
        document.querySelector("#btnContactarse").addEventListener("click", function () {
          // Obtener el correo electrónico del destinatario desde el HTML
          let correoDestino = document.querySelector("#celEmail").textContent.trim();

          // Generar el enlace para enviar correo electrónico a través de Gmail
          let enlaceCorreo = 'https://mail.google.com/mail/?view=cm&fs=1&to=' + encodeURIComponent(correoDestino);

          // Abrir la ventana del cliente de correo electrónico de Gmail
          window.open(enlaceCorreo, '_blank');
        });



        $('#modalViewMensaje').modal('show');
      } else {
        swal("Error", objData.msg, "error");
      }
    }
  }
}

function fntDelInfo(idmensaje) {
  swal(
    {
      title: "Eliminar mensaje",
      text: "¿Realmente quiere eliminar el mensaje?",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Si, eliminar!",
      cancelButtonText: "No, cancelar!",
      closeOnConfirm: false,
      closeOnCancel: true,
    },
    function (isConfirm) {
      if (isConfirm) {
        let request = window.XMLHttpRequest
          ? new XMLHttpRequest()
          : new ActiveXObject("Microsoft.XMLHTTP");
        let ajaxUrl = base_url + "/Contactos/deleteMensaje";
        let strData = "idmensaje=" + idmensaje;
        request.open("POST", ajaxUrl, true);
        request.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );
        request.send(strData);
        request.onreadystatechange = function () {
          if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
              swal("Eliminar!", objData.msg, "success");
              tableContactos.api().ajax.reload();
            } else {
              swal("Atención!", objData.msg, "error");
            }
          }
        };
      }
    }
  );
}