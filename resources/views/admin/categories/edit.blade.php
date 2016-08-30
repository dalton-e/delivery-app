@extends("app")

@section("content")

    <div class="conteiner" style="margin: 20px">
        <h1>Editar Categoria</h1>

        @include("errors.template")

        {!! Form::open(['route' => ['admin.categories.update', $category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nome da Categoria:') !!}
            {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Categoria', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection