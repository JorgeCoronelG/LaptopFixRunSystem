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

$('#form').submit(function(e){
    e.preventDefault();

    var name = $("#txtName").val();
    var phone = $("#txtPhone").val();
    var email = $('#txtEmail').val();
    var password = $('#txtPassword').val();

    var data = new FormData(this);

    firebase.auth().createUserWithEmailAndPassword(email, password).then(function(user) {
        var user = firebase.auth().currentUser;
        writeUserData(user.uid, name, phone, email);
        data.append('id', user.uid);
        $.ajax({
          url: base_url+'cTecnico/agregar',
          type: 'POST',
          dataType: 'json',
          data: data,
          processData: false,
          contentType: false,
          success: function(data){
            console.log("SUCCESS");
          },
          error: function(a, b, c){
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

function writeUserData(id, name, phone, email) {
  firebase.database().ref('Technical/' + id).set({
    id: id,
    name: name,
    email: email,
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