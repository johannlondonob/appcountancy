$(document).ready(function () {
  $("#registroUsuario").click(function () {
    let usuario = $("#usuario").val();
    let clave = $("#clave").val();

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

        /* if (ok.error == 0) {
          location.href = '../../views/usuario/index.php';
          console.log(ok);
        } else {
          alert("Error");
        } */
      },
    });
  });
});