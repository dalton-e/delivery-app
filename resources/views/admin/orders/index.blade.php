@extends("app")

@section("content")

    <div class="conteiner" style="margin: 20px">
        <h1>Pedidos</h1>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Código</th>
                <th>Cliente</th>
                <th>Itens</th>
                <th>Total</th>
                <th>Data</th>
                <th>Status</th>
                <th>Entregador</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->client->user->name }}</td>
                <td>
                    <ul>
                        @foreach($order->items as $item)
                            <li>{{ $item->product->name }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>R$ {{ $order->total }}</td>
                <td>{{ $order->date }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    @if($order->deliveryman)
                        {{ $order->deliveryman->name }}
                    @else
                        --
                    @endif
                </td>
                <td><a href="{{ route('admin.orders.edit', ['id'=>$order->id]) }}" class="btn btn-default">Editar</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {!! $orders->render() !!}

    </div>

@endsection