function password(){
    var x = document.getElementById('show-password').type;

    if (x == 'password'){
        document.getElementById('show-password').type = 'text';
        document.getElementById('mybutton').innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
    }else{
        document.getElementById('show-password').type = 'password';
        document.getElementById('mybutton').innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
    }
}
function password2(){
    var x = document.getElementById('show-password2').type;

    if (x == 'password'){
        document.getElementById('show-password2').type = 'text';
        document.getElementById('mybutton2').innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>'; 
    }else{
        document.getElementById('show-password2').type = 'password';
        document.getElementById('mybutton2').innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
    }
}
function login_password(){
    var x = document.getElementById('login').type;

    if (x == 'password'){
        document.getElementById('login').type = 'text';
        document.getElementById('button-login').innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>'; 
    }else{
        document.getElementById('login').type = 'password';
        document.getElementById('button-login').innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
    }
}
function buku(){
    var x = document.getElementById('judul_buku').values;

    if (x == '$d1[Judul_Buku]'){
        document.getElementById('judul_buku').values = '$b[ID_Buku]';
        document.getElementById('buton').innerHTML = '$d1[Judul_Buku]'; 
    }
}