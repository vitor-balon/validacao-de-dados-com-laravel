@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Validação de dados com Laravel</div>

                <div class="card-body">
                    <form id="meuFormulario" onsubmit="return validarFormulario()" method="POST" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <span id="erro_name"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autocomplete="email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <span id="erro_email"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autocomplete="new-password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <span id="erro_password"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Confirmar Senha</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" autocomplete="new-password">

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                                <span id="erro_password_confirmation"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Imagem de Perfil</label>

                            <div class="col-md-6">
                                <input id="profile_picture" type="file" class="form-control{{ $errors->has('profile_picture') ? ' is-invalid' : '' }}" name="profile_picture" autocomplete="new-password">

                                @if ($errors->has('profile_picture'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('profile_picture') }}</strong>
                                    </span>
                                @endif
                                <span id="erro_profile_picture"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">Número</label>

                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" value="{{ old('number') }}" autocomplete="number">

                                @if ($errors->has('number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                                <span id="erro_number"></span>
                            </div>
                        </div>                                                                     

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                        
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function validarFormulario()
    {

        $.ajax({
            type:'POST',
            url:'/clientes',
            data:$('#meuFormulario').serialize(),
            success:function (response)
            {
                console.log(response);
            },
            error: function (erro)
            {
                var data = erro.responseJSON;
                data = data['errors'];
                console.log(data['name'][0]);

                $.each(data, function (index, value) {
                    $('#erro_' + index).html('<strong>' + value[0] + '</strong>');
                    console.log('#erro_' + index);
                })

            }
        });

        return false;

    }

</script>

@endsection