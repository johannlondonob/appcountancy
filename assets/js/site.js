/**
 * Evento que ocurre al momento de loggearse
 * 
 * Esta función apunta al título de formulario del login para ingresar al sistema
 */
function ResetLogin() {
  let tituloFormulario = $("#tituloFormularioIngresar");
  tituloFormulario.text('Ingresar').removeClass('text-primary');
}

/**
 * Limpiar contenedor de la aplicación
 * 
 * Esta función deja en blanco el contenido principal de la aplicación.
 */
function ResetContent() {

  let appSubcontainer = document.getElementById("app-subcontainer");
  let appContent = document.getElementById("app-content");

  if (appSubcontainer.contains(appContent)) {
    appSubcontainer.removeChild(appContent);
  } else {
    return;
  }
}

/**
 * Agregar un nuevo elemento al subconetenedor
 * 
 * Esta función añade un nuevo elemento al subcontenedor de la aplicación.
 * @param {string} element Elemento HTML que se desea agregar al subcontenedor de la app
 */
function AppendToSubcontainer(element) {
  let subcontainer = $("#app-subcontainer");
  subcontainer.html(`<div id="app-content" class="w-100"> ${element} </div>`);
}

/**
 * Establecer funciones a elementos
 * 
 * Esta función permite asignar funciones a elementos como son los botones
 * @param {string} button Es el ID que se le asignó al elemento.
 * @param {string} fn Es la función que se le desea asignar al elemento. Debe terminar con los paréntesis.
 */

function SetFunctionButton(button, fn) {
  let element = document.getElementById(button);

  element.setAttribute("onClick", fn);
}

/**
 * Inicializar los botones del contenedor de la app
 * 
 * Esta función inicializa una variable para guardar el ancho de la ventana de la app,
 * y de acuerdo al ancho de la página, formateará los botones ubicados en la parte superior del subcontenedor de la aplicación.
 * Evaluará el ancho para quitar o no el texto de los botones.
 */
function InitButtons() {
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
  InitButtons();
  $(window).resize(() => {
    InitButtons();
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

  /* $("#refresh").click(() => {
    let subcontainer = $("#app-subcontainer");
    subcontainer.append("<p> Hola, mundo </p>");

  }); */

  $("#perfil").click((e) => {
    e.preventDefault();
    ResetContent();
    SetFunctionButton("refresh", "refreshPerfil()");

    $.ajax({
      url: "../../controllers/UsuarioController.php?fn=perfil",
      type: "GET",
      data: {},
      success: function (response) {
        if (response != null & response != "") {
          let data = JSON.parse(response);

          for (const key in data.data) {
            if (data.data.hasOwnProperty(key)) {
              const element = data.data[key];

              /* for (const iterator of element) {
                console.log(iterator);
              } */
              tbody = "";

              element.forEach(item => {
                console.log(item);
                tbody += `
                  <tr>
                    <td class="align-middle"> ${item['nro_identificacion'][1]} </td>
                    <td class="align-middle"> ${item['razon_social']} </td>
                    <td class="align-middle"> ${item['direccion']} </td>
                    <td class="align-middle"> ${item['telefono_uno'][1]} </td>
                    <td class="align-middle"> ${(item['telefono_dos'][1]) == null ? '' : item['telefono_dos'][1]} </td>
                    <td class="align-middle"> ${item['email_uno']} </td>
                    <td class="align-middle"> ${(item['email_dos']) == null ? '' : item['email_dos']} </td>
                    <td class="align-middle"> ${item['activo'][1]} </td>
                  </tr>
                `;
              });

              element.forEach(item => {
                // console.log(item['razon_social'])
                // console.log(item['nro_identificacion'][1])
                // console.log(item['direccion'])
                // console.log(item['telefono_uno'][1])
                // console.log(item['telefono_dos'][1])

                perfil = `
                  <h1> Datos personales </h1>
                    <br>

                    <form>    
                      <div class="form-row">
                        <div class="form-group col-lg-4 col-md-12 col-12">
                          <label for="nroIdentificacion"> <b> Número de identificación </b> </label>
                          <input name="nroIdentificacion" id="nroIdentificacion" type="text" class="form-control" disabled value="${item['nro_identificacion'][0]}">
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-12">
                          <label for="primerNombre"> <b> Primer nombre </b> </label>
                          <input type="text" class="form-control" value="${item['primer_nombre']}">
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-12">
                          <label for="segundoNombre"> <b> Segundo nombre </b> </label>
                          <input type="text" class="form-control" value="${(item['segundo_nombre'] == null) ? '' : item['segundo_nombre']}">
                        </div>
                      </div>
      
                      <div class="form-row">
                        <div class="col-lg-4 invisible"></div>
                        <div class="form-group col-lg-4 col-md-6 col-12">
                          <label for="primerNombre"> <b> Primer apellido </b> </label>
                          <input name="primerNombre" id="primerApellido" type="text" class="form-control" value="${item['primer_apellido']}">
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-12">
                          <label for="segundoNombre"> <b> Segundo apellido </b> </label>
                          <input name="segundoNombre" type="text" id="segundoApellido" class="form-control" value="${(item['segundo_apellido'] == null) ? '' : item['segundo_apellido']}">
                        </div>
                      </div>

                      
                      <br>
                      <div class="dropdown-divider"></div>
                      <h1> Contacto </h1>
                      <br>
      
                      <div class="form-row">
                        <div class="col-lg-4 invisible"></div>
                        <div class="form-group col-lg-4 col-md-6 col-12">
                          <label for="telefonoUno"><b>Teléfono uno </b> </label>
                          <input name="telefonoUno" type="text" class="form-control" id="telefonoUno" value="${item['telefono_uno'][0]}">
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-12">
                          <label for="telefonoDos"><b>Teléfono dos </b> </label>
                          <input name="telefonoDos" type="text" class="form-control" id="telefonoDos" value="${ (item['telefono_dos'][0] == null) ? '' : item['telefono_dos'][0]}">
                        </div>
                      </div>
      
                      <div class="form-row">
                        <div class="col-lg-4 invisible"></div>
                        <div class="form-group col-lg-4 col-md-6 col-12">
                          <label for="email"><b> Correo electrónico </b> </label>
                          <input name="email" type="text" class="form-control" id="email" value="${item['email']}">
                        </div>
                        <div class="form-group col-lg-4 invisible"></div>
                      </div>

                      
                      <br>
                      <div class="dropdown-divider"></div>
                      <h1> Roles </h1>
                      <br>
      
                      <div class="form-row">
                        <div class="col-lg-4 invisible"></div>
                        <div class="form-group col-lg-2 col-12">
                          <label for="nombreRol"><b>Rol asignado </b> </label>
                          <input name="telefonoUno" type="text" class="form-control" disabled id="nombreRol" value="${item['nombre']}">
                        </div>
                        <div class="form-group col-lg-6 col-12">
                          <label for="descripcionRol"><b>Descripción del rol </b> </label>
                          <input name="telefonoDos" type="text" class="form-control" disabled id="descripcionRol" value="${item['descripcion']}">
                        </div>
                      </div>
                      <input type="hidden" value="${item['id_tercero']}">
                      <input type="hidden" value="${item['id_usuario']}">
                      <input type="hidden" value="${item['id_rol']}">  
                    </form>

                    <br>
                      <div class="dropdown-divider"></div>
                      <h1> Empresas asignadas </h1>
                    <br>
                  
                    <div id = "table" class="table-responsive table-responsive-md" >
                      <table class="table table-hover table">
                        <thead>
                          <tr>
                            <th scope="col">Cédula o NIT</th>
                            <th scope="col">Razón social</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Teléfono dos</th>
                            <th scope="col">Email</th>
                            <th scope="col">Email dos</th>
                            <th scope="col">Activo</th>
                          </tr>
                        </thead>
                        <tbody id="tablePerfil">
                          
                        </tbody>
                      </table>
                    </div>
                  `;
              });
              AppendToSubcontainer(perfil);
              let tablePerfil = $("#tablePerfil");
              tablePerfil.html(tbody)
            };
          };
        };
      },
    });
  });

  $("#cuadresDiarios").click((e) => {
    e.preventDefault();
    ResetContent();
    SetFunctionButton("refresh", "refreshCuadresDiarios()");
    SetFunctionButton("add", "addCuadreDiario()");
  });

  $("#egresos").click((e) => {
    e.preventDefault();
    ResetContent();
    SetFunctionButton("refresh", "refreshGastos()");
    SetFunctionButton("add", "addGasto()");

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
                  <div id= "table" class="table-responsive table-responsive-md" >
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
                  </div >
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
                </tr >
                  `;
            };
          };
          table = thead + tbody + tfooter;
          AppendToSubcontainer(table);
        };
      },
    });
  });

  $("#domicilios").click((e) => {
    e.preventDefault();
    ResetContent();
    SetFunctionButton("refresh", "refreshCuadresDiarios()");
    SetFunctionButton("add", "addCuadreDiario()");
  });

  $("#zonas").click((e) => {
    e.preventDefault();
    ResetContent();
    SetFunctionButton("refresh", "refreshZonas()");
    SetFunctionButton("add", "addZona()");

  });

  $("#mensajeros").click((e) => {
    e.preventDefault();
    ResetContent();
    SetFunctionButton("refresh", "refreshCuadresDiarios()");
    SetFunctionButton("add", "addCuadreDiario()");
  })

});
