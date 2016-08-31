@extends("app")

@section("content")

    <div class="conteiner" style="margin: 20px">
        <h1>Editar Cliente</h1>

        @include("errors.template")

        {!! Form::open(['route' => ['admin.clients.update', $client->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nome do Cliente:') !!}
            {!! Form::text('user[name]', $client->user->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email do Cliente:') !!}
            {!! Form::text('user[email]', $client->user->email, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Telefone do Cliente:') !!}
            {!! Form::text('phone', $client->phone, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Endereço do Cliente:') !!}
            {!! Form::textarea('address', $client->address, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('state', 'Estado do Cliente:') !!}
            {!! Form::text('state', $client->state, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('city', 'Cidade do Cliente:') !!}
            {!! Form::text('city', $client->city, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('zipcode', 'CEP do Cliente:') !!}
            {!! Form::text('zipcode', $client->zipcode, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Cliente', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection