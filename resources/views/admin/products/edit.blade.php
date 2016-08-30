@extends("app")

@section("content")

    <div class="conteiner" style="margin: 20px">
        <h1>Editar Produto</h1>

        @include("errors.template")

        {!! Form::open(['route' => ['admin.products.update', $product->id]]) !!}

        <div class="form-group">
            {!! Form::label('category', 'Categoria do Produto:') !!}
            {!! Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name', 'Nome do Produto:') !!}
            {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Descrição do Produto:') !!}
            {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Preço do Produto:') !!}
            {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Produto', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection