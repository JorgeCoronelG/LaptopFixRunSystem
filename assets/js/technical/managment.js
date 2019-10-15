$('#tabla-tecnicos').DataTable({
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
        "url": base_url+"cTechnical/obtenerTecnicos",
        "type": "POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'nameTech'},
        {data: 'phoneTech'},
        {data: 'email'},
        {data: 'addTech'},
        {'orderable': true,
            render: function(data, type, row){
                return '<a href="'+base_url+path_doc+row.ifeTech+'" target="_blank">IFE/INE</a>';
            }
        },
        {'orderable': true,
            render: function(data, type, row){
                return '<a href="'+base_url+path_doc+row.compAddTech+'" target="_blank">Comprobante</a>';
            }
        },
        {'orderable': true,
            render: function(data, type, row){
                return ''+
                '<button class="btn btn-primary" data-toggle="modal" data-target="#updateModal" onClick=""><i class="fa fa-edit"></i></button> '+
                '<button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onClick="del(\''+row.email+'\');"><i class="fa fa-trash"></i></button>';
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

function del(email){
    $.ajax({
        url: base_url+'cUser/changeStatus',
        type: 'POST',
        dataType: 'json',
        data: { email : email, status : 0},
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