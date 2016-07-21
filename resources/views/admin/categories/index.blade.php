@extends("app")

@section("content")

    <div class="conteiner" style="margin: 20px">
        <h1>Categorias</h1>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-default">Nova Categoria</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td></td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {!! $categories->render() !!}

    </div>

@endsection