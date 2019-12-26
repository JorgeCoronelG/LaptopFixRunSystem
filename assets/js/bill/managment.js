$('#tabla-facturas').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Facturas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    'lengthMenu': [[5, 10, 15], [5, 10, 15]],
    'paging': true,
    'info': false,
    'filter': true,
    'stateSave': true,
    'ajax':{
        "url": base_url+"BillC/obtenerFacturas",
        "type": "POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'name'},
        {data: 'address'},
        {data: 'phone'},
        {data: 'rfc'},
        {data: 'cfdi'},
        {data: 'email'},
        {data: 'costBill'},
        {'orderable': true,
            render: function(data, type, row){
                return ''+
                '<button class="btn btn-primary" onclick="actualizar(\''+row.idBill+'\');"><i class="fa fa-check"></i></button>';
            }
        }
    ],
    'columnDefs':[
        {
            'targets': '_all',
            'className': 'text-center'
        }
    ]
});

function actualizar(id){
    $.ajax({
        url: base_url+'BillC/actualizar',
        type: 'POST',
        dataType: 'json',
        data: { id : id },
        success: function(data){
            if(data == true){
                location.reload();
            }
        },
        error: function(a, b, c){
            console.log(a);
            console.log(b);
            console.log(c);
        }
    });
}