$(document).ready(function () {
  $("#registroUsuario").click(function () {
    let usuario = $("#usuario").val();
    let clave = $("#clave").val();
    let tituoFormulario = $("#tituloFormularioIngresar");

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
            // alert('Eres bienvenido.');
            location.href = 'views/usuario/index.php';
            break;
          case '1':
            alert(ok.message);
            break;
          case '2':
            alert(ok.message);
            break;
          default:
            alert('Creo que estás perdido.');
            break;
        }
      },
      beforeSend: function () {
        tituoFormulario.text('Ingresando...').addClass('text-primary');
      },
    });
  });
});