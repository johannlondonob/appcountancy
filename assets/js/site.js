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
  subcontainer.html(`<div" id="app-content" class="w-100"> ${element} </div>`);
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

function Welcome(title, link) {

  let welcome = `
    <div class="jumbotron">
      <h1 class="display-4">${title}</h1>
      <p class="lead">En esta aplicación vas a lograr avances con tu contabilidad.</p>
      <hr class="my-4">
      <p>${title} es una herramienta para que los conceptos de la contabilidad dejen de ser una barrera. Estamos dispuestos a ayudarte.</p>
      <a class="btn btn-outline-primary btn-lg mt-3" href="${link}" role="button">Saber más</a>
    </div>
  `;

  return welcome;

}

function refreshPerfil() {
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

            tbody = "";

            // Para recuperar las empresas de las cuales el usuario puede acceder desde el sistema.
            element.forEach(columna => {
              tbody += `
                  <tr>
                    <td class="align-middle"> ${columna['nro_identificacion'][1]} </td>
                    <td class="align-middle"> ${columna['razon_social']} </td>
                    <td class="align-middle"> ${columna['direccion']} </td>
                    <td class="align-middle"> ${columna['telefono_uno'][1]} </td>
                    <td class="align-middle"> ${(columna['telefono_dos'][1]) == null ? '-' : columna['telefono_dos'][1]} </td>
                    <td class="align-middle"> ${columna['email_uno']} </td>
                    <td class="align-middle"> ${(columna['email_dos']) == null ? '-' : columna['email_dos']} </td>
                    <td class="align-middle"> ${columna['activo'][1]} </td>
                  </tr>
                `;
            });

            // Para recuperar todos los datos del usuario
            element.forEach(columna => {

              perfil = `
                  <h1> Datos personales </h1>
                    <br>

                    <form>    
                      <div class="form-row">
                        <div class="form-group col-lg-4 col-md-12 col-12">
                          <label for="nroIdentificacion"> <b> Número de identificación </b> </label>
                          <input name="nroIdentificacion" id="nroIdentificacion" type="text" class="form-control" disabled value="${columna['nro_identificacion'][0]}">
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-12">
                          <label for="primerNombre"> <b> Primer nombre </b> </label>
                          <input type="text" class="form-control" value="${columna['primer_nombre']}">
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-12">
                          <label for="segundoNombre"> <b> Segundo nombre </b> </label>
                          <input type="text" class="form-control" value="${(columna['segundo_nombre'] == null) ? '' : columna['segundo_nombre']}">
                        </div>
                      </div>
      
                      <div class="form-row">
                        <div class="col-lg-4 invisible"></div>
                        <div class="form-group col-lg-4 col-md-6 col-12">
                          <label for="primerNombre"> <b> Primer apellido </b> </label>
                          <input name="primerNombre" id="primerApellido" type="text" class="form-control" value="${columna['primer_apellido']}">
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-12">
                          <label for="segundoNombre"> <b> Segundo apellido </b> </label>
                          <input name="segundoNombre" type="text" id="segundoApellido" class="form-control" value="${(columna['segundo_apellido'] == null) ? '' : columna['segundo_apellido']}">
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
                          <input name="telefonoUno" type="text" class="form-control" id="telefonoUno" value="${columna['telefono_uno'][0]}">
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-12">
                          <label for="telefonoDos"><b>Teléfono dos </b> </label>
                          <input name="telefonoDos" type="text" class="form-control" id="telefonoDos" value="${ (columna['telefono_dos'][0] == null) ? '' : columna['telefono_dos'][0]}">
                        </div>
                      </div>
      
                      <div class="form-row">
                        <div class="col-lg-4 invisible"></div>
                        <div class="form-group col-lg-4 col-md-6 col-12">
                          <label for="email"><b> Correo electrónico </b> </label>
                          <input name="email" type="text" class="form-control" id="email" value="${columna['email']}">
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
                          <input name="telefonoUno" type="text" class="form-control" disabled id="nombreRol" value="${columna['nombre']}">
                        </div>
                        <div class="form-group col-lg-6 col-12">
                          <label for="descripcionRol"><b>Descripción del rol </b> </label>
                          <input name="telefonoDos" type="text" class="form-control" disabled id="descripcionRol" value="${columna['descripcion']}">
                        </div>
                      </div>
                      <input type="hidden" value="${columna['id_tercero']}">
                      <input type="hidden" value="${columna['id_usuario']}">
                      <input type="hidden" value="${columna['id_rol']}">  
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
            // Para enviar a la interfaz un formulario con los valores recuperados. 
            AppendToSubcontainer(perfil);
            // Para enviar a la interfaz una tabla con todas las filas recuperadas.
            let tablePerfil = $("#tablePerfil");
            tablePerfil.slideDown("slow").html(tbody);
          };
        };
      };
    },
  });

};

function refreshGastos() {
  $.ajax({
    url: "../../controllers/EgresoController.php?fn=ver",
    type: "GET",
    data: {},
    success: function (response) {
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
            const columna = data.data[key];
            tbody += `
              <tr>
                <td class="align-middle"> ${columna['fecha_gasto']} </td>
                <td class="align-middle"> ${columna['concepto_gasto']} </td>
                <td class="align-middle"> ${columna['valor_gasto']} </td>
                <td class="align-middle"> ${columna['observacion_gasto']} </td>
                <td class="align-middle text-center">
                  <button onClick="actualizarEgreso(${columna['id_gasto']})" class="btn btn-sm m-1 btn-outline-primary btn_actualizar">Actualizar</button>
                  <button onClick="eliminarEgreso(${columna['id_gasto']})" class="btn btn-sm m-1 btn-outline-danger btn_eliminar">Eliminar</button>
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
}

function refreshDomicilios() {
  console.log("Refrescando");
  $.ajax({
    url: "../../controllers/DomicilioController.php?fn=ver",
    type: "GET",
    data: {},
    beforeSend: function () { },
    success: function (response) {
      let data = JSON.parse(response);

      thead = "";
      tbody = "";
      tfooter = "";

      data.data.forEach(columna => {
        tbody += `
          <tr>
            <td class="align-middle"> ${columna['fecha_domicilio']} </td>
            <td class="align-middle"> ${columna['nro_factura']} </td>
            <td class="align-middle"> ${columna['valor_factura']} </td>
            <td class="align-middle"> ${columna['nombre_pago']} </td>
            <td class="align-middle"> ${columna['nombre_zona']} </td>
            <td class="align-middle"> ${columna['valor_zona']} </td>
            <td class="align-middle"> ${(columna['fecha_entrega_dinero']) == null ? '-' : columna['fecha_entrega_dinero']} </td>
            <td class="align-middle"> ${columna['primer_nombre']}  ${columna['primer_apellido']} </td>
            <td class="align-middle"> ${columna['telefono_uno']} </td>
            <td class="align-middle text-center">
              <button onClick="actualizarDomicilio(${columna['id_domicilio']})" class="btn btn-sm m-1 btn-outline-primary btn_actualizar">Actualizar</button>
              <button onClick="eliminarDomicilio(${columna['id_domicilio']})" class="btn btn-sm m-1 btn-outline-danger btn_eliminar">Eliminar</button>
            </td>
          </tr >
        `;
      });

      thead = `
        <div id= "table" class="table-responsive table-responsive-md" >
          <table class="table table-hover table-sm">
            <thead>
              <tr>
                <th scope="col">Fecha domicilio</th>
                <th scope="col"># factura</th>
                <th scope="col">Valor factura</th>
                <th scope="col">Forma pago</th>
                <th scope="col">Nombre zona</th>
                <th scope="col">Valor zona</th>
                <th scope="col">Día entrega dinero</th>
                <th scope="col">Mensajero</th>
                <th scope="col">Celular</th>
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
      table = thead + tbody + tfooter;
      AppendToSubcontainer(table);
    }
  });
}

function refreshZonas() {
  $.ajax({
    url: "../../controllers/ZonaController.php?fn=ver",
    type: "GET",
    data: {},
    beforeSend: function () { },
    success: function (response) {
      let data = JSON.parse(response);

      thead = "";
      tbody = "";
      tfooter = "";

      data.data.forEach(columna => {
        tbody += `
          <tr>
            <td class="align-middle"> ${columna['nombre_zona']} </td>
            <td class="align-middle"> ${columna['valor_zona']} </td>
            <td class="align-middle"> ${columna['activo']} </td>
            <td class="align-middle text-center">
              <button onClick="actualizarZona(${columna['id_zona']})" class="btn btn-sm m-1 btn-outline-primary btn_actualizar">Actualizar</button>
              <button onClick="eliminarZona(${columna['id_zona']})" class="btn btn-sm m-1 btn-outline-danger btn_eliminar">Eliminar</button>
            </td>
          </tr >
        `;

        thead = `
          <div id= "table" class="table-responsive table-responsive-md" >
            <table class="table table-hover table-sm">
              <thead>
                <tr>
                  <th scope="col">Nombre zona</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Activo</th>
                  <th scope="col" class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
        `;

        tfooter = `
            </tbody>
          </table>
        </div >`;

        table = thead + tbody + tfooter;
        AppendToSubcontainer(table);
      });
    },
  });
}

function refreshMensajeros() {
  $.ajax({
    url: "../../controllers/MensajeroController.php?fn=ver",
    type: "GET",
    data: {},
    beforeSend: function () { },
    success: function (response) {
      let data = JSON.parse(response);

      thead = "";
      tbody = "";
      tfooter = "";

      thead = `
        <div id= "table" class="table-responsive table-responsive-md" >
          <table class="table table-hover table-sm">
            <thead>
              <tr>
                <th scope="col"># de identificación</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo electrónico</th>
                <th scope="col">Activo</th>
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

      data.data.forEach(columna => {
        tbody += `
          <tr>
            <td class="align-middle"> ${columna['nro_identificacion']} </td>
            <td class="align-middle"> ${columna['primer_nombre']}  ${(columna['segundo_nombre']) == null ? '' : columna['segundo_nombre']} </td>
            <td class="align-middle"> ${columna['primer_apellido']} ${(columna['segundo_apellido']) == null ? '' : columna['segundo_apellido']} </td>
            <td class="align-middle"> ${columna['telefono_uno']} </td>
            <td class="align-middle"> ${columna['email']} </td>
            <td class="align-middle"> ${columna['activo']} </td>
            <td class="align-middle text-center">
              <button onClick="actualizarMensajero(${columna['id_mensajero']},${columna['id_tercero']})" class="btn btn-sm m-1 btn-outline-primary btn_actualizar">Actualizar</button>
              <button onClick="eliminarMensajero(${columna['id_mensajero']},${columna['id_tercero']})" class="btn btn-sm m-1 btn-outline-danger btn_eliminar">Eliminar</button>
            </td>
          </tr >
        `;
      });
      table = thead + tbody + tfooter;
      AppendToSubcontainer(table);
    },
  });
}

/**
 * A partir de aquí, el script efectuará los cambios necesarios de acuerdo a los parámetros establecidos por el flujo del sistema una vez que la página esté completamente cargado y listo para navegarse. 
 */
$(document).ready(function () {
  AppendToSubcontainer(Welcome("Appcountancy", "verMas.php"));

  InitButtons();
  $(window).resize(() => {
    InitButtons();
  });

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
        tituloFormulario.text('Ingresando...').addClass('text-primary').slideDown("slow");
      }
    });
  });

  $("#perfil").click((e) => {
    e.preventDefault();
    ResetContent();
    SetFunctionButton("refresh", "refreshPerfil()");
    refreshPerfil();
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
    refreshGastos();
  });

  $("#domicilios").click((e) => {
    e.preventDefault();
    ResetContent();
    SetFunctionButton("refresh", "refreshDomicilios()");
    SetFunctionButton("add", "addDomicilio()");
    refreshDomicilios();
    // setInterval(refreshDomicilios, 3000);
  });

  $("#zonas").click((e) => {
    e.preventDefault();
    ResetContent();
    SetFunctionButton("refresh", "refreshZonas()");
    SetFunctionButton("add", "addZona()");
    refreshZonas();
  });

  $("#mensajeros").click((e) => {
    e.preventDefault();
    ResetContent();
    SetFunctionButton("refresh", "refreshCuadresDiarios()");
    SetFunctionButton("add", "addCuadreDiario()");
    refreshMensajeros();
  })

  $("#menu").click(() => {
    AppendToSubcontainer(Welcome("Appcountancy", "verMas.php"));
  })

});
