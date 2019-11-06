$(document).ready(function () {
  $('#registroUsuario').click(function () {
    let usuario = $('#usuario').val();
    let clave = $('#clave').val();

    console.log(usuario);
    console.log(clave);

    $.ajax({
      url: 'UsuarioController.php?fn=login',
      type: 'POST',
      data: {
        usuario: usuario,
        clave: clave,
      },
      success: function (response) {
        let ok = JSON.parse(response);
        console.log(ok.error);
      },
      beforeSend: function () {

      },
    });
  });
});