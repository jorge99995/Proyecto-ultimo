@extends('layouts.app')
@section('content')


<div class="login-right">
    <div class="login-right-wrap">
        <form action="{{ route('login') }}" id="login_usuario">
            @csrf
            <div class="form-group">
                <label>Email<span class="login-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">



                <span class="profile-views"><i class="fas fa-envelope"></i></span>
            </div>
            <br>
            <div class="form-group">
                <label>Password <span class="login-danger">*</span></label>
                <input type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" id="password">

                <span class="profile-views feather-eye toggle-password"></span>
            </div>
            <br>


            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Iniciar Sesion</button>
            </div>
        </form>
        <div class="login-or">
            <span class="or-line"></span>
            <span class="span-or">or</span>
        </div>
        <div class="social-login">
            <a href="#"><i class="fab fa-google-plus-g"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</div>

<script>
    $('#login_usuario').submit(function(e) {
        e.preventDefault();
        var txtemail = $('#email').val();
        var txtpassword = $('#password').val();
        var _token = $('#input[name=_token]').val();


        $.ajax({
            url: "{{ route('auth.iniciarSesion') }}"
            , type: 'POST'
            , data: {
                correo: txtemail
                , contrasenia: txtpassword
                , _token: "{{ csrf_token() }}",

            }
            , success: function(response) {

                if (response.valido == 1) {

                    location.href = "{{route('home')}}"
                } else {
                    toastr.warning('Error de correo electronico o Contraseña', 'ERROR', {
                        timeOut: 3000
                    });

                }
            }
        })

    })

</script>
@endsection
