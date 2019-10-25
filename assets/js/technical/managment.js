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
        "url": base_url+"Technical/obtenerTecnicos",
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
                return '<a href="'+base_url+path_doc+row.ifeTech+'" target="_blank">IFE/INE</a> <a data-toggle="modal" data-target="#modal-update-credential" onclick="updateINE(\''+row.idTech+'\');"><i class="fa fa-edit"></i></a>';
            }
        },
        {'orderable': true,
            render: function(data, type, row){
                return '<a href="'+base_url+path_doc+row.comAddTech+'" target="_blank">Comprobante</a> <a data-toggle="modal" data-target="#modal-update-compAdd" onclick="updateAdd(\''+row.idTech+'\');"><i class="fa fa-edit"></i></a>';
            }
        },
        {'orderable': true,
            render: function(data, type, row){
                return ''+
                '<button class="btn btn-primary" data-toggle="modal" data-target="#modal-update" onClick="update(\''+row.idTech+'\',\''+row.nameTech+'\',\''+row.addTech+'\',\''+row.phoneTech+'\');"><i class="fa fa-edit"></i></button> '+
                '<button class="btn btn-danger" onClick="del(\''+row.email+'\');"><i class="fa fa-trash"></i></button>';
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

update = function(id, name, address, phone){
    $('#idTech').val(id);
    $('#txtName').val(name);
    $('#txtAddress').val(address);
    $('#txtPhone').val(phone);
};

updateINE = function(id){
    $('#idTechINE').val(id);
};

updateAdd = function(id){
    $('#idTechAdd').val(id);
};

$('#form-update').submit(function(e){
    e.preventDefault();
    
    $.ajax({
        url: base_url+'Technical/actualizar',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success: function(data){
            if(data == true){
                var id = $('#idTech').val();
                var name = $('#txtName').val();
                var phone = $('#txtPhone').val();
                updateTech(id, name, phone);
            }
        },
        error: function(a, b, c){
            console.log(a);
            console.log(b);
            console.log(c);
        }
    });
});

$('#form-update-credential').submit(function(e){
    e.preventDefault();
    
    $.ajax({
        url: base_url+'Technical/actualizarINE',
        type: 'POST',
        dataType: 'json',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function(data){
            if(data.code == 200){
                location.reload();
            }else{
                alert(data.error);
            }
        },
        error: function(a, b, c){
            console.log(a);
            console.log(b);
            console.log(c);
        }
    });
});

$('#form-update-compAdd').submit(function(e){
    e.preventDefault();
    
    $.ajax({
        url: base_url+'Technical/actualizarCompDom',
        type: 'POST',
        dataType: 'json',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function(data){
            if(data.code == 200){
                location.reload();
            }else{
                alert(data.error);
            }
        },
        error: function(a, b, c){
            console.log(a);
            console.log(b);
            console.log(c);
        }
    });
});

function updateTech(id, name, phone){
    firebase.database().ref('Technical/' + id).set({
        id: id,
        name: name,
        phone: phone
    }, function(error){
        if(error){
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log(errorCode);
            console.log(errorMessage);
        }else{
            location.reload();
        }
    });
}

function del(email){
    $.ajax({
        url: base_url+'User/changeStatus',
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

$(function () {
    $('#credential').each(function () {
      var $input = $(this);
      $input.on('change', function (e) {
        var fileName = '';
        if (e.target.value){
          fileName = e.target.value.split('\\').pop();
        }
        if (fileName){
          var $fileName = $('#file_name_credential');
          $fileName.html(fileName);
        } else {
          $fileName.html('');
        }
      });
    });
});

$(function () {
    $('#address').each(function () {
      var $input = $(this);
      $input.on('change', function (e) {
        var fileName = '';
        if (e.target.value){
          fileName = e.target.value.split('\\').pop();
        }
        if (fileName){
          var $fileName = $('#file_name_address');
          $fileName.html(fileName);
        } else {
          $fileName.html('');
        }
      });
    });
});

function validarTelefono(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
        return true;
    }
    return false;
}