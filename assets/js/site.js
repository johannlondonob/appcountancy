/**
 * Evento que ocurre al momento de loggearse
 * 
 * Esta función apunta al título de formulario del login para ingresar al sistema
 */
function ResetLogin() {
  let tituloFormulario = $("#tituloFormularioIngresar");
  tituloFormulario.text('Ingresar').removeClass('text-primary');
}

function ResetContent() {
  /* let subcontainer = $("#subcontainer");
  let table = $("#table"); */
  let appSubcontainer = document.getElementById("app-subcontainer");
  let appContent = document.getElementById("app-content");

  appSubcontainer.removeChild(appContent);
}

/**
 * Inicializar los botones del contenedor de la app
 * 
 * Esta función inicializa una variable para guardar el ancho de la ventana de la app,
 * y de acuerdo al ancho de la página, formateará los botones ubicados en la parte superior del subcontenedor de la aplicación.
 * Evaluará el ancho para quitar o no el texto de los botones.
 */
function IniciarBotones() {
  let widthX = $(window).width();

  if (widthX <= 550) {
    $(".icon-text").css("display", "none");
  } else {
    $(".icon-text").css("display", "inline-block");
  };
}
/**
 * A partir de aquí, el script efectuará los cambios necesarios de acuerdo a los parámetros establecidos por el flujo del sistema una vez que la página esté completamente cargado y listo para navegarse. 
 */
$(document).ready(function () {
  IniciarBotones();
  $(window).resize(() => {
    IniciarBotones();
  })

  /**
   * Momento en el que se loggea un usuario.
   * 
   * Este código está basado en lo que ocurre en la página appcountancy.co/index.php
   * En esta página se encuentra un formulario donde se podrá registrar el usuario.
   * Tal procedimiento requiere enviar por el método POST los siguientes datos -> cuenta_usuario y clave_usuario.
   * Si el objeto Ajax recibe una respuesta, esta será evaluada con una estructura SWITCH. 
   */
  $("#registroUsuario").click(function () {
    let usuario = $("#usuario").val();
    let clave = $("#clave").val();
    let tituloFormulario = $("#tituloFormularioIngresar");


    $.ajax({
      /**
       * El siguiente es el archivo al cuál le enviaré los datos necesarios para la autenticación.
       */
      url: "controllers/UsuarioController.php?fn=login",
      data: {
        usuario: usuario,
        clave: clave,
      },
      type: "POST",
      success: function (response) {
        let ok = JSON.parse(response);

        switch (ok.error) {
          case '0':
            /**
             * En este caso, se recibió que el usuario existe y la clave coincide. Por eso se le redirigirá al inicio de su cuenta.
             */
            location.href = 'views/usuario/index.php';
            break;
          case '1':
            /**
             * Al haber error, se formateará el título del formulario.
             */
            ResetLogin();
            break;
          case '2':
            /**
             * Al haber error, se formateará el título del formulario.
             */
            ResetLogin();
            break;
          default:
            /**
             * Al haber error, se formateará el título del formulario.
             */
            ResetLogin();
            break;
        }
      },
      /**
       * Evento que se producirá mientras la petición se realiza.
       * 
       * Este evento realizará un cambio al elemento que contiene el título del formulario.
       */
      beforeSend: function () {
        tituloFormulario.text('Ingresando...').addClass('text-primary');
      }
    });
  });

  $("#refrescar").click(() => {
    let subcontainer = $("#app-subcontainer");
    subcontainer.append("<p> Hola, mundo </p>");

  });

  $("#perfil").click((e) => {
    // e.preventDefault();
    $.ajax({
      url: "../../controllers/UsuarioController.php?fn=perfil",
      type: "GET",
      data: {},
      success: function (response) {
        console.log(response);
        /* if (response != null & response != "") {
          let data = JSON.parse(response);
          console.log(data[0][2]['id_usuario']);
        }; */
      },
    });
  });

  $("#zonas").click(() => {
    ResetContent();
  });

  $("#egresos").click((e) => {
    e.preventDefault();
    let subcontainer = $("#app-subcontainer");

    $.ajax({
      url: "../../controllers/EgresoController.php?fn=ver",
      type: "GET",
      data: {},
      success: function (response) {
        // console.log(response);
        if (response != null & response != "") {
          let data = JSON.parse(response);

          thead = "";
          tbody = "";
          tfooter = "";

          thead = `
            <div id="app-content" class="w-100">
              <div id="table" class="table-responsive table-responsive-md">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Fecha gasto</th>
                            <th scope="col">Concepto gasto</th>
                            <th scope="col">Valor gasto</th>
                            <th scope="col">Observaciones</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
          `;

          tfooter = `
                    </tbody>
                  </table>
                </div>
              </div>
          `;

          for (const key in data.data) {
            if (data.data.hasOwnProperty(key)) {
              const element = data.data[key];
              tbody += `
                <tr>
                  <td class="align-middle"> ${element['fecha_gasto']} </td>
                  <td class="align-middle"> ${element['concepto_gasto']} </td>
                  <td class="align-middle"> ${element['valor_gasto']} </td>
                  <td class="align-middle"> ${element['observacion_gasto']} </td>
                  <td class="align-middle text-center">
                    <button onClick="actualizarEgreso(${element['id_gasto']})" class="btn btn-sm m-1 btn-outline-primary btn_actualizar">Actualizar</button>
                    <button onClick="eliminarEgreso(${element['id_gasto']})" class="btn btn-sm m-1 btn-outline-danger btn_eliminar">Eliminar</button>
                  </td>
                </tr>
              `;
            };
          };

          table = thead + tbody + tfooter;

          subcontainer.html(table);

        };
      },
    });
  });

});