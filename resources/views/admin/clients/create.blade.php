@extends("app")

@section("content")

    <div class="conteiner" style="margin: 20px">
        <h1>Novo Cliente</h1>

        @include("errors.template")

        {!! Form::open(['route' => 'admin.clients.store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nome do Cliente:') !!}
            {!! Form::text('user[name]', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email do Cliente:') !!}
            {!! Form::text('user[email]', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Telefone do Cliente:') !!}
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Endereço do Cliente:') !!}
            {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('state', 'Estado do Cliente:') !!}
            {!! Form::text('state', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('city', 'Cidade do Cliente:') !!}
            {!! Form::text('city', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('zipcode', 'CEP do Cliente:') !!}
            {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Categoria', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection