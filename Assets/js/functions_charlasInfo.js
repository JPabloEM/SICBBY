  function fntViewInfo(idcharla) {
    $.ajax({
      type: "GET",
      url: base_url + "CharlasInfo/getCharlaInfo/" + idcharla, // URL relativa a la función PHP en el mismo archivo
      success: function (data) {
        var charlaData = JSON.parse(data);

        if (charlaData.status) {
          document.getElementById("idCharla").textContent = charlaData.data.idcharla;
          document.getElementById("tNombre").textContent = charlaData.data.nombre;
          document.getElementById("tDescricion").textContent = charlaData.data.descripcion;
          document.getElementById("tFecha").textContent = charlaData.data.fechaCharla;
          document.getElementById("tHora").textContent = charlaData.data.horaCharla;
          document.getElementById("tLugar").textContent = charlaData.data.lugar;
          document.getElementById("tCapacidad").textContent = charlaData.data.capacidad;

          $("#modalViewCharlaInfo").modal("show");
        } else {
          swal("Error", charlaData.msg, "error");
        }
      },
      error: function (error) {
        swal("Error", "No se pudieron obtener los datos de la charla.", "error");
      }
    });
  }

  // Puedes agregar más código JavaScript relacionado con la página aquí

  function openModal()
  {
      document.querySelector('#idCharla').value ="";
      $("#modalViewCharlaInfo").modal("show");
     
  }
