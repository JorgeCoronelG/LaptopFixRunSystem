$('#tabla-abonos').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Técnicos",
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
        "url": base_url+"PaymentC/obtenerPagos",
        "type": "POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'nameTech'},
        {data: 'phoneTech'},
        {data: 'email'},
        {data: 'payment'},
        {'orderable': true,
            render: function(data, type, row){
                return '<button class="btn btn-success" onclick="payment(\''+row.idTech+'\',\''+row.idDateH+'\');"><i class="fa fa-money"></i></button>';
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

function payment(tecnico, servicio){
    $.ajax({
        url: base_url+'PaymentC/update',
        type: 'POST',
        dataType: 'json',
        data: { tecnico : tecnico, servicio : servicio },
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