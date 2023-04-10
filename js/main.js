  /* Авторизація*/ 


$('.login-button').click(function(e) {
    e.preventDefault();
    
    let login = $('input[name = "login"]').val();
    let password = $('input[name = "password"]').val();

    $.ajax({
        url: './vendor/signin.php',
        type: 'POST',
        dataType: 'text',
        data: {
            login: login,
            password: password
        },
        success: function(data){
            data = JSON.parse(data);
            console.log(data);
            if(data.status){
                document.location.href = '/authorization/profile.php';
            }else{
                if(data.type === 1){
                    data.fields.forEach(function(field){
                        $(`input[name = "${field}"]`).addClass('error');
                    });
                }
                $('.messege').removeClass('none').text(data.message);
            }

            
        }
    });
});

  /* Реєстрація*/

  let avatar = false;
  $('input[name = "avatar"]').change(function(e){
    avatar = e.target.files[0];
  });


  $('.register-button').click(function(e) {
    e.preventDefault();
    let full_name = $('input[name = "full_name"]').val();
    let login = $('input[name = "login"]').val();
    let email = $('input[name = "email"]').val();
    let password = $('input[name = "password"]').val();
    let password_confirm = $('input[name = "password_confirm"]').val();

    let formData = new FormData();
    formData.append('full_name',full_name);
    formData.append('login',login);
    formData.append('email',email);
    formData.append('password',password);
    formData.append('password_confirm',password_confirm);
    formData.append('avatar',avatar);

    $.ajax({
        url: './vendor/signup.php',
        type: 'POST',
        dataType: 'text',
        processData: false,
        contentType: false,
        data: formData,
        success: function(data){
            console.log(data);
            data = JSON.parse(data);
            if(data.status){
                document.location.href = '/authorization/index.php';
            }else{
                if(data.type === 1){
                    data.fields.forEach(function(field){
                        // console.log(field);
                        $(`input[name = "${field}"]`).addClass('error');
                    });
                }
                $('.messege').removeClass('none').text(data.message);
            }
        }
    });
});