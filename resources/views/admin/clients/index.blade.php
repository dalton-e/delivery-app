@extends("app")

@section("content")

    <div class="conteiner" style="margin: 20px">
        <h1>Clientes</h1>

        <a href="{{ route('admin.clients.create') }}" class="btn btn-default">Novo Cliente</a>
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
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->user->name }}</td>
                <td><a href="{{ route('admin.clients.edit', ['id'=>$client->id]) }}" class="btn btn-default">Editar</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {!! $clients->render() !!}

    </div>

@endsection