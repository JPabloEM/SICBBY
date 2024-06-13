let tableDocumentos;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");

// Obtener la fecha actual en formato yyyy-mm-dd
const today = new Date().toISOString().split('T')[0];

// Establecer el atributo 'min' del input como la fecha actual
document.getElementById('txtFechaDocl').setAttribute('min', today);


document.addEventListener('DOMContentLoaded', function(){

    tableDocumentos = $('#tableDocumentos').dataTable( {
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Documentos/getDocumentos",
            "dataSrc": ""
        },
        "columns": [
            {"data": "id_documento"},
            {"data": "nombre"},
            {"data": "descripcion"},
            {"data": "status"},
            {"data": "fechaDocl"},
            {"data": "options"},
        //     {
        //         "data": null,
        //     "render": downloadPDF  // Utiliza la función para renderizar el botón de descarga
        // }
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr": "Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr": "Exportar a Excel",
                "className": "btn btn-success"
            },,{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr": "Exportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });


	if (document.querySelector("#pdf")) {
        let pdf = document.querySelector("#pdf");
        pdf.onchange = function(e) {
            let uploadFile = document.querySelector("#pdf").files[0];
            let nav = window.URL || window.webkitURL;
            let contactAlert = document.querySelector('#form_alert');
    
            if (uploadFile) {
                let fileType = uploadFile.type;
                let fileName = uploadFile.name;
    
                if (fileType === 'image/jpeg' || fileType === 'image/jpg' || fileType === 'image/png' || fileType === 'application/pdf') {
                    contactAlert.innerHTML = '';
                    if (document.querySelector('#img')) {
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.remove("notBlock");
    
                    if (fileType === 'application/pdf') {
                        // Aquí puedes manejar el archivo PDF
                        // Puedes mostrar el nombre del archivo o cualquier otra lógica que desees para los archivos Photo
                        document.querySelector('.prevPhoto div').innerHTML = "<p>Archivo PDF seleccionado: " + fileName + "</p>";
                    } else {
                        let objeto_url = nav.createObjectURL(uploadFile);
                        document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objeto_url + ">";
                    }
                } else {
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
                    if (document.querySelector('#img')) {
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.add("notBlock");
                    pdf.value = "";
                }
            } else {
                alert("No seleccionó ningún archivo");
                if (document.querySelector('#img')) {
                    document.querySelector('#img').remove();
                }
            }
        }
    }
    

	if(document.querySelector(".delPhoto")){
	    let delPhoto = document.querySelector(".delPhoto");
	    delPhoto.onclick = function(e) {
            document.querySelector("#pdf_remove").value= 1;
	        removePDF();
	    }
	}

	//nuevo documento
    let formDocumento = document.querySelector("#formDocumento");
    formDocumento.onsubmit = function(e) {
        e.preventDefault();
        let strNombre = document.querySelector('#txtNombre').value;
        let strDescripcion = document.querySelector('#txtDescripcion').value;
        let intStatus = document.querySelector('#listStatus').value;  
        let strFechaDocl = document.querySelector('#txtFechaDocl').value;      
        if(strNombre == '' || strDescripcion == '' || intStatus == ''|| strFechaDocl == '')
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
        divLoading.style.display = "flex";
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Documentos/setDocumento'; 
        let formData = new FormData(formDocumento);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                let objData = JSON.parse(request.responseText);
                if(objData.status)
                {

                    $('#modalFormDocumentos').modal("hide");
                    formDocumento.reset();
                    swal("Documento", objData.msg ,"success");
                    tableDocumentos.api().ajax.reload();
                    removePDF();
                }else{
                    swal("Error", objData.msg , "error");
                }              
            } 
            divLoading.style.display = "none";
            return false;
        }
    }

}, false);

function fntViewInfo(id_documento){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Documentos/getDocumento/'+id_documento;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                let estado = objData.data.status == 1 ? 
                '<span class="badge badge-success">Activo</span>' : 
                '<span class="badge badge-danger">Inactivo</span>';
                document.querySelector("#celId").innerHTML = objData.data.id_documento;
                document.querySelector("#celNombre").innerHTML = objData.data.nombre;
                document.querySelector("#celDescripcion").innerHTML = objData.data.descripcion;
                document.querySelector("#celEstado").innerHTML = estado;
                document.querySelector("#celFechaDocl").innerHTML = objData.data.fechaDocl;

                // document.querySelector("#imgDocumento").innerHTML = '<img src="'+objData.data.url_portada+'"></img>';
                $('#modalViewDocumento').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}


function downloadPDF(id_documento) {
    swal({
        title: "Descargar PDF",
        text: "¿Realmente desea descargar el PDF?",
        type: "info",
        showCancelButton: true,
        confirmButtonText: "Sí, descargar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: true,
        closeOnCancel: true
    }, function(isConfirm) {
        if (isConfirm) {
            // Convertir id_documento a número entero
            id_documento = parseInt(id_documento);

            // Construir la URL con el parámetro en la ruta
            let downloadUrl = base_url + '/Documentos/downloadPDF/' + id_documento;

            // Crear un enlace oculto para iniciar la descarga
            var link = document.createElement('a');
            link.href = downloadUrl;
            link.download = 'archivo.pdf'; // Nombre del archivo a descargar (puedes cambiarlo)
            link.click();
        }
    });
}






function fntEditInfo(element,id_documento){
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar Categoría";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Documentos/getDocumento/'+id_documento;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idDocumento").value = objData.data.id_documento;
                document.querySelector("#txtNombre").value = objData.data.nombre;
                document.querySelector("#txtDescripcion").value = objData.data.descripcion;
                document.querySelector("#txtFechaDocl").value = objData.data.fechaDocl;
                document.querySelector('#pdf_actual').value = objData.data.portada;
                document.querySelector("#pdf_remove").value= 0;

                if(objData.data.status == 1){
                    document.querySelector("#listStatus").value = 1;
                }else{
                    document.querySelector("#listStatus").value = 2;
                }
                $('#listStatus').selectpicker('render');

                // if(document.querySelector('#img')){
                //     document.querySelector('#img').src = objData.data.url_portada;
                // }else{
                //     document.querySelector('.prevPDF div').innerHTML = "<img id='img' src="+objData.data.url_portada+">";
                // }

                if(objData.data.portada == 'portada_categoria.png'){
                    document.querySelector('.delPhoto').classList.add("notBlock");
                }else{
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }

                $('#modalFormDocumentos').modal('show');

            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function fntDelInfo(id_documento){
    swal({
        title: "Eliminar Documento",
        text: "¿Realmente quiere eliminar el Documento?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Documentos/delDocumento';
            let strData = "idDocumento="+id_documento;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableDocumentos.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}

function removePDF(){
    document.querySelector('#pdf').value ="";
    document.querySelector('.delPhoto').classList.add("notBlock");
    if(document.querySelector('#img')){
        document.querySelector('#img').remove();
    }
}

function openModal()
{
    rowTable = "";
    document.querySelector('#idDocumento').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Agregar Documento";
    document.querySelector("#formDocumento").reset();
    $('#modalFormDocumentos').modal('show');
    removePDF();
}