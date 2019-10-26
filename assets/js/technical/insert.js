$('#form').submit(function(e){
    e.preventDefault();
    
    $('#div-loader').slideToggle(500);
    $('#div-form').slideToggle(500);

    var name = $("#txtName").val();
    var phone = $("#txtPhone").val();
    var email = $('#txtEmail').val();
    var password = $('#txtPassword').val();

    var data = new FormData(this);

    firebase.auth().createUserWithEmailAndPassword(email, password).then(function(user) {
        var user = firebase.auth().currentUser;
        writeUserData(user.uid, name, phone);
        data.append('id', user.uid);
        $.ajax({
          url: base_url+'TechnicalC/agregar',
          type: 'POST',
          dataType: 'json',
          data: data,
          processData: false,
          contentType: false,
          success: function(data){
            $('#div-loader').slideToggle(500);
            $('#div-form').slideToggle(500);
            if(data.code == 200){
                $('#successModal').modal({backdrop: 'static', keyboard: false}, 'show');
                $('#nombre-tecnico-modal').html($('#txtName').val());
            }else{
                alert(data.error);
            }
          },
          error: function(a, b, c){
            alert("Error");
            console.log(a);
            console.log(b);
            console.log(c);
          }
      });
    }, function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        console.log(errorCode);
        console.log(errorMessage);
    });
});

$('#btn-success').click(function(){
    location.reload();
});

function writeUserData(id, name, phone) {
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
    }
  });
}

$('#div-loader').hide(0);

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