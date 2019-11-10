function ResetLogin() {
  let tituloFormulario = $("#tituloFormularioIngresar");
  tituloFormulario.text('Ingresar').removeClass('text-primary');
}

$(document).ready(function () {

  $("#registroUsuario").click(function () {
    let usuario = $("#usuario").val();
    let clave = $("#clave").val();
    let tituloFormulario = $("#tituloFormularioIngresar");


    $.ajax({
      url: "controllers/UsuarioController.php?fn=login",
      data: {
        usuario: usuario,
        clave: clave,
      },
      type: "POST",
      success: function (response) {
        let ok = JSON.parse(response);

        console.log(ok.error);

        switch (ok.error) {
          case '0':
            location.href = 'views/usuario/index.php';
            break;
          case '1':
            // alert(ok.message);
            ResetLogin();

            break;
          case '2':
            // alert(ok.message);
            ResetLogin();

            break;
          default:
            // alert('Creo que estás perdido.');
            ResetLogin();

            break;
        }
      },
      beforeSend: function () {
        tituloFormulario.text('Ingresando...').addClass('text-primary');
      }
    });
  });

  let subcontainer = $("#app-subcontainer");


});