<script type="text/javascript" src="../../assets/datatables/datatables.min.css"></script>
<script type="text/javascript" src="../../assets/datatables/Buttons-1.6.1/js/buttons.html5.min.js"></script>
<script>
  $(document).ready(function () {
    $('#tabla').DataTable({
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
  });
</script>