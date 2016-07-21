@extends("app")

@section("content")

    <div class="conteiner" style="margin: 20px">
        <h1>Nova Categoria</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'admin.categories.store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nome da Categoria:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Categoria', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection