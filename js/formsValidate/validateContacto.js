$().ready(function () {
  $("#formularioContacto").validate({
    //debug: true,
    rules: {
      motivo: "required",
      facturacion: "required",
      nombreUsuario: "required",
      contrasenya: {
        required: true,
        rangelength: [8, 14]
      },
      contrasenyaRep: {
        equalTo: "#contrasenya"
      },
      nombre: "required",
      apellidos: "required",
      telefono: "required",
      correo: {
        required: true,
        email: true
      },
      politica: "required"
    },
     errorPlacement: function (error, element) {
      if (element.attr("name") == "politica") {
        error.appendTo("#politicaError");
      }
      else if (element.attr("name") == "motivo") {
        error.appendTo("#motivoError")
      } else { 
        error.insertAfter(element)
      }

    }
  });
});