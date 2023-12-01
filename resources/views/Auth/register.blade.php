@extends('layouts.app')
@section('content')


<div class="login-right">
    <div class="login-right-wrap">
        <h1>Sign Up</h1>
        <p class="account-subtitle">Enter details to create your account</p>
        <form action="{{ route('register') }}" id="registro-usuario">
            @csrf
            <div class="form-group">
                <label>Nombre del Usuario <span class="login-danger">*</span></label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre">

                <span class="profile-views"><i class="fas fa-user-circle"></i></span>
            </div>
            <div class="form-group">
                <label>Apellidos del usuario <span class="login-danger">*</span></label>
                <input type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" id="apellidos">


                <span class="profile-views"><i class="fas fa-user-circle"></i></span>
            </div>
            <div class="form-group">
                <label>Numero de celular <span class="login-danger">*</span></label>
                <input type="text" class="form-control @error('apellidos') is-invalid @enderror" name="telefono" id="telefono">


                <span class="profile-views"><i class="fas fa-user-circle"></i></span>
            </div>


            <div class="form-group">
                <label>Correo Electronico <span class="login-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                <span class="profile-views"><i class="fas fa-envelope"></i></span>
            </div>
            {{-- insert defaults --}}
            <input type="hidden" class="image" name="image" id="image" value="photo_defaults.jpg">
            {{-- <div class="form-group local-forms">
                <label>Role Name <span class="login-danger">*</span></label>
                <select class="form-control select @error('role_name') is-invalid @enderror" name="role_name" id="role_name">
                    <option selected disabled>Role Type</option>
                    <option value="1">ADMINISTRADOR</option>
                </select>

                @error('role_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div> --}}

    <div class="form-group">
        <label>Contraseña <span class="login-danger">*</span></label>
        <input type="password" class="form-control pass-input  @error('password') is-invalid @enderror" name="password" id="password">
        <span class="profile-views feather-eye toggle-password"></span>
    </div>
    {{-- <div class="form-group">
                <label>Confirm password <span class="login-danger">*</span></label>
                <input type="password" class="form-control pass-confirm @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">

                <span class="profile-views feather-eye reg-toggle-password"></span>
            </div>  --}}
    <div class=" dont-have">Already Registered? <a href="{{ route('login') }}">Login</a></div>
    <div class="form-group mb-0">
        <button class="btn btn-primary btn-block" type="submit">Register</button>
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
    $('#registro-usuario').submit(function(e) {
        e.preventDefault();
        var txtnombre = $('#nombre').val();

        var txtemail = $('#email').val();
        var txtapellidos = $('#apellidos').val();
        var txttelefono = $('#telefono').val();


        var txtpassword = $('#password').val();
        var _token = $('#input[name=_token]').val();


        $.ajax({
            url: "{{ route('auth.create') }}"
            , type: 'POST'
            , data: {
                nombres: txtnombre
                , apellidos: txtapellidos
                , correo: txtemail
                , telefono: txttelefono
                , contrasenia: txtpassword
                , _token: "{{ csrf_token() }}",

            }
            , success: function(response) {

                if (response.valido == 1) {

                    toastr.success('Registro satisfactorio', 'CORRECTO', {
                        timeOut: 3000
                    });
                    $('#registro-usuario')[0].reset();

                } else {
                    toastr.warning('No se registro satisfactorio', 'ERROR', {
                        timeOut: 3000
                    });

                }
            }
        })





    });

</script>

@endsection
