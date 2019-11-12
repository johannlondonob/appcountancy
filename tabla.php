<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/datatables/datatables.min.css">
    <title>Document</title>
</head>
<body>
<table class="table" id="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
<script src="assets/jquery/js/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap/js/popper.min.js"></script>
<script src="assets/datatables/datatables.min.js"></script>
<script src="assets/datatables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
<script src="assets/datatables/Buttons-1.6.1/js/buttons.html5.min.js"></script>
<script>
    $("#table").dataTable({
      dom: "<'d-flex justify-content-between mb-4 flex-column flex-lg-row flex-md-row' <f 'mr-3'> <B > ></> t <'d-flex justify-content-between mt-4 flex-column flex-lg-row flex-md-row align-items-center'l i p></>",
      buttons: [
        'csv', 'print'
      ],
      language: {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "csv": "Exportar a CSV",
            "print": "Imprimir"
        }
      }
    });
</script>
</body>
</html>