// function downloadPDFP(id_documentoP) {
//     // Convertir id_documento a número entero
//     id_documentoP = parseInt(id_documentoP);

//     // Construir la URL con el parámetro en la ruta
//     let downloadUrl = base_url + '/DocumentosPublics/downloadPDFP/' + id_documentoP;

//     // Crear un enlace oculto para iniciar la descarga
//     var link = document.createElement('a');
//     link.href = downloadUrl;
//     link.download = 'archivo.pdf'; // Nombre del archivo a descargar (puedes cambiarlo)
//     link.click();
// }


function downloadPDFP(id_documentoP) {
    // swal({
    //     title: "Descargar PDF",
    //     text: "¿Realmente desea descargar el PDF?",
    //     type: "info",
    //     showCancelButton: true,
    //     confirmButtonText: "Sí, descargar",
    //     cancelButtonText: "Cancelar",
    //     closeOnConfirm: true,
    //     closeOnCancel: true
    // }, function(isConfirm) {
    //     if (isConfirm) {
            // Convertir id_documento a número entero
            id_documentoP = parseInt(id_documentoP);

            // Construir la URL con el parámetro en la ruta
            let downloadUrl = base_url + '/DocumentosPublics/downloadPDFP/' + id_documentoP;

            // Crear un enlace oculto para iniciar la descarga
            var link = document.createElement('a');
            link.href = downloadUrl;
            link.download = 'archivo.pdf'; // Nombre del archivo a descargar (puedes cambiarlo)
            link.click();
        }
    // });
// }
